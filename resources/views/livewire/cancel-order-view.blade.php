@if($view_form == true)
 <div x-data="{pending:false}">
    <div x-show="!pending">
    @livewire('view-order', ['view_button' => false])
    <div class="mt-5">
    <a href="/order/edit?id={{$order_id}}" class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Edit</a>
    <a @click="pending = !pending" wire:click="updateStatus()" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Cancel</a>
    </div>
    </div>
    <div x-show="pending">
    Order Canceled!
    </div>
</div>
@else
<div>
This order is on proccess either already success!
</div>
@endif
