@if($view_form == true)
 <div x-data="{pending:false}">
    @livewire('view-order', ['view_button' => false]
    <div class="mt-5">
    <a @click="pending = !pending" wire:click="updateStatus()" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Finish Order</a>
    </div>
    </div>
    <div x-show="pending">
    Order Success!
    </div>
</div>
@else
<div>
This Order is Success or still on other status!
</div>
@endif
