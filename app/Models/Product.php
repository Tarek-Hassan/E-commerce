<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\OrderItem;
use App\Models\ProductAttribute;


class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=[
            'name','slug','short_description','description',
            'regular_price','sale_price','SKU','stock_status',
            'featured','quantity','image','images','category_id','sub_category_id'
        ];  

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class,'product_id');
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class,'product_id');
    }

    public function status(){

       if($this->stock_status=='instock'){
           return "<span class='label label-success'>".__('instock')."</span>";
        }
        return "<span class='label label-danger'>".__('outofstock')."</span>";
    }
}
