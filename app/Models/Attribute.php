<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductAttribute;

class Attribute extends Model
{
    use HasFactory;
    protected $table="attributes";
    protected $fillable=[
            'name',
        ]; 
    public function products(){
            return $this->hasMany(ProductAttribute::class,'attribute_id');
        }

}
