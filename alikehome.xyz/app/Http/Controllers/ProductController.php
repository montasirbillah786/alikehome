<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\Comment;
use App\Blog;
use App\blogcomment;
use App\Newslater;
use App\Vendor;


class ProductController extends Controller
{
     public function show($id)
    {
        $product = Product::where('id',$id)->first();
        $related_product = Product::where('id','!=',$id)->where('category_id',$product->category_id)->get();
        if (!is_null($product)) {

            //return view('frontend.products.show')->with('product',$product);
            return view('frontend.products.show',compact('product','related_product'));
        }
        else{
            return redirect()->route('index');
        }
    }

     public function comment_store(Request $request){

         $request->validate
       ([

        'comment' => 'required|max:255',



        ],

    [
         'comment.required' => "Please provide give a comment ",





        ]);

       $comment = new Comment();


       $comment->email =$request->email;
       $comment->name =$request->name;
       $comment->product_id = $request->product_id;
       $comment->comment = $request->comment;

       $comment->save();


       return back();

    }

    public function category_sort($id)
    {
      $users = Category::where('id',$id)->orwhere('parent_id',$id)->get();
      $products = Product::where('category_id',$id)->where('product_active',1)->paginate(10);

     //dd($products);
      return view('frontend.filter.categorysort',compact('products','users'));


    }

    public function category_show_all()
    {
       $category = Category::inRandomOrder()->get();
      // dd($category);

       return view('frontend.filter.allCategoryShow',compact('category'));
    }


    public function brand_sort($id)
    {
      $products = Product::where('brand_id',$id)->paginate(10);
      return view('frontend.filter.brandsort',compact('products'));


    }

    public function vendor_sort($id)
    {
        $vendor = Vendor::find($id);
      $products = Product::where('admin_id',$id)->paginate(10);
      return view('frontend.filter.vendorsort',compact('products','vendor'));
    }

    public function blog_detail_show($id)
    {
      $blog = Blog::find($id);
      return view('frontend.blog.blogdetailsshow',compact('blog'));


    }

    public function blogcomment_store(Request $request)
    {

         $request->validate
       ([

        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'comment' => 'required',


        ]);

       $blog = new blogComment();

        $blog->blog_id=$request->blog_id;
        $blog->comment =$request->comment;
        $blog->parent_id =$request->parent_id;
        $blog->name=$request->name;
        $blog->email =$request->email;

        $blog->save();

        return back();



     }

     public function newslater_store(Request $request)
     {

        $request->validate
       ([


        'email' => 'required|max:255',



        ]);

       $blog = new newslater();


        $blog->email =$request->email;

        $blog->save();

        return back();

     }

     public function vendor_store_all()
     {
      $vendor = Vendor::orderBy('id','asc')->get();
      return view('frontend.filter.vendorallstore',compact('vendor'));
     }


}
