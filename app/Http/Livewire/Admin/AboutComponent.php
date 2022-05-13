<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.about-component')->layout('layouts.base');
    }
}
