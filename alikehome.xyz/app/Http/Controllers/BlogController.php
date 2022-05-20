<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Blogcomment;
Use Image;
Use File;


class BlogController extends Controller
{
    
      public function __construct()
    {
        
        $this->middleware('auth:admin')->except('logout');
    }
    public function index()
    {
    	$blog=Blog::orderBy('id','desc')->get();
        return view ('backend.pages.blog.index')->with('blog',$blog);
    }

    public function blog_create()
    {
    	//$brand=brand::orderBy('id','desc')->where('parent_id',NULL)->get();
    	return view('backend.pages.blog.create'); //comapct and with same 
    }


     public function blog_store(Request $request)
    {

          $request->validate
       ([

        'name' => 'required|max:255',
        'image' => 'nullable|image',

    ],

    [
         'name.required' => "Please provide a brand name ",
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

       $blog = new blog();

        $blog->name=$request->name;
        $blog->tag =$request->tag;
        $blog->description1 =$request->description1;
        $blog->description2 =$request->description2;
       // $blog->parent_id =$request->parent_id;


        // ...... insert image ...... //

          if( $request->image > 0 ){
         
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/blog/'.$img);
            Image::make($image)->save($location);
            $blog->image =$img;

      }
     
        $blog->save();

        return redirect()->route('admin.blog');

  
       
     }

      public function edit($id){
        
        $blog = Blog::find($id);
        if(!is_null( $blog )){
            return view('backend.pages.blog.edit',compact('blog'));

        }
        else{
            return redirect()->route('admin.blog');

        }
    }


         public function update( Request $request,$id)
        {

              $request->validate
           ([

            'name' => 'required|max:255',
            'image' => 'nullable|image',

        ],
        [
             'name.required' => "Please provide a blog Name ",
             'image.image' => "Give .png ,.jpeg, file",
            



            ]);

           $blog =Blog::find($id);

            $blog->name=$request->name;
            $blog->tag =$request->tag;
            $blog->description1 =$request->description1;
            $blog->description2 =$request->description2;
            


            

              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists(public_path('img/blog/'.$blog->image))){

                File::delete(public_path('img/blog/'.$blog->image));
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/blog/'.$img);
                Image::make($image)->save($location);
                $blog->image =$img;

          }
         
            $blog->save();

            return redirect()->route('admin.blog');

      
           
         }

      public function delete($id)
          {

            $blog =Blog::find($id);

            if(!is_null($blog))
            {
                //..... if it is parent brand, then delete all its sub brand than delete brand image ..... //
             

                //......delete brand image ..... //

                if(File::exists(public_path('img/blog/'.$blog->image))){

                File::delete(public_path('img/blog/'.$blog->image));
             }


                $blog->delete();

            }
            return back();

           }

           public function blog_comment_show()
           {

            $blog=BlogComment::orderBy('id','desc')->get();
           return view ('backend.pages.blog.blogcommentshow')->with('blog',$blog);

           }

           public function blog_comment_edit($id)
           {

            $blog =BlogComment::find($id);
            return view ('backend.pages.blog.blogcommentedit')->with('blog',$blog);

           }
           public function blog_comment_update(Request $request,$id)
           {

            $blog =BlogComment::find($id);

            $blog->active =$request->active;

            $blog->save();

            return redirect()->route('blog.comment.show');
           }

    

}


