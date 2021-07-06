<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Animal;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;

class AnimalsTable extends LivewireDatatable
{
    public $model = Animal::class;
    public $hideable = 'select';
    public $exportable = true;
    public $component;
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

    public function columns()
    {
       return [
            NumberColumn::name('id')
                ->label('ID')
                ->filterable()
                ->linkTo('name', 6),
            Column::name("name")
                ->label("Animal Name")
                ->filterable(),
            NumberColumn::name("price")
                ->label("Animal Price")
                ->filterable(),
            NumberColumn::name("weight")
                ->label("Animal Weight")
                ->filterable(),
            Column::callback(['id', 'name', 'price', 'weight'], function ($id, $name, $price, $weight) {
                return view('buttons.buttons-animal', ['id' => $id, 'name' => $name, 'price' => $price, 'weight' => $weight]);
            })->label("Actions")
       ];
    }
}