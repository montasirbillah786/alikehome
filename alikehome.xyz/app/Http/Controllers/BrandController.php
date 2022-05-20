<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
Use Image;
Use File;


class BrandController extends Controller
{
     public function __construct()
    {
        
        $this->middleware('auth:admin')->except('logout');
    }
    
    public function index()
    {
    	$brand=Brand::orderBy('id','desc')->get();
        return view ('backend.pages.brand.index')->with('brand',$brand);
    }

    public function brand_create()
    {
    	//$brand=brand::orderBy('id','desc')->where('parent_id',NULL)->get();
    	return view('backend.pages.brand.create'); //comapct and with same 
    }

         public function brand_store(Request $request)
    {

          $request->validate
       ([

        'name' => 'required|max:255',
        

    ],

    [
         'name.required' => "Please provide a brand name ",
         
        



        ]);

       $brand = new brand();

        $brand->name=$request->name;
        $brand->description =$request->description;
       // $brand->parent_id =$request->parent_id;


        // ...... insert image ...... //

          if( $request->image > 0 ){
         
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/brand/'.$img);
            Image::make($image)->save($location);
            $brand->image =$img;

      }
     
        $brand->save();

        return redirect()->route('admin.brand');

  
       
     }

     public function edit($id){
        
        $brand = Brand::find($id);
        if(!is_null( $brand )){
            return view('backend.pages.brand.edit',compact('brand'));

        }
        else{
            return redirect()->route('admin.brand');

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
             'name.required' => "Please provide a brand Name ",
             'image.image' => "Give .png ,.jpeg, file",
            



            ]);

           $brand =Brand::find($id);

            $brand->name=$request->name;
            $brand->description =$request->description;
            


            

              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists(public_path('img/brand/'.$brand->image))){

                File::delete(public_path('img/brand/'.$brand->image));
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/brand/'.$img);
                Image::make($image)->save($location);
                $brand->image =$img;

          }
         
            $brand->save();

            return redirect()->route('admin.brand');

      
           
         }


     public function delete($id)
          {

            
            $products=Product::where('brand_id',$id)->get();

            if($products->count() > 0)
            {
                return view ('backend.pages.brand.product_index',compact('products'));
            }

            else{
                $brand =Brand::find($id);
                if(!is_null($brand))
            {
                
             

                //......delete brand image ..... //

                if(File::exists(public_path('img/brand/'.$brand->image))){

                File::delete(public_path('img/brand/'.$brand->image));
             }
                
                
                $brand->delete();

            }
            }
            return back();

           }
}
