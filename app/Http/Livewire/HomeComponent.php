<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.home-component',[
            'sliders'=>HomeSlider::all()
        ])
                ->layout('layouts.base');
    }
}
