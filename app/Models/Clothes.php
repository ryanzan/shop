<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    protected $table='clothes';
    protected $guarded=[];

    public function type(){
        return $this->belongsTo(ClothesType::class,'clothes_type_id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

}
