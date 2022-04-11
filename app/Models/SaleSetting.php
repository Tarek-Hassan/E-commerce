<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleSetting extends Model
{
    use HasFactory;
    
    protected $table='sale_settings';
    protected $fillable=['sale_date','status'];
}
