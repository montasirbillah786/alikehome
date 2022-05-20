<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Comment;
use App\Compare;

class CartsController extends Controller
{

	public function index()
    {
         return view ('frontend.carts.index');
    }
    public function update(Request $request,$id)
    {
         $cart =Cart::find($id);

         $cart->product_quantuty =$request->product_quantuty;

         $cart->save();
         return redirect()->route('carts.show');
    }
      public function store(Request $request)
    {
        $this->validate($request , [
            'product_id' => 'required',
            'product_quantuty' =>'required'
        ],
        [
            'product_id.required' => "please",
            'product_quantuty.required'=>"please provide quentity"


        ]

        );

        if(Auth::check()){

             $cart = Cart::Where('user_id',Auth::id())
                      ->Where('product_id', $request->product_id)
                      ->first();

        }
        else{
             $cart = Cart::Where('ip_address', request()->ip())
                      ->Where('product_id', $request->product_id)
                      ->where('sales_update',0)
                      ->where('order_id',NULL)
                      ->first();
        }

        if(!is_null($cart)){
           $cart->increment('product_quantuty',$request->product_quantuty);
          //  $cart->product_quantuty= $cart->product_quantuty + $request->product_quantuty;



        }

        else{

            $cart = new Cart();
        if(Auth::check()){
            $cart->user_id = Auth::id();

        }

      $cart->ip_address = request()->ip();
       $cart->product_id = $request->product_id;
       $cart->product_quantuty=$request->product_quantuty;
       $cart->liquids=$request->liquids;
       $cart->colors=$request->colors;
       $cart->save();

        }

       session()->flash('success','product kk');
       return redirect()->route('carts.show');


    }

    public function delete($id)
   {

    $Cart =Cart::find($id);

    if(!is_null($Cart))
    {
        $Cart->delete();

    }
    return back();
}


public function admin_carts_update(Request $request,$id)
    {
         $cart =Cart::find($id);

         $cart->product_quantuty =$request->product_quantuty;

         $cart->save();
         return back();
    }


    public function compare_store(Request $request){

       $this->validate($request , [
            'product_id' => 'required',

        ],
        [
            'product_id.required' => "please",



        ]

        );


       if(Auth::check()){

             $cart = Compare::Where('user_id',Auth::id())
                      ->Where('product_id', $request->product_id)
                      ->first();

        }
        else{
             $cart = Compare::Where('ip_address', request()->ip())
                      ->Where('product_id', $request->product_id)
                      ->first();
        }

        if(!is_null($cart)){
           return back();

        }

        else{

            $cart = Compare::Where('ip_address', request()->ip())->count();


      if($cart>2)
      {
        return back();
      }
      else{

       $compare = new Compare;




        if(Auth::check()){
            $compare->user_id = Auth::id();

        }
        $compare->product_id =$request->product_id;
        $compare->ip_address =request()->ip();
        $compare->product_quantuty =$request->product_quantuty;


        $compare->save();

        return back();

    }
}

}


public function compare_show(){

         $compare=Compare::orderBy('id','desc')->where('ip_address',request()->ip())->get();
          return view ('frontend.compare.index',compact('compare'));
}

public function compare_delete($id)
{

  $Cart =Compare::find($id);

    if(!is_null($Cart))
    {
        $Cart->delete();

    }
    return back();

}


}
