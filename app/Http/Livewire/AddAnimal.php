<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Animal;

class AddAnimal extends Component
{   
    public $name;
    public $price;
    public $weight;

    public $rules = [
        'name' => 'required|min:6',
        'price' => 'required',
        'weight' => 'required'
    ];

    public function updated($property_name)
    {
        $this->validateOnly($property_name);
    }

    public function submit()
    {
        Animal::create($this->validate());
    }

    public function render()
    {
        return view('livewire.add-animal');
    }
}
