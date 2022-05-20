<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images(){
    	return $this->hasMany('App\ProductImage');
    }
     public function category()
    {

    	 return $this->belongsTo(Category::class);

    }

    public function brand()
    {
    	
    	 return $this->belongsTo(Brand::class);

    }

    public function liquid(){
        return $this->hasMany('App\liquid');
    }

    public function color(){
        return $this->hasMany('App\Color');
    }

    public static function total_on_sell()
    {
        
        
        
         $counts = Product::where('status','1')->count();

    

          return $counts;
     }

     public static function total_product()
     {
      $counts = Product::count();

    

          return $counts;
     }

  
  
}
