<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddProductComponent extends Component
{
    use WithFileUploads;
    public $image;
    public $name;
    public $slug;
    public $stock_status="instock";
    public $category_id='select_Category';
    public $regular_price=0;
    public $sale_price=0;
    public $quantity=0;
    public $SKU;
    public $featured=0;
    public $short_description;
    public $description;



    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }
    public function store(){
        $this->image='storage/'.$this->image->store('products','public');
        Product::create($this->all());
       return redirect()->route("admin.products")->with("success_message",__('created'));
    }

    public function render()
    {

        return view('livewire.admin.product.add-product-component',[
            'categories'=>Category::all()
        ])->layout('layouts.base');
    }
}
