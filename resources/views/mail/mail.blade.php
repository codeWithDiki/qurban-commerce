@component('mail::message')
<h1>Here's your checkout : </h1>
-----------------------
<h4>User Info : </h4>
<div>
<b>Name : </b>{{$customer_name}}
</div>
<div>
<b>Phone : </b>{{$customer_phone}}
</div>
<h4>Animal Info : </h4>
<div>
<b>Name : </b>{{$a_name}}
</div>
<div>
<b>Price : </b>{{$a_price}}
</div>
<div>
<b>Weight : </b>{{$a_weight}}
</div>
<h4>Total & Quantity : </h4>
<div>
<b>Total : </b>{{$amount}}
</div>
<div>
<b>Quantity : </b>{{$qty}}
</div>
<div>
@component('mail::button', ['url' => "bootcamp.test:8000/order/verify?id=".$order_id])
Verify Order
@endcomponent
</div>
@endcomponent