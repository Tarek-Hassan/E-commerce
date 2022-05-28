<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Cart;

class CategoryComponent extends Component
{

    use WithPagination;
    public $sorting;
    public $paginate;
    public $orderBy;
    public $orderType;
    public $category_slug;
    public $scategory_slug;

    public function mount($category_slug,$scategory_slug=null){

        $this->sorting='default';
        $this->paginate=12;
        $this->orderBy='created_at';
        $this->orderType='ASC';

        $this->category_slug=$category_slug;
        $this->scategory_slug=$scategory_slug;
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
        if($this->scategory_slug){
            $category=SubCategory::where('slug',$this->scategory_slug)->first();
            $filter="sub_";
        }else{
            $category=Category::where('slug',$this->category_slug)->first();
            $filter="";
        }



        return view('livewire.category-component',[
            'items' => Product::where($filter.'category_id', $category->id)->orderBy($this->orderBy,$this->orderType)->paginate($this->paginate),
            'Categories' => $categories,
            'category_name' => $category->name,
        ])->layout('layouts.base');
    }
}
