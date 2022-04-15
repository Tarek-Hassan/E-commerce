<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishListComponent extends Component
{


    public function removeFromWishlist($rowId){
        Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('admin.home-category.wish-list-count-component','refreshComponent');
        // return redirect()->route('product.wishList')->with('success_message',__("removed_wishlist_item"));
    }

    public function store($id,$name,$price)
    {
        Cart::instance('cart')->add($id,$name,1,$price)->associate(Product::class);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        return redirect()->route('product.cart')->with('success_message',__('created'));

    }

    public function render()
    {
        return view('livewire.wish-list-component',[
            'items'=>Cart::instance('wishlist')->content(),
        ])->layout('layouts.base');
    }
}
