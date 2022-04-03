<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class CategoryComponent extends Component
{

    use WithPagination;
    public $sorting;
    public $paginate;
    public $orderBy;
    public $orderType;
    public $category_slug;

    public function mount($category_slug){

        $this->sorting='default';
        $this->paginate=12;
        $this->orderBy='created_at';
        $this->orderType='ASC';
        $this->category_slug=$category_slug;

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

        $categories=Category::all();
        $category=Category::where('slug',$this->category_slug)->first();



        return view('livewire.category-component',[
            'items' => Product::where('category_id', $category->id)->orderBy($this->orderBy,$this->orderType)->paginate($this->paginate),
            'Categories' => $categories,
            'category_name' => $category->name,
        ])->layout('layouts.base');
    }
}
