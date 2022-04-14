<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $paginate=12;
    public $orderBy;
    public $orderType;
    public $min_price=1;
    public $max_price=1000;

    public function mount(){
        $this->sorting='default';
        $this->orderBy='created_at';
        $this->orderType='ASC';
    }

    public function store($id,$name,$price)
    {
        Cart::instance('cart')->add($id,$name,1,$price)->associate(Product::class);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
       
        return redirect()->route('product.cart')->with('success_message','Item Added to the Cart Successfully');

    }



    public function addToWishlist($id,$name,$price){

        Cart::instance('wishlist')->add($id,$name,1,$price)->associate(Product::class);
        $this->emitTo('admin.home-category.wish-list-count-component','refreshComponent');

    }
    public function render()
    {

        if ($this->sorting == 'date') {
            $this->orderType='DESC';
        }else if ($this->sorting == 'price') {
            $this->orderBy='regular_price';
        }else if ($this->sorting == 'price-desc') {
            $this->orderBy='regular_price';
            $this->orderType='DESC';
        }

        $Categories=Category::all();
        
        return view('livewire.shop-component',[
            'items' => Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy($this->orderBy,$this->orderType)->paginate($this->paginate),
            'Categories' => $Categories,
        ])->layout('layouts.base');
    }
}
