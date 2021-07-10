<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Bus;
use Livewire\Livewire;
// JOB
use App\Jobs\SendMail;
// Livewire
use App\Http\Livewire\CreateOrder;
// Model
use App\Models\Order;

class IntegrationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_cannot_create_order_without_animal_id()
    {
        Livewire::test(CreateOrder::class)
        ->set("customer_name", "Diki AKbar")
        ->set("customer_phone", "08134148364608")
        ->set("customer_address", "Kp Sarongge")
        ->set("customer_email", "diki.akbar1304@gmail.com")
        ->set('qty', '4')
        ->set('name', 'Sapi')
        ->set('price', '3000000')
        ->set('weight', '400')
        ->set('amount', '30000000')
        ->set('animalId', '')
        ->set('customer_email', 'diki.akbar1304@gmail.com')
        ->set('status', 'not_verifed')
        ->call('createCheckout');
        $this->assertFalse(Order::where("customer_phone", "=", "0813414836460")->exists());
    }

    public function test_customer_name_is_required(){
        Livewire::test(CreateOrder::class)
        ->set("customer_name", "")
        ->assertHasErrors(['customer_name' => 'required']);
    }
    
    public function test_customer_phone_is_required(){
        Livewire::test(CreateOrder::class)
        ->set("customer_phone", "")
        ->assertHasErrors(['customer_phone' => 'required']);
    }
    public function test_customer_address_is_required(){
        Livewire::test(CreateOrder::class)
        ->set("customer_address", "")
        ->assertHasErrors(['customer_address' => 'required']);
    }
    public function test_customer_email_need_to_be_an_email(){
        Livewire::test(CreateOrder::class)
        ->set("customer_email", "dgwhag")
        ->assertHasErrors(['customer_email' => 'email']);
    }
    public function test_animal_name_is_required(){
        Livewire::test(CreateOrder::class)
        ->set("name", "")
        ->assertHasErrors(['name' => 'required']);
    }
    public function test_animal_weight_is_required(){
        Livewire::test(CreateOrder::class)
        ->set("weight", "")
        ->assertHasErrors(['weight' => 'required']);
    }
    public function test_animal_price_is_required(){
        Livewire::test(CreateOrder::class)
        ->set("price", "")
        ->assertHasErrors(['price' => 'required']);
    }
    public function test_qty_is_required(){
        Livewire::test(CreateOrder::class)
        ->set("qty", "")
        ->assertHasErrors(['qty' => 'required']);
    }

    public function test_amount_is_required(){
        Livewire::test(CreateOrder::class)
        ->set("amount", "")
        ->assertHasErrors(['amount' => 'required']);
    }

    public function test_amount_need_to_be_an_integer_error(){
        Livewire::test(CreateOrder::class)
        ->set("amount", "sdwa")
        ->assertHasErrors(['amount' => 'integer']);
    }

    public function test_qty_need_to_be_an_integer_error(){
        Livewire::test(CreateOrder::class)
        ->set("qty", "sdwa")
        ->assertHasErrors(['qty' => 'integer']);
    }

    public function test_price_need_to_be_an_integer_error(){
        Livewire::test(CreateOrder::class)
        ->set("price", "sdwa")
        ->assertHasErrors(['price' => 'integer']);
    }

    public function test_weight_need_to_be_an_integer_error(){
        Livewire::test(CreateOrder::class)
        ->set("weight", "sdwa")
        ->assertHasErrors(['weight' => 'integer']);
    }

}
