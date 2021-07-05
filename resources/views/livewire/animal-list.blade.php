<div x-data="{open : false}">
    <ul x-show="!open">
        @foreach($animals as $animal)
            <li wire:click="detail_data({{$animal->id}})" @click="open = !open">{{$animal->name}}</li>
        @endforeach
    </ul>
    <div x-show="open">
        @if($show == true)
            <h3><b>Animal Data : </b></h3>
            <div>Name : {{$name}}</div>
            <div>Price : {{$price}}</div>
            <div>Weight : {{$weight}}</div>
            <div><button @click="open = !open" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Back</button></div>
        @else
            <div>Data doesnt exists!</div>
        @endif
    </div>
</div>