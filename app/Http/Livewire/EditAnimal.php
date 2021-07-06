<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Animal;

class EditAnimal extends Component
{   
    public $name;
    public $price;
    public $weight;
    public $fk_id;

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
        Animal::where('id', '=', $this->fk_id)->update($this->validate());
    }

    public function mount(){
        $this->fk_id = request('id');

        $selected = Animal::where('id', '=',$this->fk_id)->firstOrFail();
        // Array Null
        $this->price = $selected->price;
        $this->name = $selected->name;
        $this->weight = $selected->weight;
    }

    public function render()
    {
        return view('livewire.edit-animal');
    }
}
