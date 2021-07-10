<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
class CancelOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order_id;
    public $customer_name;
    public $customer_phone;
    public $a_name;
    public $a_price;
    public $qty;
    public $amount;
    public $a_weight;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
        $order = Order::where("id", "=", $order_id)->firstOrFail();
        $this->customer_name = $order->customer_name;
        $this->customer_phone = $order->customer_phone;
        $this->a_name = $order->name;
        $this->a_price = $order->price;
        $this->qty = $order->qty;
        $this->amount = $order->amount;
        $this->a_weight = $order->weight;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.cancel');
    }
}
