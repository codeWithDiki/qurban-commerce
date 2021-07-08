<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Animal;
use Illuminate\Http\Request;

class EditOrder extends Component
{
    public $customer_name;
    public $customer_phone;
    public $customer_address;
    public $animalId;
    public $qty;
    public $name;
    public $price;
    public $weight;
    public $amount;
    public $animal_choices;
    public $total;
    public $customer_email;
    public $checkout_message;
    public $view_form = true;
    public $status;
    public $pk_id;
    public $status_flag;
    protected $listeners = ["UpdateOrder" => "mount"];

    protected $rules = [
        'customer_name'     => 'required|min:6',
        'customer_phone'    => 'required|min:11',
        'customer_address'  => 'required|min:8',
        'qty'               => 'required|integer',
        'name'              => 'required',
        'price'             => 'required',
        'weight'            => 'required',
        'amount'            => 'required',
        'animalId'          => 'required',
        'customer_email'    => 'email'
    ];

    public function updated($property_name)
    {
        $this->validateOnly($property_name);
    }

    public function submit()
    {
        $this->total = $this->qty * $this->price;
        $this->amount = $this->qty * $this->price;
    }

    public function mount($id=null){
        if($id != null){
            $selected = Order::where("id", "=", $id)->first();
        } else {
            $id = request("id");
            if ($id != null){
                $selected = Order::where("id", "=", $id)->first();
            } else {
                $selected = null;
            }
        }
        if($selected != null){
            $this->pk_id = $id;
            $this->customer_name = $selected->customer_name;
            $this->customer_phone = $selected->customer_phone;
            $this->customer_address = $selected->customer_address;
            $this->animalId = $selected->animalId;
            $this->name = $selected->name;
            $this->qty = $selected->qty;
            $this->amount = $selected->amount;
            $this->weight = $selected->weight;
            $this->price = $selected->price;
            $this->status = $selected->status;
            $this->customer_email = $selected->customer_email;
            if($selected->status != "not_verifed"){
                $this->status_flag = false;
            }
        }
    }

    public function showincludeEdit($id)
    {
        if((int)$id != 0){
            $selected = Animal::where('id', '=',$id)->firstOrFail();
            // Array Null
            $this->price = $selected->price;
            $this->name = $selected->name;
            $this->weight = $selected->weight;
            $this->amount = $this->qty * $selected->price;
            $this->animalId = $id;
        } else {
            $this->price = 0;
            $this->name = "false";
            $this->weight = "false";
            $this->amount= 0;
            $this->animalId = 0;
        }
    }

    public function EditCheckout(){
        Order::where('id', '=',$this->pk_id)->update($this->validate());
        $this->checkout_message = "Checkout has been updated!.";
        return redirect()->to("/order/list");
    }
    public function render()
    {
        $this->animal_choices = Animal::all();
        if(count($this->animal_choices) < 1){
            $this->view_form = false;
        }
        return view('livewire.edit-order');
    }
}
