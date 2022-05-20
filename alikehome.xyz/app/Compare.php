<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    public function product()
    {
    	
    return $this->belongsTo(Product::class);

     }

     function relationToimage()
    {
        return $this->hasone('App\ProductImage', 'product_id','product_id');
    }
}
