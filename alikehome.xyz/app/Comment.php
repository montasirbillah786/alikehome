<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function relationToproduct()
    {
        return $this->hasone('App\Product', 'id','product_id');
    }
}
