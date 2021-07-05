<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        return view('livewire.landing-page');
    }

    public function goto($url){
        return redirect()->to($url);
    }
}
