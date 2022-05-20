<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use App\SalesData;
use Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class categorydata implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($id,$data) {
        $this->id = $id;
        $this->data = $data;
    }

    public function collection()
    {
    	$today = Carbon::now('d');

        $reportdata =  DB::table('sales_data as sd')
            ->join('orders as o','sd.sales_id','o.id')
            ->join('carts as c','c.order_id','o.id')
            ->join('products as p','c.product_id','p.id')
            ->join('vendors as v','v.id','p.admin_id')
            ->join('categories as ca','p.category_id','ca.id')
            ->where('ca.id',$this->id)
            ->where('sd.sales_created_at',$this->data)
            ->select('p.title as product_name','sd.sales_quantity','sd.sales_offer_price','sd.sales_total','sd.invoice_id','sd.created_at','v.name')
            ->get();
            return $reportdata;
    }

    public function headings():array
    {
        return ['Product Name', 'Quantity', 'Price','Total','Invoice Id','Date','Vendor Name'];
    }
}
