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
    protected $listeners = ["UpdateAnimal" => "mount"];

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
        return redirect()->to("/animal/list");
    }

    public function mount($id=null){
        if($id != null){
            $this->fk_id = (int)$id;
        } else {
            $id = (int)request("id");
            if($id != null){
                $this->fk_id = $id;
            } else {
                $this->fk_id = null;
            }
        }

        $selected = Animal::where('id', '=',$this->fk_id)->first();
        // Array Null
        if($selected != null){
            $this->price = $selected->price;
            $this->name = $selected->name;
            $this->weight = $selected->weight;
        }
    }

    public function render()
    {
        return view('livewire.edit-animal');
    }
}
