<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use App\SalesData;
use Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class monthdatas implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    public function collection()
    {
    	$today = Carbon::now('m');

        $reportdata = SalesData::select('sales_name','sales_sales_number','sales_ip_address','sales_short_name','sales_shipping_address','sales_created_at','sales_title','sales_quantity','admin_id','sales_offer_price','sales_total','invoice_id')->wheremonth('created_at',$today)->where('admin_id',Auth::user()->id)->get();
            return $reportdata; 
    }

    public function headings():array{
    	return['Customer Name','Customer Number','Customer ip Address', 'transaction status', 'Shipping Address','Sales Date','Sales Product Name','Sales Quentity','Admin Id','price','Total Price','Invoice Id'];
    }
}
