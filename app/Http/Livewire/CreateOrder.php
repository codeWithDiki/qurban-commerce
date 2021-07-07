<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Animal;

class CreateOrder extends Component
{

    public $customer_name = "";
    public $customer_phone;
    public $customer_address;
    public $qty;
    public $name;
    public $price;
    public $weight;
    public $amount;
    public $animalId;
    public $animal_choices;
    public $total;
    public $checkout_message;
    public $view_form = true;

    protected $rules = [
        'customer_name'     => 'required|min:6',
        'customer_phone'    => 'required|min:11',
        'customer_address'  => 'required',
        'qty'               => 'required',
        'name'              => 'required',
        'price'             => 'required',
        'weight'            => 'required',
        'amount'            => 'required',
        'animalId'          => 'required|integer'
    ];

    public function updated($property_name)
    {
        $this->validateOnly($property_name);
    }

    public function submit()
    {
        $this->total = $this->qty * $this->price;
    }

    public function showciudades($id)
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

    public function clearForm(){
        $this->reset();
        $this->emit("refreshLivewireDatatable");
    }

    public function createCheckout(){
        Order::create($this->validate());
        $this->checkout_message = "Checkout has been add to our system!.";
        return redirect()->to("/order/list");
    }


    public function render()
    {   
        $this->animal_choices = Animal::all();
        if(count($this->animal_choices) < 1){
            $this->view_form = false;
        }
        return view('livewire.create-order');
    }
}
