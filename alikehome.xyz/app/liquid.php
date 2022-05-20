<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class liquid extends Model
{
	public static function ProductIdCount($id)
	{
		$counts = liquid::where('product_id',$id)->count();
        return $counts;
	}
    
}
