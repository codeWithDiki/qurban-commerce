<div>
    <div x-data="{ open: false }">
        <form wire:submit.prevent="submit">
            <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name : </label>
            <div class="mt-1">
                <input type="text" wire:model="customer_name" id="customer_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                @error('customer_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <label for="customer_phone" class="block text-sm font-medium text-gray-700">Customer Phone : </label>
            <div class="mt-1">
                <input type="text" wire:model="customer_phone" id="customer_phone" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                @error('customer_phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <label for="customer_address" class="block text-sm font-medium text-gray-700">Customer Address : </label>
            <div class="mt-1">
                <input type="text" wire:model="customer_address" id="customer_address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                @error('customer_address') <span class="error">{{ $message }}</span> @enderror
            </div>
            <label for="qty" class="block text-sm font-medium text-gray-700">Quantity : </label>
            <div class="mt-1">
                <input type="text" wire:model="qty" id="qty" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                @error('qty') <span class="error">{{ $message }}</span> @enderror
            </div>
            <label for="name" class="block text-sm font-medium text-gray-700">Animal : </label>
            <div class="mt-1">
                <select class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        <option>
                            ---
                        </option>
                    @foreach ($animal_choices as $animal)
                        <option value="{{ $animal->id }}" wire:click="showciudades({{$animal->id}})">
                            {{ $animal->name }}
                        </option>
                    @endforeach
                </select>
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button type="submit" @click="open = !open">Save</button>
        </form>
    
        <span x-show="open">
        <h3>Checkout : </h3>
        <div class="border border-gray-500 rounded-md p-3">
            <h5><b>User Info : </b></h5>
            <div>
                Customer Name : {{$customer_name}}
            </div>
            <div>
                Customer Price : {{$customer_phone}}
            </div>
            <div>
                Customer Address : {{$customer_address}}
            </div>
            <h5><b>Animal Info : </b></h5>
            <div>
                Animal Name : {{$name}}
            </div>
            <div>
                Animal Price : {{$price}}
            </div>
            <div>
                Animal Weight : {{$weight}}
            </div>
            <h5><b>Quantity : </b></h5>
            <div>
                Amount : {{$qty}}
            </div>
            <div>
                Sub Total : {{$total}}
            </div>
        </div>
        </span>
    </div>
</div>
