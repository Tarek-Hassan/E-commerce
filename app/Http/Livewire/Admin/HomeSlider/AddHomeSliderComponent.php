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

    public function store(){

        $this->validate();
        
        $this->image='storage/'.$this->image->store('HomeSlider','public');
        HomeSlider::create($this->all());
        return redirect()->route('admin.homeSliders')->with('success_message',__('created'));

    }

    public function render()
    {
        return view('livewire.admin.home-slider.add-home-slider-component')->layout('layouts.base');
    }
}
