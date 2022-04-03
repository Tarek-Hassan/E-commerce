<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product=Cart::get($rowId);
        $qty=$product->qty +1;
        Cart::update($rowId,$qty);
    }

    public function decriceQuantity($rowId){
        $product=Cart::get($rowId);
        $qty=$product->qty +1;
        Cart::update($rowId,$qty);
    }

    public function render()
    {
        $most_viewed_product=Product::inRandomOrder()->limit(8)->get();
        return view('livewire.cart-component',[
            'items'=>$most_viewed_product
        ])->layout('layouts.base');
    }
}
