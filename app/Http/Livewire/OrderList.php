<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
class OrderList extends Component
{
    public $orders;
    public $name;
    public $phone;
    public $address;
    public $a_name;
    public $a_price;
    public $a_weight;
    public $a_qty;
    public $sub_total;
    public $show = true;

    public function render()
    {
        $this->orders = Order::all();
        return view('livewire.order-list');
    }

    public function detail_data($id){
        $data = Order::where("id", "=", $id)->get();
        if(count($data) < 1){
            $this->show=false;
        } else {
            $this->name = $data[0]["customer_name"];
            $this->phone = $data[0]["customer_phone"];
            $this->address = $data[0]["customer_address"];
            $this->a_name = $data[0]["name"];
            $this->a_price = $data[0]["price"];
            $this->a_weight = $data[0]["weight"];
            $this->a_qty = $data[0]["qty"];
            $this->sub_total = $data[0]["qty"] * $data[0]["price"];
        }
    }
}
