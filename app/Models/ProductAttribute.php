<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table="product_attributes";
    protected $fillable=[
            'value','product_id','attribute_id',
        ]; 

    public function product(){
            return $this->belongsTo(Product::class,'product_id');
        }
    public function attribute(){
            return $this->belongsTo(Attribute::class,'attribute_id');
        }
    

}
