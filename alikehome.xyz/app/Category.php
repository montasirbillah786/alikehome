<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
    	
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function products()
    {
    	
        return $this->hasMany(Product::class);
    }

     public static function total_on_display()
    {
        
        
        
         $counts = Category::where('admin_id','1')->count();

    

          return $counts;
     }
     
}
