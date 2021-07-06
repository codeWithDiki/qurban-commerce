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
    public $qty;
    public $name;
    public $price;
    public $weight;
    public $amount;
    public $animal_choices;
    public $total;
    public $checkout_message;
    public $view_form = true;
    public $pk_id;

    protected $rules = [
        'customer_name'     => 'required|min:6',
        'customer_phone'    => 'required|min:11',
        'customer_address'  => 'required|min:8',
        'qty'               => 'required|integer',
        'name'              => 'required',
        'price'             => 'required',
        'weight'            => 'required',
        'amount'            => 'required'
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

    public function mount(){
        $selected = Order::where("id", "=", request("id"))->firstOrFail();
        $this->customer_name = $selected->customer_name;
        $this->customer_phone = $selected->customer_phone;
        $this->customer_address = $selected->customer_address;
        $this->name = $selected->name;
        $this->qty = $selected->qty;
        $this->amount = $selected->amount;
        $this->weight = $selected->weight;
        $this->price = $selected->price;
        $this->pk_id = request("id");
    }

    public function showciudades($id)
    {
        $selected = Animal::where('id', '=',$id)->firstOrFail();
        // Array Null
        $this->price = $selected->price;
        $this->name = $selected->name;
        $this->weight = $selected->weight;
        $this->amount = $this->qty * $selected->price;
    }

    public function EditCheckout(){
        Order::where('id', '=',$this->pk_id)->update($this->validate());
        $this->checkout_message = "Checkout has been updated!.";
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
