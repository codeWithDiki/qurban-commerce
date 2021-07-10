<div>
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
        <div>{{$customer_email}}</div>
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
<label for="weight" class="block text-sm font-medium text-gray-700">Status :</label>
    <div class="mt-1">
        <div>{{$status}}</div>
    </div>
    @if($view_button == true)
    <div>
        <div class="mt-5"><a href="/order/list" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Back To Order List</a></div>
    <div>
    @endif
</div>
