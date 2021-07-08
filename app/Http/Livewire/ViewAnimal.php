<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Animal;

class ViewAnimal extends Component
{
    public $name;
    public $price;
    public $weight;
    public $view_error = false;

    public function mount(){
        $id = request("id");
        if($id != null){
            $selected = Animal::where("id", "=", $id)->firstOrFail();
            $this->name = $selected->name;
            $this->price = $selected->price;
            $this->weight = $selected->weight;
        } else {
            $this->view_error = true;
        }
    }
    
    public function render()
    {
        return view('livewire.view-animal');
    }
}
