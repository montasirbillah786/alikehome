<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use Carbon\Carbon;
// use App\Comment;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Cart::get(),200);
    }

    public function indexbyid($id)
    {
        return response()->json(Cart::find($id),200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'product_quantuty' => 'required',
        ]);


        $cart = new Cart();


        $cart->user_id=$request->user_id;
        $cart->ip_address =$request->ip_address;
        $cart->product_id =$request->product_id;
        $cart->order_id =$request->order_id;
        $cart->product_quantuty =$request->product_quantuty;
        $cart->sales_update =$request->sales_update;
        $cart->save();

        return response()->json($cart);


    }



    // public function store(Request $request)
    // {
    //     $request->validate
    //    ([

    //     'name' => 'required|max:255',
    //     'image' => 'nullable|image',

    // ],

    // [
    //      'name.required' => "Please provide a brand name ",
    //      'image.image' => "Give .png ,.jpeg, file",
        



    //     ]);


    //    $blog = Blog::create($request->all());
    //    return response()->json($blog);

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
