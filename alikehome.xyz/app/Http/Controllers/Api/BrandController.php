<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;
// use App\Comment;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Brand::get(),200);
    }

    public function indexbyid($id)
    {
        return response()->json(Brand::find($id),200);
    }


    public function store(Request $request)
    {
    //     $request->validate([
    //         'category_name' => 'required',
    //         'description' => 'required',
    //     ]);


    // //    $blog = new Comment();

    //     $data = category::insert([
    //         'category_name' => $request->category_name,
    //         'description' => $request->description,
    //         'parent_id' => $request->parent_id,
    //         'created_at' => Carbon::now(),
    //     ]);

    //     return response()->json($data, 201);


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
