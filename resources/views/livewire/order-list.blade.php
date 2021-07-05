<div x-data="{open : false}"> 
    <ul x-show="!open">
        @foreach($orders as $order)
            <li wire:click="detail_data({{$order->id}})" @click="open = !open">{{$order->customer_name}}</li>
        @endforeach
    </ul>
    <div x-show="open">
        @if($show == true)
            <h3><b>Order Data : </b></h3>
            <div>Customer Name : {{$name}}</div>
            <div>Customer Phone : {{$phone}}</div>
            <div>Customer Address : {{$address}}</div>
            <div>Animal Name : {{$a_name}}</div>
            <div>Price : {{$a_price}}</div>
            <div>QUantity : {{$a_qty}}</div>
            <div>Weight : {{$a_weight}}</div>
            <div>Total : {{$sub_total}}</div>
            <div><button @click="open = !open" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Back</button></div>
        @else
            <div>Data doesnt exists!</div>
        @endif
    </div>
</div>