<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use App\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Product::get(),200);
    }

    public function indexbyid($id)
    {
        $success['product'] = Product::find($id);
        $success['product_image'] =ProductImage::where('product_id',$id)->get();

        return response()->json(['success'=>$success],200);
    }

    public function index_image()
    {
        return response()->json(ProductImage::get(),200);
    }

    public function indexbyid_image($id)
    {
        return response()->json(ProductImage::find($id),200);
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
