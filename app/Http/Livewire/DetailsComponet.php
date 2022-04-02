<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class DetailsComponet extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug=$slug;

    }
    public function render()
    {
      
        $product=Product::where('slug',$this->slug)->first();
        $popular_product=Product::inRandomOrder()->limit(4)->get(); 
        $related_product=Product::where('category_id',$product->category_id)->get(); 
        return view('livewire.details-componet',[
                    'item'=>$product,
                    'popular_product'=>$popular_product,
                    'related_product'=>$related_product,
                    ])->layout('layouts.base');
    }
}
