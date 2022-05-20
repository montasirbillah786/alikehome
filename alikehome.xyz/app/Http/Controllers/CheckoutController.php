<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Payment;
use App\Order;
use App\Cart;
use Auth;


class CheckoutController extends Controller
{
    public function index()
    {
    	$payment=Payment::orderBy('priority','asc')->get();
        return view ('frontend.checkout.index')->with('payment',$payment);

   	
    }

     public function carts_store(Request $request)
    {


         $request->validate
       ([

        'shipping_address' => 'required|max:255',
        'name' => 'required',
        'phone_number' => 'required|numeric',
        'email' => 'required',

        ]);

       $invoice = "safia";
       $rand =rand(0,999);
    

        $order = new Order;



        if(Auth::check()){
        $order->user_id =Auth::id();
         }
         $order->payment_id = $request->payment_id;
         $order->ip_address =request()->ip();
         $order->name =$request->name;
         $order->phone_number =$request->phone_number;
         $order->shipping_address =$request->shipping_address;
         $order->email =$request->email;
         $order->message =$request->message;
         $order->transaction_number =$request->transaction_number;
         $order->total_price =$request->total_price;
         $order->invoice_id =$invoice.request()->ip().$rand;
         

         

        
        $order->save();

        foreach (Cart::totalcarts() as $cart) {
         $cart->order_id = $order->id;
         $cart->save();
        }

        $details = [
            'title' => $invoice.request()->ip().$rand,
            'name' => $order->id,
            'price'=> $request->total_price,
            'cname' => $request->name,
            'email' =>$request->email,
            'cnumber' =>$request->phone_number,
            'shipaddress'=>$request->shipping_address,
            'url' => 'In above you get your invoice id and track your product .',
            'website' => 'www.grabsoft.tech'


        ];

    // Mail::to($request->email)
    //      ->cc($request->email)
    //      ->bcc($request->email)
         
    //   ->send(new WelcomeMail($details));

      return redirect()->route('frontend.success.index',$order->id);
    
           }

public function success($id)
    {
        $order=order::find( $id );
        return view ('frontend.success.index',compact('order'));

    
    }

           public function order_update($id)
    {

        $order=order::find( $id );
        foreach (Cart::Where('ip_address',$order->ip_address)->get() as $cart) {
         $cart->order_id = Null;
         $cart->product_quantuty = 0;
         $cart->save();
        }
    
        
        return redirect()->route('backend.pages.order.index');

    }
}
