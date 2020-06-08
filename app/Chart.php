<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    public function products(){
        return $this->hasMany(Product::class,'id','product_id');
    }
    public function galleries(){
        return $this->hasMany(Gallery::class,'id','product_id');
    }
}
