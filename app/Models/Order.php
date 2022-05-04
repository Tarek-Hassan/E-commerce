<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable=[
            'firstname','lastname','mobile','email','line1',
            'line2','city','province','country','zipcode',
            'subtotal','discount','tax','total',
            'status','is_shipping_different','user_id',
            'delivered_at','canceled_at'
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function shipping(){
        return $this->hasOne(Shipping::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }

    public function status(){

        if($this->status=='ordered'){
            return "<span class='label label-info'>".__('ordered')."</span>";
        }elseif($this->status=='delivered'){
             return "<span class='label label-success'>".__('delivered')."</span>";
         }
         return "<span class='label label-danger'>".__('canceled')."</span>";
    }
    public function statusDate(){

        if($this->status=='canceled'){
            return $this->canceled_at;
        }elseif($this->status=='delivered'){
            return $this->delivered_at;
        }
         return "--";
    }

}
