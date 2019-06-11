<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function clothes(){
        return $this->hasMany(Clothes::class);
    }
}
