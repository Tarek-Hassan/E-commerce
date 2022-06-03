<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
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
    public $category_id;
    public $regular_price=0;
    public $sale_price=0;
    public $quantity=0;
    public $SKU;
    public $featured=0;
    public $short_description;
    public $description;
    public $images;
    public $sub_category_id;

    protected function rules(){
        return [
            'name'=>'required|min:6',
            'slug'=>'required|unique:products,slug',
            'short_description'=>'max:500',
            'description'=>'required|max:500',
            'regular_price'=>'required|numeric|min:0',
            'sale_price'=>'nullable|numeric|min:0',
            'SKU'=>'required',
            
            'stock_status'=>'required|in:instock,outofstock',
            'featured'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'quantity'=>'required|numeric|min:0',
        ];
    }

    protected function message(){
        return [
            'name.required'=>'Name is Required',
            'name.min'=>'Name is more than 6',
            'slug.required'=>'Slug is Required',
            'slug.unique'=>'Slug is already Exist ',

            'short_description.max'=>'Short Description less Than 500 ',

            'description.required'=>'Description Is Required ',
            'description.max'=>'Description less Than 1000 ',
            
            'regular_price.required'=>'Price Is Required ',
            'regular_price.numeric'=>'Price Must be Numeric ',
            'regular_price.min'=>'Price greater Than 0 ',
            
            'sale_price.numeric'=>'Sale Price Must be Numeric ',
            'sale_price.min'=>'Sale Price greater Than 0 ',
            
            'SKU.required'=>'SKU Is Required ',
            
            'category_id.required'=>'Category Is Required ',
            'sub_category_id.required'=>'Sub Category Is Required ',
            
            'stock_status.required'=>'Stock Status Is Required ',
            'stock_status.in'=>'Stock Status Must be (In Stock or Out Of Stock)',
            
            'featured.required'=>'Featured Is Required ',
            
            'quantity.required'=>'Quantity Is Required ',
            'quantity.numeric'=>'Quantity Must be Numeric ',
            'quantity.min'=>'Quantity greater Than 0 ',
        ];
    }


    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function store(){

        $this->validate();
        $this->image='storage/'.$this->image->store('products','public');
        if($this->images){
            $last_key = array_key_last($this->images);
            $image_names='';
            foreach ($this->images as $key=>$value) {
                $image_names .='storage/'.$value->store('products','public');
                if ($key != $last_key) {
                    $image_names .=',';
                }
            }
            $this->images=$image_names;
           
        }
        Product::create($this->all());
       return redirect()->route("admin.products")->with("success_message",__('created'));
    }

    public function render()
    {

        return view('livewire.admin.product.add-product-component',[
            'categories'=>Category::all(),
            'subcategories'=>SubCategory::where('category_id',$this->category_id)->get(),
        ])->layout('layouts.base');
    }
}
