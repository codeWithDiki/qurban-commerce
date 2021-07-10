<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyOrderSuccess;
use App\Mail\PaymentConfirmed;
use App\Mail\OrderSuccessPleaseCheckItNow;
use App\Mail\CancelOrder;
use App\Models\Order;
class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public string $order_id, public string $customer_email, public string $todo)
    {
        
    }

    /**
     * Execute the .
     *
     * @return void
     */
    public function handle()
    {
        if(is_int($this->order_id)){
            switch($this->todo){
                case 'CreateOrder':
                    Mail::to($this->customer_email)->send(new OrderMail($this->order_id));
                    break;
                case 'VerifyOrder':
                    Order::where("id", "=", $this->order_id)->update(array("status" => "pending"));
                    Mail::to($this->customer_email)->send(new verifyOrderSuccess($this->order_id));
                    break;
                case 'PaymentConfirmed':
                    Order::where("id", "=", $this->order_id)->update(array("status" => "processed"));
                    Mail::to($this->customer_email)->send(new PaymentConfirmed($this->order_id));
                    break;
                case 'OrderSuccess':
                    Order::where("id", "=", $this->order_id)->update(array("status" => "success"));
                    Mail::to($this->customer_email)->send(new OrderSuccessPleaseCheckItNow($this->order_id));
                    break;
                case 'CancelOrder':
                    Order::where("id", "=", $this->order_id)->update(array("status" => "canceled"));
                    Mail::to($this->customer_email)->send(new CancelOrder($this->order_id));
                    break;
                default:
                    return false;
                    break;
            }
            return true;
        } else {
            return false;
        }
    }
}
