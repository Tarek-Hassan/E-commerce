<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class SearchComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $paginate;
    public $orderBy;
    public $orderType;

    public $search;
    public $product_cat;
    public $product_cat_id;


    public function mount(){
        $this->sorting='default';
        $this->paginate=12;
        $this->orderBy='created_at';
        $this->orderType='ASC';

        // $this->product_cat='All Category';
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    public function store($id,$name,$price)
    {
        Cart::add($id,$name,1,$price)->associate(Product::class);
        session()->flash('success_message','Item Added to the Cart Successfully');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        // dd($this->all());

        if ($this->sorting == 'date') {
            $this->orderType='DESC';
        }else if ($this->sorting == 'price') {
            $this->orderBy='regular_price';
        }else if ($this->sorting == 'price-desc') {
            $this->orderBy='regular_price';
            $this->orderType='DESC';
        }
    //    dd($this->all(),Product::where('name','like','%'.$this->search.'%')->
    //    where('category_id','like','%'.$this->product_cat_id.'%')->
    // orderBy($this->orderBy,$this->orderType)->paginate($this->paginate));

        $Categories=Category::all();

        return view('livewire.search-component',[
            'items' => Product::where('name','like','%'.$this->search.'%')->
            where('category_id','like','%'.$this->product_cat_id.'%')->
            // where('category_id',$this->product_cat_id)->
         orderBy($this->orderBy,$this->orderType)->paginate($this->paginate),

            'Categories' => $Categories,
        ])->layout('layouts.base');
    }
}
