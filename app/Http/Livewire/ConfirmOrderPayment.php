<?php

namespace App\Http\Livewire;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Mail\PaymentConfirmed;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendMail;
class ConfirmOrderPayment extends Component
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
        if($selected->status != "pending"){
            $this->view_form=false;
        }
    }

    public function updateStatus(){
        Order::where("id", "=", $this->order_id)->update(array("status" => "processed"));
        SendMail::dispatch($this->order_id, $this->customer_email, 'PaymentConfirmed')->onQueue("Mail_Sender");
    }

    public function render()
    {
        return view('livewire.confirm-order-payment');
    }
}
