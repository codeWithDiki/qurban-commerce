@if($view_form == true)
 <div x-data="{pending:false}">
    <div x-show="!pending">
    <label for="name" class="block text-sm font-medium text-gray-700">Customer Name :</label>
        <div class="mt-1">
            <div>{{$customer_name}}</div>
        </div>
    <label for="price" class="block text-sm font-medium text-gray-700">Customer Phone :</label>
        <div class="mt-1">
            <div>{{$customer_phone}}</div>
        </div>
    <label for="weight" class="block text-sm font-medium text-gray-700">Customer Address :</label>
        <div class="mt-1">
            <div>{{$customer_address}}</div>
        </div>
    <label for="weight" class="block text-sm font-medium text-gray-700">Customer Email :</label>
        <div class="mt-1">
            <div>{{$customer_address}}</div>
        </div>
    <label for="name" class="block text-sm font-medium text-gray-700">Animal Name :</label>
        <div class="mt-1">
            <div>{{$name}}</div>
        </div>
    <label for="price" class="block text-sm font-medium text-gray-700">Animal Price :</label>
        <div class="mt-1">
            <div>{{$price}}</div>
        </div>
    <label for="weight" class="block text-sm font-medium text-gray-700">Animal Weight :</label>
        <div class="mt-1">
            <div>{{$weight}}</div>
        </div>
    <label for="weight" class="block text-sm font-medium text-gray-700">Quantity :</label>
        <div class="mt-1">
            <div>{{$qty}}</div>
        </div>
    <label for="weight" class="block text-sm font-medium text-gray-700">Total :</label>
        <div class="mt-1">
            <div>{{$amount}}</div>
        </div>
    <div class="mt-5">
    <a @click="pending = !pending" wire:click="updateStatus()" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Confirm Payment</a>
    </div>
    </div>
    <div x-show="pending">
    Payment Confirmed!
    </div>
</div>
@else
<div>
The order is still not verifed or maybe the order is already on proccess or success!
</div>
@endif
