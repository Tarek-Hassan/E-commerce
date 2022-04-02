<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.home-component')
                ->layout('layouts.base');
    }
}
