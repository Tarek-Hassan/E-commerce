<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductAttribute;
use App\Models\Attribute;
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
    public $images;
    public $new_img;
    public $galary_images;
    public $sub_category_id;
    public $attribute_ids;

    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values = [];


    public function mount($slug){
        $this->product=Product::where('slug',$slug);
        
        if($this->product->count() > 0){
            $this->product=$this->product->first();
            $this->image=$this->product->image;
            $this->name=$this->product->name;
            $this->slug=$this->product->slug;
            $this->stock_status=$this->product->stock_status;
            $this->category_id=$this->product->category_id;
            $this->sub_category_id=$this->product->sub_category_id;
            $this->regular_price=$this->product->regular_price;
            $this->sale_price=$this->product->sale_price;
            $this->quantity=$this->product->quantity;
            $this->SKU=$this->product->SKU;
            $this->featured=$this->product->featured;
            $this->short_description=$this->product->short_description;
            $this->description=$this->product->description;
            $this->images=explode(',',$this->product->images);


            $this->inputs=$this->product->attributes->where('product_id',$this->product->id)->unique('attribute_id')->pluck('attribute_id');
            $this->attribute_arr=$this->product->attributes->where('product_id',$this->product->id)->unique('attribute_id')->pluck('attribute_id');
            foreach ($this->attribute_arr as $arr) {
                $attr_values=ProductAttribute::where('attribute_id',$arr)->where('product_id',$this->product->id)->get()->pluck('value');
               $values='';
               foreach ($attr_values as  $value) {
                   $values .=$value.',';
               }

               $this->attribute_values[$arr] =rtrim($values,',');
            }
           
            
        }else{
            return redirect()->route("admin.products")->with('error_message',__('not_found'));
        }

    }

    protected function rules(){
        return [
            'name'=>'required|min:6',
            'slug'=>'required|unique:products,slug,'.$this->product->id,
            'short_description'=>'max:500',
            'description'=>'required|max:500',
            'regular_price'=>'required|numeric|min:0',
            'sale_price'=>'nullable|numeric|min:0',
            'SKU'=>'required',
            
            'category_id'=>'required',
            'sub_category_id'=>'required',
            
            'stock_status'=>'required|in:instock,outofstock',
            'featured'=>'required',
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

    public function removeAttribute($index){
        unset($this->inputs[$key]);
        unset($this->attribute_arr[$key]);

    }
    
    public function add(){

       if(!in_array($this->attr,$this->attribute_arr)){
           array_push($this->inputs,$this->attr);
           array_push($this->attribute_arr,$this->attr);

       }
    }
    public function generateSlug(){
        $this->slug=Str::slug($this->name);

    }


    public function update(){
        $this->validate();
        if($this->new_img){
            unlink($this->image);
            $this->image='storage/'.$this->new_img->store('products','public');
        }
       
        if($this->galary_images){
            if($this->images){
                foreach ($this->images as $image) {
                    unlink($image);
                }
            }
            $last_key = array_key_last($this->galary_images);
            $image_names='';
            foreach ($this->galary_images as $key=>$value) {
                $image_names .='storage/'.$value->store('products','public');
                if ($key != $last_key) {
                    $image_names .=',';
                }
            }
            $this->images=$image_names;
        }else{
            $this->images=implode(',',$this->images);
        }
        $this->product->update($this->all());
        // 

        ProductAttribute::where('product_id',$this->product->id)->delete();
        foreach ($this->attribute_values as $key => $attribute_value) {
            $avalues=explode(',',$attribute_value);
            foreach ($avalues as $avalue) {
                ProductAttribute::create([
                    'value'=>$avalue,
                    'product_id'=> $this->product->id,
                    'attribute_id'=>$key,

                ]);
            }
        }
        // 
      

        return redirect()->route("admin.products")->with('success_message',__('updated'));
    }

    public function render()
    {

        return view('livewire.admin.product.edit-product-component',[
            'categories'=>Category::all(),
            'attributes'=>Attribute::all(),
            'subcategories'=>SubCategory::where('category_id',$this->category_id)->get(),
        ])->layout('layouts.base');
    }
}
