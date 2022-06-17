<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Review;

class OrderItem extends Model
{
    use HasFactory;
    protected $table="order_items";
    protected $fillable=[
        'price','quantity','product_id','order_id','status','options'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function review(){
        return $this->hasOne(Review::class);
    }
    // public function reviews(){
    //     return $this->hasMany(Review::class);
    // }
}
