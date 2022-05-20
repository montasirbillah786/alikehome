<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Store2;
use App\Store3;
use App\Store4;
Use Image;
Use File;

class ImageController extends Controller
{
	public function __construct()
    {
        
        $this->middleware('auth:admin')->except('logout');
    }
     public function manage_image()
    {
        $image=Store::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);
        // $image1=Store1::orderBy('id','desc')->get();
        // $image2=Store2::orderBy('id','desc')->get();
        
        return view ('backend.pages.image.index',compact('image'));
    }

    public function image_create()
    {
    	
    	return view ('backend.pages.image.create');
   	
    }

       public function image_store(Request $request)
    {

          $request->validate
       ([

      //   'note' => 'required|max:255',
        'image' => 'required|image',
        

    ],

    [
         // 'note.required' => "Please provide  ",
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

       $store = new store();

        $store->note=$request->note;
        $store->sell_description=$request->sell_description;
        $store->sell_note=$request->sell_note;
        $store->link=$request->link;
       // $brand->parent_id =$request->parent_id;


        // ...... insert image ...... //

          if($request->image > 0 ){
         
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/banner/'.$img);
            Image::make($image)->save($location);
            $store->image =$img;


            $store->active =$request->active;

      }
     
        $store->save();

        return redirect()->route('image.show');

  
       
     }

     public function delete($id)
     {
        $brand =store::find($id);

            if(!is_null($brand))
            {

                if(File::exists(public_path('img/banner/'.$brand->image))){

                File::delete(public_path('img/banner/'.$brand->image));
             }


                $brand->delete();

            }
            return back();
     }

    

    public function edit($id){
        
        $store = Store::find($id);
        if(!is_null( $store )){
            return view('backend.pages.image.edit',compact('store'));

        }
        else{
            return redirect()->route('image.show');

        }
    }

     public function update( Request $request,$id)
        {

              $request->validate
       ([

      //   'note' => 'required|max:255',
        'image' => 'nullable|image',
        

    ],

    [
         // 'note.required' => "Please provide  ",
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

           $store =Store::find($id);

            $store->note=$request->note;
            $store->sell_description=$request->sell_description;
            $store->sell_note=$request->sell_note;
            $store->link=$request->link;
            $store->active =$request->active;


            

              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists(public_path('img/banner/'.$store->image))){

                File::delete(public_path('img/banner/'.$store->image));
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/banner/'.$img);
                Image::make($image)->save($location);
                $store->image =$img;

          }
         
            $store->save();

            return redirect()->route('image.manage');

      
           
         }



         public function manage_image2()
    {
        $image=Store2::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);
        // $image1=Store1::orderBy('id','desc')->get();
        // $image2=Store2::orderBy('id','desc')->get();
        
        return view ('backend.pages.image.index2',compact('image'));
    }

    public function image_create2()
    {
    	
    	return view ('backend.pages.image.create2');
   	
    }

       public function image_store2(Request $request)
    {

          $request->validate
       ([

        'link' => 'required|max:255',
        'image' => 'required|image',
        

    ],

    [
         'link.required' => "Please provide  ",
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

       $store = new store2();

        
        $store->link=$request->link;
       // $brand->parent_id =$request->parent_id;


        // ...... insert image ...... //

      if( $request->image> 0 ){
         
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/banner2/'.$img);
            Image::make($image)->save($location);
            $store->image =$img;


            $store->active =$request->active;

     }
     
        $store->save();

        return redirect()->route('image2.show');

  
       
     }

    

    public function edit2($id){
        
        $store = Store2::find($id);
        if(!is_null( $store )){
            return view('backend.pages.image.edit2',compact('store'));

        }
        else{
            return redirect()->route('image2.show');

        }
    }

     public function update2( Request $request,$id)
        {

              $request->validate
       ([

        'link' => 'required|max:255',
        'image' => 'nullable|image',
        

    ],

    [
         'link.required' => "Please provide  ",
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

           $store =Store2::find($id);

            
            $store->link=$request->link;
            $store->active =$request->active;


            

              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists(public_path('img/banner2/'.$store->image))){

                File::delete(public_path('img/banner2/'.$store->image));
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/banner2/'.$img);
                Image::make($image)->save($location);
                $store->image =$img;

          }
         
            $store->save();

            return redirect()->route('image2.manage');

      
           
         }


      public function manage_image3()
    {
        $image=Store3::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);
        // $image1=Store1::orderBy('id','desc')->get();
        // $image2=Store2::orderBy('id','desc')->get();
        
        return view ('backend.pages.image.index3',compact('image'));
    }

     public function edit3($id){
        
        $store = Store3::find($id);
        if(!is_null( $store )){
            return view('backend.pages.image.edit3',compact('store'));

        }
        else{
            return redirect()->route('image3.show');

        }
    }

     public function update3( Request $request,$id)
        {

              $request->validate
       ([

        'link' => 'required|max:255',
        'image' => 'nullable|image',
        

    ],

    [
         'link.required' => "Please provide  ",
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

           $store =Store3::find($id);

            
            $store->link=$request->link;
            $store->active =$request->active;


            

              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists(public_path('img/banner3/'.$store->image))){

                File::delete(public_path('img/banner3/'.$store->image));
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/banner3/'.$img);
                Image::make($image)->save($location);
                $store->image =$img;

          }
         
            $store->save();

            return redirect()->route('image3.manage');

      
           
         }


      public function manage_image4()
    {
        $image=Store4::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);
        // $image1=Store1::orderBy('id','desc')->get();
        // $image2=Store2::orderBy('id','desc')->get();
        
        return view ('backend.pages.image.index4',compact('image'));
    }

    public function image_create4()
    {
    	
    	return view ('backend.pages.image.create4');
   	
    }

       public function image_store4(Request $request)
    {

          $request->validate
       ([

       
        'image' => 'required|image',
        

    ],

    [
        
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

       $store = new store4();

        $store->note=$request->note;
        $store->sell_description=$request->sell_description;
        $store->sell_note=$request->sell_note;
        $store->link=$request->link;
       // $brand->parent_id =$request->parent_id;


        // ...... insert image ...... //

         if( $request->image > 0 ){
         
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/banner4/'.$img);
            Image::make($image)->save($location);
            $store->image =$img;


            $store->active =$request->active;

     }
     
        $store->save();

        return redirect()->route('image4.show');

  
       
     }

    

    public function edit4($id){
        
        $store = Store4::find($id);
        if(!is_null( $store )){
            return view('backend.pages.image.edit4',compact('store'));

        }
        else{
            return redirect()->route('image4.show');

        }
    }

     public function update4( Request $request,$id)
        {

              $request->validate
       ([

        
        'image' => 'nullable|image',
        

    ],

    [
         
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

           $store =Store4::find($id);

            $store->note=$request->note;
            $store->sell_description=$request->sell_description;
            $store->sell_note=$request->sell_note;
            $store->link=$request->link;
            $store->active =$request->active;


            

              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists(public_path('img/banner4/'.$store->image))){

                File::delete(public_path('img/banner4/'.$store->image));
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/banner4/'.$img);
                Image::make($image)->save($location);
                $store->image =$img;

          }
         
            $store->save();

            return redirect()->route('image4.manage');

      
           
         }
}
