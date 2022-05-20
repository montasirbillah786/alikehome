<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;
// use App\Comment;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Order::get(),200);
    }

    public function indexbyid($id)
    {
        return response()->json(Order::find($id),200);
    }


    public function store(Request $request)
    {
        $request->validate
       ([

        'shipping_address' => 'required|max:255',
        'name' => 'required',
        'phone_number' => 'required',

        ]);


         $order = new Order();

         $order->payment_id = $request->payment_id;
         $order->user_id = $request->user_id;
         $order->ip_address = $request->ip_address;
         $order->name =$request->name;
         $order->phone_number =$request->phone_number;
         $order->shipping_address =$request->shipping_address;
         $order->email =$request->email;
         $order->message =$request->message;
         $order->transaction_number =$request->transaction_number;
         $order->total_price =$request->total_price;
         $order->invoice_id =$request->invoice_id;

         $order->save();

        return response()->json($order);


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
