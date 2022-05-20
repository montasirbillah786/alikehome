<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class Order extends Model
{
    public function user()
    {
    	
    return $this->belongsTo(User::class);

     }

       public function payment()
    {
        
    return $this->belongsTo(Payment::class);

     }

       public static function month_order()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereMonth('created_at',$today->month)->where('invoice_id','!=',NULL)->count();

    

          return $counts;
     }

       public static function month_success_order()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereMonth('created_at',$today->month)->where('invoice_id','!=',NULL)->where('pending','1')->where('confirmed','1')->where('processing','1')->count();

    

          return $counts;
     }

     public static function month_pending()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereMonth('created_at',$today->month)->where('pending','0')->count();

    

          return $counts;
     }

     public static function month_confirm()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereMonth('created_at',$today->month)->where('confirmed','0')->count();

    

          return $counts;
     }

      public static function month_processing()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereMonth('created_at',$today->month)->where('confirmed','0')->count();

    

          return $counts;
     }

      public static function new_order()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereDate('created_at',$today)->where('pending','0')->where('confirmed','0')->where('processing','0')->count();

    

          return $counts;
     }


     public static function pending_order()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereDate('created_at',$today)->where('pending','0')->count();

    

          return $counts;
     }
       public static function confirmed_order()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereDate('created_at',$today)->where('confirmed','0')->count();

    

          return $counts;
     }

        public static function process_order()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereDate('created_at',$today)->where('processing','0')->count();

    

          return $counts;
     }


     public static function order_count_vendor()
     {
      $order =DB::table('orders')
                ->join('carts','orders.id', '=', 'carts.order_id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->Where('products.admin_id',Auth::user()->id)
                ->Where('carts.sales_update',0)
                ->select('products.title','carts.order_id','orders.id','orders.pending','orders.confirmed','orders.processing','orders.name','orders.created_at')
                ->count();

                return $order;
     }

      public static function month_order_vendor()
    {
        $today = Carbon::now();
        
        
         $counts = Order::whereMonth('created_at',$today->month)->where('invoice_id','!=',NULL)->count();

    

          return $counts;
     }

     public static function order_count_vendor_p()
     {
      $order =DB::table('orders')
                ->join('carts','orders.id', '=', 'carts.order_id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->Where('products.admin_id',Auth::user()->id)
                ->Where('carts.sales_update',0)
                ->select('products.title as p','carts.order_id','orders.id','orders.pending','orders.confirmed','orders.processing','orders.name','orders.created_at')
                ->get();

                return $order;
     }
}
