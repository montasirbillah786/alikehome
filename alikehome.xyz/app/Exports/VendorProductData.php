<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use App\SalesData;
use Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VendorProductData implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($id) {
        $this->id = $id;

    }

    public function collection()
    {
    	$today = Carbon::now('d');

        $reportdata =  DB::table('sales_data as sd')
            ->join('products as p','sd.product_id','p.id')
            ->join('vendors as v','p.admin_id','v.id')
            ->where('sd.admin_id',$this->id)
            ->select('p.title as product_name','sd.sales_quantity','sd.sales_offer_price','sd.sales_total','sd.invoice_id','sd.created_at','v.name')
            ->get();
            return $reportdata;
    }

    public function headings():array
    {
        return ['Product Name', 'Quantity', 'Price','Total','Invoice Id','Date','Vendor Name'];
    }
}
