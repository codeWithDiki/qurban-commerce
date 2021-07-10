@if($view_form == true)
 <div x-data="{pending:false}">
    @livewire('view-order', ['view_button' => false]
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
