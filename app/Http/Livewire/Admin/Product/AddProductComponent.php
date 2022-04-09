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
    public $stock_status;
    public $category_id;
    public $regular_price;
    public $sale_price;
    public $quantity;
    public $SKU;
    public $featured;
    public $short_description;
    public $description;

    public function mount(){
        $this->stock_status='instock';
        $this->category_id='select_Category';
        $this->regular_price=0;
        $this->sale_price=0;
        $this->quantity=1;
        $this->featured=0;

    }


    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }
    public function store(){
        $this->image='storage/'.$this->image->store('products','public');
        Product::create($this->all());
       return redirect()->route("admin.products")->with("success_message",'ProductCreatedSuccessfully');
    }

    public function render()
    {

        return view('livewire.admin.product.add-product-component',[
            'categories'=>Category::all()
        ])->layout('layouts.base');
    }
}
