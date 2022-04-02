<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public function store($id,$name,$price)
    {
        Cart::add($id,$name,1,$price)->associate(Product::class);
        session()->flash('success_message','Item Added to the Cart Successfully');
        return redirect()->route('product.cart');

    }
    public function render()
    {
        return view('livewire.shop-component',[
            'items' => Product::paginate(10),
        ])->layout('layouts.base');
    }
}
