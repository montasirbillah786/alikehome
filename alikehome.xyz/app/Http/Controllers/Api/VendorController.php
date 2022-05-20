<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Vendor;
use Carbon\Carbon;
// use App\Comment;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Vendor::get(),200);
    }

    public function indexbyid($id)
    {
        return response()->json(Vendor::find($id),200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required',
            'image' =>'required',
        ]);


    //    $blog = new Comment();

        $data = Vendor::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->image,
            'created_at' => Carbon::now(),
        ]);

        return response()->json($data, 201);


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
