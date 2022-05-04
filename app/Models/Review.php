<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\User;

class Review extends Model
{
    use HasFactory;
    protected $table="reviews";

    protected $fillable=[
        'rating','comment','order_item_id','user_id'
    ];  

    public function orderItem(){
        return $this->belongsTo(OrderItem::class,'order_item_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
