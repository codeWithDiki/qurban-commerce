<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Animal;
class AnimalList extends Component
{   
    public $animals;
    public $name;
    public $price;
    public $weight;
    public $show = true;

    public function render()
    {   
        $this->animals = Animal::all();
        return view('livewire.animal-list');
    }
    public function detail_data($id){
        $data = Animal::where('id', '=',$id)->get();
        if(count($data) < 1){
            $this->show = false;
        } else {
            $this->name = $data[0]["name"];
            $this->price = $data[0]["price"];
            $this->weight = $data[0]["weight"];
        }
    }
}
