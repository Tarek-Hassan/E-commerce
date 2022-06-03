<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;
    protected $table="profiles";
    protected $fillable=[
        'image','mobile','line1','line2',
        'city','province','country','zipcode','user_id'
    ];  

    public function profile(){
        return $this->belongsTto(User::class,"user_id");
    }
}
