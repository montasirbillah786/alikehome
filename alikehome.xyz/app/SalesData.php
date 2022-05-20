<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

class SalesData extends Model
{
       public static function month_order_sum()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::whereMonth('created_at',$today->month)->sum('sales_total');

    

          return $counts;
     }


     public static function year_order_sum()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::whereYear('created_at',$today->year)->sum('sales_total');

    

          return $counts;
     }

     public static function day_order_sum()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::whereDate('created_at',$today)->sum('sales_total');

    

          return $counts;
     }

     public static function delivery_this_day()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::whereDate('created_at',$today)->groupby('invoice_id')->where('sales_is_paid','1')->where('sales_is_picked','1')->where('sales_is_shipped','1')->where('sales_is_delivered','1')->count();

    

          return $counts;
     }
 
     public static function delivery_this_month()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::whereMonth('created_at',$today->month)->where('sales_is_paid','1')->where('sales_is_picked','1')->where('sales_is_shipped','1')->where('sales_is_delivered','1')->count();

    

          return $counts;
     }

     public static function delivery_this_year()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::whereYear('created_at',$today->year)->where('sales_is_paid','1')->where('sales_is_picked','1')->where('sales_is_shipped','1')->where('sales_is_delivered','1')->count();

    

          return $counts;
     }

       public static function picked()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::where('sales_is_picked','0')->count();

    

          return $counts;
     }

       public static function paid()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::where('sales_is_paid','0')->count();

    

          return $counts;
     }

      public static function shipped()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::where('sales_is_shipped','0')->count();

    

          return $counts;
     }

        public static function delivered()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::where('sales_is_delivered','0')->count();

    

          return $counts;
     }



     // vendor..


      public static function month_order_sums()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::whereMonth('created_at',$today->month)->where('admin_id',Auth::user()->id)->sum('sales_total');

    

          return $counts;
     }


     public static function year_order_sums()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::whereYear('created_at',$today->year)->where('admin_id',Auth::user()->id)->sum('sales_total');

    

          return $counts;
     }

     public static function day_order_sums()
    {
        $today = Carbon::now();
        
        
         $counts = SalesData::whereDate('created_at',$today)->where('admin_id',Auth::user()->id)->sum('sales_total');

    

          return $counts;
     }
    


     


 }
