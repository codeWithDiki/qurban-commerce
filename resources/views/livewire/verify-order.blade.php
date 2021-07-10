 @if($view_form == true)
 <div x-data="{pending:false}">
     <div x-show="!pending">
        @livewire('view-order', ['view_button' => false]
        <div class="mt-5">
        <a href="/order/edit?id={{$order_id}}" class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Edit</a>
        <a @click="pending = !pending" wire:click="updateStatus()" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Verify</a>
        </div>
    </div>
    <div x-show="pending">
    Verify Success!, we sent an email about invoice detail, but if you want to access it, you can click button below.
    <div class="mt-5"><a href="/order/detail?id={{$order_id}}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">See Datail</a></div>
    <div>
</div>
@else
<div>
You already verify this invoice!
</div>
@endif
