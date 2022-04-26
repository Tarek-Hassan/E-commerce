<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThankComponent extends Component
{
    public function render()
    {
        return view('livewire.thank-component')->layout('layouts.base');
    }
}
