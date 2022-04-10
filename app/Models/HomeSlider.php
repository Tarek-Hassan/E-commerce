<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $table="home_sliders";
    protected $fillable=['title','subtitle','price','link','image','status'];

    // public function ScopeActive(){


    // }
    public function status(){

        if($this->stock_status){
            return "<span class='label label-success'>".__('active')."</span>";
         }
         return "<span class='label label-danger'>".__('in_active')."</span>";
     }
}
