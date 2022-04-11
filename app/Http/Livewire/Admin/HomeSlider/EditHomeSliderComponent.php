<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;

class EditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $new_image;
    public $image;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $slider;

    public function mount($id){
        $this->slider=HomeSlider::find($id);
        if($this->slider){
           $this->image=$this->slider->image;
           $this->title=$this->slider->title;
           $this->subtitle=$this->slider->subtitle;
           $this->price=$this->slider->price;
           $this->link=$this->slider->link;
           $this->status=$this->slider->status;
         

        }else{
            return redirect()->route('admin.homeSliders')->with('error_message',__('not_found'));
        }

    }

    public function update(){

        if($this->new_image){
            $this->image='storage/'.$this->new_image->store('HomeSlider','public');
        }
        $this->slider->update($this->all());
        return redirect()->route('admin.homeSliders')->with('success_message',__('updated'));

    }

    public function render()
    {
        return view('livewire.admin.home-slider.edit-home-slider-component')->layout('layouts.base');
    }
}
