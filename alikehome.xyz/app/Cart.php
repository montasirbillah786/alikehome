<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
      public function user()
    {
    	
    return $this->belongsTo(user::class);

     }
     public function product()
    {
    	
    return $this->belongsTo(Product::class);

     }
     public function order()
    {
    	
    return $this->belongsTo(Order::class);

     }



         public static function totalcarts()
    {
        if(Auth::check()){
        
    $carts = Cart::Where('user_id',Auth::id())
                      ->orwhere('ip_address',request()->ip())
                      ->where('order_id', Null)
                      ->get();

     }
     else{
        $carts = Cart::Where('ip_address',request()->ip())->where('order_id', Null)->get();
     }

     return $carts;
     }

     





       public static function totalItems()
    {
        $carts=Cart::totalcarts();


     $total_item=0;

     foreach ($carts as $cart) {
         $total_item +=$cart->product_quantuty ;
     }

     return $total_item;

}
}
