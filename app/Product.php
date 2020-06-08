<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function galleries(){
        return $this->hasMany(Gallery::class,'product_id','id');
    }

    public function chart(){
        return $this->belongsTo(Chart::class,'product_id','id');
    }
}