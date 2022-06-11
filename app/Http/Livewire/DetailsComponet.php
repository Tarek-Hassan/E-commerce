<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use App\Models\SaleSetting;
use Carbon\Carbon;
use App\Models\ProductAttribute;

class DetailsComponet extends Component
{
    public $slug;
    public $qty;
    public $attr_values ;

    public function mount($slug){
        $this->slug=$slug;
        $this->qty=1;
        $this->attr_values = [];

    }
    public function store($id,$name,$price)
    {
        
        
        Cart::instance('cart')->add($id,$name,$this->qty,$price,$this->attr_values)->associate(Product::class);
        session()->flash('success_message',__('created'));
        return redirect()->route('product.cart');
    }
    
    public function reduceQty(){
        if($this->qty > 1){
            $this->qty--;
        }
    }

    public function increaseQty(){
        $this->qty++;
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
