<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table="settings";
    protected $fillable=[
        'email','phone','phone2','address',
        'map','twitter','facebook','pinterest',
        'instagram','youtube'
    ];
}
