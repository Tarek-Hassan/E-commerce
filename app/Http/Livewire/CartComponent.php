<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;

class CartComponent extends Component
{


    public function increaseQuantity($rowId){
        
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty +1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
    }

    public function reduceQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
    }

    public function removeItem($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message",'Item Deleted Successfully');
    }
    
    public function destroy(){
        Cart::instance('cart')->destroy();
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message",'Shopping Cart is Clear Successfully');
    }
    
    public function moveToCart($rowId){
        $item=Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,$item->qty,$item->price)->associate(Product::class);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message",__('moved_to_savelater'));
    }
    // SaveLater
    public function switchToSaveLater($rowId){
        $item=Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,$item->qty,$item->price)->associate(Product::class);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message_save",__('moved_to_savelater'));
    }
    
    public function removeItemFromSaveLate($rowId){
        Cart::instance('saveForLater')->remove($rowId);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message_save",__('delete_from_savelater'));
    }

    public function render()
    {
        
        $most_viewed_product=Product::inRandomOrder()->limit(8)->get();
        return view('livewire.cart-component',[
            'items'=>$most_viewed_product
        ])->layout('layouts.base');
    }
}
