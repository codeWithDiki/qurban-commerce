@extends('layouts.app')
@section('content')
<div x-data="{modalDetail:false, orderData:{id:false,customer_name:false,customer_phone:false,customer_address:false,qty:false,name:false,price:false,weight:false,total:false}}">
    <div class="max-w-5xl mx-auto mt-5">
        <h1 class="mb-5">Order List : </h1>
        <div class="my-10 p-5 border border-gray-500 rounded-md">
            <div>
              <a href="/order/create" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Create  Order</a>
              <livewire:orders-table />
            </div>
        </div>
    </div>
</div>
@endsection