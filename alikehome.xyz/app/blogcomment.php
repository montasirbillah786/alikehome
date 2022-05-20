<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogcomment extends Model
{

      public static function comment_count()
    {
         $counts = blogcomment::where('active','0')->count();
          return $counts;
     }
 }
