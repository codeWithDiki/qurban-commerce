<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Order;

class ViewOrder extends Component
{

    public $customer_name;
    public $customer_phone;
    public $customer_address;
    public $customer_email;
    public $name;
    public $price;
    public $qty;
    public $weight;
    public $status;
    public $amount;
    public $pk_id;
    public $view_button = true;

    public function mount($order_id = null){
        if($order_id == null){
            $id = request("id");
        } else {
            $id = $order_id;
        }

        if($id != null){
            if($this->pk_id != null){
                $selected = Order::where("id", "=", $this->pk_id)->firstOrFail();
            } else {
                $selected = Order::where("id", "=", (int)$id)->firstOrFail();
            }
            $this->customer_name = $selected->customer_name;
            $this->customer_phone = $selected->customer_phone;
            $this->customer_address = $selected->customer_address;
            $this->customer_email = $selected->customer_email;
            $this->name = $selected->name;
            $this->price = $selected->price;
            $this->qty = $selected->qty;
            $this->status = $selected->status;
            $this->amount = $selected->amount;
            $this->weight = $selected->weight;
        }
    }

    public function render()
    {
        return view('livewire.view-order');
    }
}
