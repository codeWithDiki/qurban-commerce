<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Mail\OrderSuccessPleaseCheckItNow;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendMail;
class OrderSuccess extends Component
{
    public $order_id;
    public $customer_name;
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
    public $status = "not_verifed";
    public $customer_email;
    public $checkout_message;
    public $view_form = true;

    public function mount(){
        $id = request('id');
        $selected = Order::where("id", "=", $id)->firstOrFail();
        $this->order_id = $selected->id;
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
        if($selected->status != "processed"){
            $this->view_form=false;
        }
    }

    public function updateStatus(){
        Order::where("id", "=", $this->order_id)->update(array("status" => "success"));
        SendMail::dispatch($this->order_id, $this->customer_email, 'OrderSuccess')->onQueue("Mail_Sender");
    }
    public function render()
    {
        return view('livewire.order-success');
    }
}
