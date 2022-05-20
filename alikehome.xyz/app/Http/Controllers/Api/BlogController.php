<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Comment;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Blog::get(),200);
    }

    public function indexbyid($id)
    {
        return response()->json(Blog::find($id),200);
    }


    public function store(Request $request)
    {
        $request->validate
       ([

        'email' => 'required',
        'name' => 'required',
        'product_id' => 'required',
        'comment' => 'required',
        

        ]);


       $blog = new Comment();

        $blog->email=$request->email;
        $blog->name =$request->name;
        $blog->product_id =$request->product_id;
        $blog->comment =$request->comment;
       $blog->active =$request->active;
        $blog->save();

        return response()->json($blog);


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
