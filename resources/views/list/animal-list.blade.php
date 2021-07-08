@extends('layouts.app')
@section('content')
<div x-data="{modalDetail:false, animalData:{id:null,name:null, price:null, weight:null}}">
    <div class="max-w-5xl mx-auto mt-5">
        <h1 class="mb-5">Animal List : </h1>
        <div class="my-10 p-5 border border-gray-500 rounded-md">
            <div>
              <a href="/animal/add" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Add Animal</a>
              <livewire:animals-table />
            </div>
        </div>
    </div>
</div>
@endsection