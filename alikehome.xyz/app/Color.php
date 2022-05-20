<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public static function ProductIdCount($id)
	{
		$counts = Color::where('product_id',$id)->count();
        return $counts;
	}
}
