<?php

namespace App\Http\Controllers;

use App\AdsOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\monthdata;
use App\Exports\dailydata;
use App\Exports\yeardata;
use Maatwebsite\Excel\Facades\Excel;
use App\Order;
use App\Cart;
use App\Product;
use App\SalesData;
use App\Shipping;

use PDF;

class OrderController extends Controller
{
      public function __construct()
    {

        $this->middleware('auth:admin')->except('logout');
    }
     public function ad_manage_order()
    {
        $order=AdsOrder::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);

        return view ('backend.pages.order.adOrder',compact('order'));
    }

    public function ads_view($id)
    {
        $order=AdsOrder::find( $id );
        // return view ('backend.pages.product.index')->with('products',$products);
        // $order = Order::Where('ip_address',request()->ip())
        //                 ->Where('id',$id)
        //                 ->get();
        return view ('backend.pages.order.ads_order_view',compact('order'));
    }

    public function ad_paid_update($id)
    {
        $order=AdsOrder::find($id);

        if(is_null($order->product_image))
        {
            $order->product_image = 1;
            $order->save();
        }

        return back();

    }

     public function manage_order()
    {
        $order=Order::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);

        return view ('backend.pages.order.index',compact('order'));
    }

    public function view($id)
    {
       $order=Order::find( $id );
        // return view ('backend.pages.product.index')->with('products',$products);
        // $order = Order::Where('ip_address',request()->ip())
        //                 ->Where('id',$id)
        //                 ->get();
        return view ('backend.pages.order.order_view',compact('order'));
    }

    public function update($id)
    {
    	$order=Order::find( $id );

    	if($order->processing == 0)
    	{
    		$order->processing = 1;
    		$order->save();
    	}

    	return back();

    }
     public function complete_update($id)
    {
    	$order=Order::find( $id );

    	if($order->confirmed == 0)
    	{
    		$order->confirmed = 1;
    		$order->save();
    	}

    	return back();

    }
    public function paid_update($id)
    {
    	$order=Order::find( $id );

    	if($order->pending == 0)
    	{
    		$order->pending = 1;
    		$order->save();
    	}

    	return back();

    }

    public function invoice_update($id)
    {
        $order=Order::find( $id );

        $pdf = PDF::loadView('backend.pages.order.invoice',compact('order'));
        return $pdf->download('invoice.pdf');

    }

    public function delete($id)
          {

            $order =Order::find($id);

            if(!is_null($order))
            {
                //..... if it is parent brand, then delete all its sub brand than delete brand image ..... //


                //......delete brand image ..... //
                $order->delete();


             }

 return back();


            }


        public function insert(Request $request)
    {

        $salesData = new SalesData;

        $salesData->sales_id =$request->sales_id;
        $salesData->sales_name =$request->sales_name;
        $salesData->sales_sales_number =$request->sales_number;
        $salesData->sales_ip_address =$request->sales_ip_address;
        $salesData->sales_transaction_number =$request->sales_transaction_number;

        $salesData->sales_short_name=$request->sales_short_name;
        $salesData->sales_shipping_address=$request->sales_shipping_address;
        $salesData->sales_created_at=$request->sales_created_at;

        $salesData->sales_title =$request->sales_title;
        $salesData->sales_title_id =$request->sales_product_title;
        $salesData->sales_quantity =$request->sales_quantity;
        $salesData->admin_id =$request->admin_id;
        $salesData->product_id =$request->product_id;
        $salesData->sales_offer_price =$request->sales_offer_price;
        $salesData->sales_total =$request->sales_total;


        $salesData->invoice_id =$request->invoice_id;

        $salesData->save();

        $id=$request->sales_product_title;
        $id1=$request->sales_product_quantity;
        $id2=$request->sales_quantity;
        $product =Product::find($id);
        $product->quantity =$id1-$id2;
        $product->save();

        $cart=Cart::find($request->cart_id);

        $cart->sales_update =1;
        $cart->save();

       // dd($request->all());



        return back();
    }

    public function show()
    {
        $salesdata=SalesData::orderBy('id','desc')->groupBy('invoice_id')->get();


        // $data = DB::table('sales_data')->where('sales_quantity', \DB::raw("(select max(`sales_quantity`) from sales_data)"))->get();

        // $data2 = DB::table("sales_data")
        // ->select(DB::raw("SUM(sales_quantity) as count"),'sales_title as coun')
        // ->groupBy(DB::raw("sales_title"))
        // ->get();



        return view ('backend.pages.sales_stock.index',compact('salesdata'));
    }

    public function view_sales($invoice_id)
    {
        $salesdata=SalesData::where('invoice_id',$invoice_id )->get();

        return view ('backend.pages.sales_stock.view',compact('salesdata'));



    }



    public function paid_updates($id)
    {
        $salesData=SalesData::find( $id );

        if($salesData->sales_is_paid == 0)
        {
            $salesData->sales_is_paid = 1;
            $salesData->save();
        }

        return back();

    }

    public function edit($id){

        $sales = SalesData::find($id);
        if(!is_null( $sales )){
            return view('backend.pages.sales_stock.edit',compact('sales'));

        }
        else{
            return redirect()->route('test.show');

        }
    }

    public function sales_is_paid($sales_id)
    {

      //  $sales = SalesData::find($sales_id);
        foreach (SalesData::Where('sales_id',$sales_id)->get() as $cart) {

          $cart->sales_is_paid = 1;
         $cart->save();
        }


     return back();
        // print_r($sales_id);

    }


    public function pick( $sales_id )
    {
        foreach (SalesData::Where('sales_id',$sales_id)->get() as $cart) {

          $cart->sales_is_picked = 1;
         $cart->save();
        }


     return back();
    }

    public function shipping_store(Request $request)
    {

       $request->validate
       ([

        'invoice_id' => 'required',
        ]);

        $shipping = new Shipping;

        $shipping->invoice_id =$request->invoice_id;
        $shipping->courrier_name =$request->courrier_name;
        $shipping->rider_name =$request->rider_name;
        $shipping->amount =$request->amount;

        $shipping->save();

        return back();

}

    public function sales_is_shipped($sales_id)
    {

      //  $sales = SalesData::find($sales_id);
        foreach (SalesData::Where('sales_id',$sales_id)->get() as $cart) {

          $cart->sales_is_shipped = 1;
         $cart->save();
        }


     return back();
        // print_r($sales_id);

    }

    public function sales_is_paids($sales_id)
    {

      //  $sales = SalesData::find($sales_id);
        foreach (SalesData::Where('sales_id',$sales_id)->get() as $cart) {

          $cart->sales_is_delivered = 1;
         $cart->save();
        }


     return back();
        // print_r($sales_id);



    }

    public function dailydatas()
    {
      return Excel::download(new dailydata,'daily.xlsx');
    }

    public function monthdatas()
    {
      return Excel::download(new monthdata,'month.xlsx');
    }

    public function yeardatas()
    {
      return Excel::download(new yeardata,'year.xlsx');
    }





}
