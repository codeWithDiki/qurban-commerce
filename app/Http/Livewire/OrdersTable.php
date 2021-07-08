<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;

class OrdersTable extends LivewireDatatable
{
    public $model = Order::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->filterable()
                ->linkTo('customer_name', 6),
            Column::name("customer_name")
                ->label("Customer Name")
                ->filterable(),
            Column::name("customer_phone")
                ->label("Customer Phone")
                ->filterable(),
            Column::name("customer_address")
                ->label("Customer Address")
                ->filterable(),
            Column::callback([
                'id',
                'customer_name',
                'customer_phone',
                'customer_address',
                'customer_email',
                'qty',
                'name',
                'price',
                'weight',
                'status',
                'amount'], function ($id, $customer_name, $customer_phone, $customer_address, $customer_email, $qty, $name, $price, $weight, $status, $amount) {
                return view('buttons.buttons-order', compact('id',
                'customer_name',
                'customer_phone',
                'customer_address',
                'customer_email',
                'qty',
                'name',
                'price',
                'weight','status','amount'));
            })->label("Actions")
       ];
    }
}