<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClothesType extends Model
{
    protected $guarded=[];

    public function clothes(){
        return $this->hasMany(Clothes::class);
    }
}
