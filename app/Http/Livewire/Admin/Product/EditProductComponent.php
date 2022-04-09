<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditProductComponent extends Component
{
    use WithFileUploads;
    public $product;
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
    public $new_img;


    public function mount($slug){
        $this->product=Product::where('slug',$slug);

        if($this->product->count() > 0){
            $this->product=$this->product->first();
            $this->image=$this->product->image;
            $this->name=$this->product->name;
            $this->slug=$this->product->slug;
            $this->stock_status=$this->product->stock_status;
            $this->category_id=$this->product->category_id;
            $this->regular_price=$this->product->regular_price;
            $this->sale_price=$this->product->sale_price;
            $this->quantity=$this->product->quantity;
            $this->SKU=$this->product->SKU;
            $this->featured=$this->product->featured;
            $this->short_description=$this->product->short_description;
            $this->description=$this->product->description;
            
        }else{
            return redirect()->route("admin.products")->with('error_message','Product Not Fount');
        }

    }

    public function generateSlug(){
        $this->slug=Str::slug($this->name);

    }
    public function update(){
        if($this->new_img){
            $this->image='storage/'.$this->new_img->store('products','public');
        }
        $this->product->update($this->all());
        return redirect()->route("admin.products")->with('success_message','Product Updated Successfully');
    }
    public function render()
    {

        return view('livewire.admin.product.edit-product-component',[
            'categories'=>Category::all(),
        ])->layout('layouts.base');
    }
}
