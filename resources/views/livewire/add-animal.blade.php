<div>
    <div x-data="{open : false}">
        <span x-show="!open">
            <form wire:submit.prevent="submit">
                <label for="name" class="block text-sm font-medium text-gray-700">Animal Name :</label>
                <div class="mt-1">
                    <input type="text" wire:model="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <label for="price" class="block text-sm font-medium text-gray-700">Animal Price :</label>
                <div class="mt-1">
                    <input type="number" wire:model="price" id="price" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    @error('price') <span class="error">{{ $message }}</span> @enderror
                </div>
                <label for="weight" class="block text-sm font-medium text-gray-700">Animal weight :</label>
                <div class="mt-1">
                    <input type="number" wire:model="weight" id="weight" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    @error('weight') <span class="error">{{ $message }}</span> @enderror
                </div>
                <button type="submit" @click="open = !open" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Save</button>
            </form>
        </span>
        <span x-show="open">
            <h3>Animal has been add to database!</h3>
        </span>
    </div>
</div>
