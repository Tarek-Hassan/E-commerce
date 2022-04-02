<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class CartComponent extends Component
{
    public function render()
    {
        $most_viewed_product=Product::inRandomOrder()->limit(8)->get();
        return view('livewire.cart-component',[
            'items'=>$most_viewed_product
        ])->layout('layouts.base');
    }
}
