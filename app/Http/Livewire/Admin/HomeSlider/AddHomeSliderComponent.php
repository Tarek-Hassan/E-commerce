<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;

class AddHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $title;
    public $subtitle;
    public $price=0;
    public $link;
    public $status=0;

    public function store(){
        $this->image='storage/'.$this->image->store('HomeSlider','public');
        HomeSlider::create($this->all());
        return redirect()->route('admin.homeSliders')->with('success_message',__('created'));

    }

    public function render()
    {
        return view('livewire.admin.home-slider.add-home-slider-component')->layout('layouts.base');
    }
}
