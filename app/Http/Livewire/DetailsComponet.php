<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use App\Models\SaleSetting;
use Carbon\Carbon;

class DetailsComponet extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug=$slug;

    }
    public function store($id,$name,$price)
    {
        Cart::add($id,$name,1,$price)->associate(Product::class);
        session()->flash('success_message','Item Added to the Cart Successfully');
        return redirect()->route('product.cart');

    }
    public function render()
    {
      
        $product=Product::where('slug',$this->slug)->first();
        $popular_product=Product::inRandomOrder()->limit(4)->get(); 
        $related_product=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(6)->get(); 

        $saleSetting=SaleSetting::where('status',true)->first();
        $sale_date= $saleSetting ? Carbon::parse($saleSetting->sale_date)->format('Y/m/d h:m:s') : null ;

        return view('livewire.details-componet',[
                    'item'=>$product,
                    'popular_product'=>$popular_product,
                    'related_product'=>$related_product,
                    'sale_date'=>$sale_date,
                    ])->layout('layouts.base');
    }
}
