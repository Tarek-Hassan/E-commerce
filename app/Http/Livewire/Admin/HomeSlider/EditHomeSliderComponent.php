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


    protected function rules(){
        return [
            'title'=>'required',
            'subtitle'=>'required',
            'price'=>'required|numeric|min:0',
            'link'=>'required|url',
            'image'=>'required',
        ];
    }
    
    protected function message(){
        return [
            'title.required'=>'Title Is Required ',
            'subtitle.required'=>'SubTitle Is Required ',
            
            'price.required'=>'Price Is Required ',
            'price.numeric'=>'Price Must be Numeric ',
            'price.min'=>'Price greater Than 0 ',

            'link.required'=>'Link Is Required ',
            'link.url'=>'Link is In vaild',

            'image.required'=>'Image Is Required ',

            'no_of_products.required'=>'No Of Products Is Required ',
        ];
    }



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

        $this->validate();

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
