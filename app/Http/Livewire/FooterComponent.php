<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;

class FooterComponent extends Component
{
    public $setting;


    public function mount(){
        $this->setting=Setting::first();
    }

    public function render()
    {
        return view('livewire.footer-component',[
            'setting'=>$this->setting
        ])->layout('layouts.base');
    }
}
