<?php

namespace App\Http\Controllers;

use App\Exports\categorydata;
use App\Exports\VendorProductData;
use App\ExtraFacility;
use App\SalesData;
use App\Seosystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\Vendor;
Use Image;
use App\ProductImage;
use App\Newslater;
use App\liquid;
use App\Color;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AdminPagesController extends Controller
{
     public function __construct()
    {

        $this->middleware('auth:admin')->except('logout');
    }

    public function index()
    {

    	return view ('backend.index');

    }

     public function product_create()
    {

        return view ('backend.pages.product.create');

    }

      public function manage_products()
    {
        $products=Product::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);

        return view ('backend.pages.product.index',compact('products'));
    }

     public function product_store(Request $request)
    {

      // dd($request->all());
       $request->validate
       ([

        'title' => 'required|max:255',
        'description' => 'required',
        'offer_price' => 'required|numeric',
        'category_id' => 'required|numeric',
       // 'brand_id' => 'required|numeric',
        ]);

        $product = new product;

        $product->title =$request->title;
        $product->description =$request->description;
       if($request->price != NULL){
          $product->price =$request->price;
        }else{
          $product->price =0;
        }
        $product->offer_price =$request->offer_price;

        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->admin_id=$request->admin_id;


        $product->bathroom=$request->bathroom;
        $product->type=$request->type;
        $product->size=$request->size;
        $product->room_id=$request->room_id;
        $product->floor_no=$request->floor_no;
        $product->available_date=$request->available_date;
        $product->balcony=$request->balcony;
        $product->address=$request->address;
        $product->product_active=1;
        $product->save();

        $extra = new ExtraFacility();
        $extra->product_id = $product->id;
        $extra->extra_facilities1 = $request->extra_facilities1;
        $extra->extra_facilities2 = $request->extra_facilities2;
        $extra->extra_facilities3 = $request->extra_facilities3;
        $extra->extra_facilities4 = $request->extra_facilities4;
        $extra->extra_facilities5 = $request->extra_facilities5;
        $extra->extra_facilities6 = $request->extra_facilities6;
        $extra->extra_facilities7 = $request->extra_facilities7;
        $extra->extra_facilities8 = $request->extra_facilities8;
        $extra->extra_facilities9 = $request->extra_facilities9;
        $extra->extra_facilities10 = $request->extra_facilities10;
        $extra->extra_facilities11 = $request->extra_facilities11;
        $extra->extra_facilities12 = $request->extra_facilities12;
        $extra->extra_facilities13 = $request->extra_facilities13;

        $countVar = (is_null($request->extra_facilities1) ? 0 : 1)
            + (is_null($request->extra_facilities2) ? 0 : 1)
            +  (is_null($request->extra_facilities3) ? 0 : 1)
            + (is_null($request->extra_facilities4) ? 0 : 1)
            + (is_null($request->extra_facilities5) ? 0 : 1)
            + (is_null($request->extra_facilities6) ? 0 : 1)
            + (is_null($request->extra_facilities7) ? 0 : 1)
            + (is_null($request->extra_facilities8) ? 0 : 1)
            + (is_null($request->extra_facilities9) ? 0 : 1)
            + (is_null($request->extra_facilities10) ? 0 : 1)
            + (is_null($request->extra_facilities11) ? 0 : 1)
            + (is_null($request->extra_facilities12) ? 0 : 1)
            + (is_null($request->extra_facilities13) ? 0 : 1)
        ;
        $extra->countStart = $countVar;
        $extra->type = 'product';



        $extra->save();


           if( $request->product_image > 0 ){

            foreach ($request->product_image as $image) {

                $random = Str::random(10);

            $img = $random.'.'. $image->getClientOriginalExtension();
            $location = public_path('img/product/'.$img);
            Image::make($image)->save($location);

            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();


            }
           }


        return redirect()->route('backend.pages.product.create');

    }

    public function product_edit( $id )
    {
        $products=Product::find($id);
        $extra=ExtraFacility::where('product_id',$id)->first();
        $today = Carbon::today();
        return view('backend.pages.product.edit',compact('products','extra'));
    }

    public function product_update(Request $request,$id)
    {
      // dd($request->all());
       $request->validate
       ([
           'title' => 'required|max:255',
           'description' => 'required',
           'offer_price' => 'required|numeric',
           'category_id' => 'required|numeric',
        ]);

        $product = Product::find($id);

        $product->title =$request->title;
        $product->description =$request->description;
        if($request->price != NULL){
            $product->price =$request->price;
        }else{
            $product->price =0;
        }
        $product->offer_price =$request->offer_price;

        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->admin_id=$request->admin_id;


        $product->bathroom=$request->bathroom;
        $product->type=$request->type;
        $product->size=$request->size;
        $product->room_id=$request->room_id;
        $product->floor_no=$request->floor_no;
        $product->available_date=$request->available_date;
        $product->balcony=$request->balcony;
        $product->product_active=1;
        $product->save();

        $extra = ExtraFacility::where('id',$request->ex_id)->first();
        $extra->product_id = $product->id;
        $extra->extra_facilities1 = $request->extra_facilities1;
        $extra->extra_facilities2 = $request->extra_facilities2;
        $extra->extra_facilities3 = $request->extra_facilities3;
        $extra->extra_facilities4 = $request->extra_facilities4;
        $extra->extra_facilities5 = $request->extra_facilities5;
        $extra->extra_facilities6 = $request->extra_facilities6;
        $extra->extra_facilities7 = $request->extra_facilities7;
        $extra->extra_facilities8 = $request->extra_facilities8;
        $extra->extra_facilities9 = $request->extra_facilities9;
        $extra->extra_facilities10 = $request->extra_facilities10;
        $extra->extra_facilities11 = $request->extra_facilities11;
        $extra->extra_facilities12 = $request->extra_facilities12;
        $extra->extra_facilities13 = $request->extra_facilities13;

        $extra->save();

        return redirect()->route('backend.pages.product.index');

    }

     public function product_delete($id)
   {

    $product =Product::find($id);
    $image=ProductImage::where('product_id', $id)->get();

    //return response()->json($product);


    if(!is_null($product))
    {
        $product->delete();


           foreach ($image as $image) {

            $file_name = $image->image;

            // if(file_exists(public_path("img/product/".$file_name))){
            //     unlink(public_path("img/product/".$file_name));
            // }
          //  print_r($file_name);

            if(File::exists(public_path('img/product/'.$image->image))){

                File::delete(public_path('img/product/'.$image->image));
             }



            $image->delete();


            }



}






    return back();

   }

   public function manage_products_sell()
    {
        $products=Product::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);

        return view ('backend.pages.product.all_products_show',compact('products'));
    }

    public function product_edit_sell( $id )
    {
        $products=Product::find( $id );
        return view('backend.pages.product.edit_sell',compact('products'));
    }

    public function product_update_sell(Request $request,$id)
    {

       $request->validate
       ([
        'status' => 'required',
        ]);

        $product =Product::find($id);

        $product->status =$request->status;



        $product->save();

        return redirect()->route('backend.pages.product.index');

    }


    public function display_catregory()
    {
        $category=Category::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);

        return view ('backend.pages.product.display_category',compact('category'));
    }

    public function display_sell($id)
    {
       $category=Category::find( $id );
        return view('backend.pages.product.edit_display',compact('category'));
    }

    public function display_update(Request $request,$id)
    {

       $request->validate
       ([
        'admin_id' => 'required',

        ]);

        $category =Category::find($id);

        $category->admin_id =$request->admin_id;



        $category->save();

        return redirect()->route('display.category.show');

    }


    public function newslater_detail()
     {
      $newslater = Newslater::orderby('id','desc')->get();
      return view('backend.pages.comment.newslater_show',compact('newslater'));
     }

     public function newslater_delete($id)
   {

    $product =Newslater::find($id);





    if(!is_null($product))
    {
        $product->delete();


            }




     return back();

   }

   public function vendor_create()
   {

     return view('backend.pages.vendor.addvendorinfo');
   }

   public function vendor_store(Request $request)
   {

   //dd($request->all());
    $request->validate
       ([

        'name' => 'required|max:255',
        'email' => 'required|max:255',
       // 'password' => 'required|string|min:6|',

        ]);
      $pass = '123456789';
       $vendor = new vendor;

       $vendor->name =$request->name;
        $vendor->email =$request->email;
        $vendor->description =$request->description;
        $vendor->address =$request->address;
        $vendor->password =Hash::make($pass);

        if( $request->image > 0 ){

            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/vendor/'.$img);
            Image::make($image)->save($location);
            $vendor->image =$img;

      }

        if( $request->image_banner > 0 ){

            $image = $request->file('image_banner');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/vendor/banner/'.$img);
            Image::make($image)->save($location);
            $vendor->banner_image =$location;

      }

        $vendor->save();

       $extra = new ExtraFacility();
       $extra->product_id = $vendor->id;
       $extra->extra_facilities1 = $request->extra_facilities1;
       $extra->extra_facilities2 = $request->extra_facilities2;
       $extra->extra_facilities3 = $request->extra_facilities3;
       $extra->extra_facilities4 = $request->extra_facilities4;
       $extra->extra_facilities5 = $request->extra_facilities5;
       $extra->extra_facilities6 = $request->extra_facilities6;
       $extra->extra_facilities7 = $request->extra_facilities7;
       $extra->extra_facilities8 = $request->extra_facilities8;
       $extra->extra_facilities9 = $request->extra_facilities9;
       $extra->extra_facilities10 = $request->extra_facilities10;
       $extra->extra_facilities11 = $request->extra_facilities11;
       $extra->extra_facilities12 = $request->extra_facilities12;
       $extra->extra_facilities13 = $request->extra_facilities13;

       $countVar = (is_null($request->extra_facilities1) ? 0 : 5)
           + (is_null($request->extra_facilities2) ? 0 : 4)
           +  (is_null($request->extra_facilities3) ? 0 : 3.5)
           + (is_null($request->extra_facilities4) ? 0 : 4.5)
           + (is_null($request->extra_facilities5) ? 0 : 4.5)
           + (is_null($request->extra_facilities6) ? 0 : 3)
           + (is_null($request->extra_facilities7) ? 0 : 3.5)
           + (is_null($request->extra_facilities8) ? 0 : 5)
           + (is_null($request->extra_facilities9) ? 0 : 3)
           + (is_null($request->extra_facilities10) ? 0 : 3.5)
           + (is_null($request->extra_facilities11) ? 0 : 3.5)
           + (is_null($request->extra_facilities12) ? 0 : 5)
           + (is_null($request->extra_facilities13) ? 0 : 3)
       ;
       $extra->countStart = ($countVar/5.15);
       $extra->type = 'vendor';



       $extra->save();

        return back();


   }

  public function vendor_show()
  {
    $vendor =Vendor::orderby('id','desc')->get();
    return view('backend.pages.vendor.showvendorinfo',compact('vendor'));
  }

  public function vendor_edit($id)
  {
    $vendor=Vendor::find( $id );
    return view('backend.pages.vendor.editvendorinfo',compact('vendor'));
  }
  public function vendor_update(Request $request,$id)
  {
     // dd($request->all());
    $request->validate
       ([

        'name' => 'required|max:255',
       // 'email' => 'required|max:255',
        //'password' => 'required|string|min:6|',

        ]);

        $vendor =Vendor::find($id);

      $request->validate
      ([

          'name' => 'required|max:255',
          'email' => 'required|max:255',
          // 'password' => 'required|string|min:6|',

      ]);
      $pass = '123456789';
      $vendor = Vendor::find($id);

      $vendor->name =$request->name;
     // $vendor->email =$request->email;
      $vendor->description =$request->description;
      $vendor->address =$request->address;
      $vendor->password =Hash::make($pass);

      if( $request->image > 0 ){

          $image = $request->file('image');
          $img = time().'.'. $image->getClientOriginalExtension();
          $location = public_path('img/vendor/'.$img);
          Image::make($image)->save($location);
          $vendor->image =$img;

      }

      if( $request->image_banner > 0 ){

          $image = $request->file('image_banner');
          $img = time().'.'. $image->getClientOriginalExtension();
          $location = public_path('img/vendor/banner/'.$img);
          Image::make($image)->save($location);
          $vendor->banner_image =$location;

      }

      $vendor->save();


        return redirect()->route('admin.vendor.show');
  }

  public function vendor_delete($id)
   {

    $product =Vendor::find($id);





    if(!is_null($product))
    {
        $product->delete();


            }




     return back();

   }



     public function show_image($id)
   {


    $product_image =Product::find($id);
    return view ('backend.pages.product.product_image',compact('product_image'));


   }


   public function edit_image($id)
   {
    $product_image =ProductImage::find($id);
    return view ('backend.pages.product.product_image_edit',compact('product_image'));
   }
   public function update_image(Request $request,$id)
   {

    $product_image =ProductImage::find($id);

    if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists(public_path('img/product/'.$product_image->image))){

                File::delete(public_path('img/product/'.$product_image->image));
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/product/'.$img);
                Image::make($image)->save($location);
                $product_image->image = $img;

          }

        $product_image->save();

        return back();
   }

   public function productimage_delete($id)

          {

             $blog =ProductImage::find($id);

            if(!is_null($blog))
            {


                if(File::exists(public_path('img/product/'.$blog->image))){

                File::delete(public_path('img/product/'.$blog->image));
             }


                $blog->delete();

            }
            return back();

           }

   public function add_multiple_image($id)
   {
    $product_id = $id;
    return view('backend.pages.product.product_image_add',compact('product_id'));

   }

   public function add_image(Request $request)
   {
   //  dd($request->id);

     $product_image = new ProductImage();
     $product_image->product_id = $request->id;

     if( $request->image > 0 ){


             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/product/'.$img);
                Image::make($image)->save($location);
                $product_image->image = $img;

          }

        $product_image->save();

        return back();


   }

   public function active_product()
   {

     $product=Product::orderBy('id','desc')->where('product_active',0)->get();
        // return view ('backend.pages.product.index')->with('products',$products);

      return view ('backend.pages.product.active_product',compact('product'));
   }

   public function active_product_req($id)
    {
       $product=Product::find( $id );
        return view('backend.pages.product.edit_active_req',compact('product'));
    }

    public function product_update_active_req(Request $request,$id)
    {

       $request->validate
       ([


        'product_active' => 'required',





        ]);

        $product =Product::find($id);

        $product->product_active =$request->product_active;



        $product->save();

        return redirect()->route('active.product.show');

    }



public function product_liquid($id)
    {
        $products=Product::find($id);
        return view('backend.pages.product.liquid',compact('products'));

    }

      public function product_liquid_store(Request $request)
    {
      $request->validate
       ([
        'amount' => 'required',
        ]);

        $liquid = new liquid;

        $liquid->amount =$request->amount;
        $liquid->product_id =$request->product_id;

        $liquid->save();
        return back();
    }

    public function product_liquid_delete($id)
   {
     $brand =liquid::find($id);
     $brand->delete();
      return back();

    }

    public function product_color($id)
    {
        $products=Product::find($id);
        return view('backend.pages.product.color',compact('products'));

    }

   public function product_color_store(Request $request)
    {
      $request->validate
       ([
        'name' => 'required',
        ]);

        $color = new Color;

        $color->colors =$request->name;
        $color->product_id =$request->product_id;

        $color->save();
        return back();
    }

    public function product_color_delete($id)
   {
     $brand =color::find($id);
     $brand->delete();
      return back();

    }

    public function product_edit_jfu( $id )
    {
        $products=Product::find( $id );
        return view('backend.pages.product.jfu_deal',compact('products'));
    }

    public function product_update_jfu(Request $request,$id)
    {

       $request->validate
       ([

        'jfu' => 'required',

        ]);

        $product =Product::find($id);

        $product->jfu =$request->jfu;



        $product->save();

        return redirect()->route('backend.pages.product.index');

    }

    // ...... new ....

    public function inventory_support_with_date(){
     //  $date = SalesData::groupby('sales_created_at')->orderby('id','desc')->get();
        $date = SalesData::select(\DB::raw('DATE(sales_created_at) as sales_created_at'))
            ->groupBy(\DB::raw('DATE(sales_created_at)'))->orderby('id','desc')->get();

       return view('backend.pages.inventory.index',compact('date'));

    }
    public function inventory_support_with_category($date){
         $data = DB::table('sales_data as sd')
                    ->join('orders as o','sd.sales_id','o.id')
                    ->join('carts as c','c.order_id','o.id')
                    ->join('products as p','c.product_id','p.id')
                    ->join('categories as ca','p.category_id','ca.id')
                   ->whereDate('sd.sales_created_at',$date)
                  ->groupBy('ca.id')
                   ->select('ca.name as category_name','ca.id as id',\DB::raw('DATE(sd.sales_created_at) as date'))
                   ->get();
        return view('backend.pages.inventory.index_category',compact('data'));
    }

    public function inventory_support_with_product($id,$date){
        $data = DB::table('sales_data')
            ->join('products as p','sales_data.sales_title_id','p.id')
            ->join('categories as c','p.category_id','c.id')
            ->where('p.category_id',$id)
            ->whereDate('sales_data.sales_created_at',$date)

            ->select('p.title as product_name','sales_data.admin_id as vendor','sales_data.*')
            ->get();
        return view('backend.pages.inventory.index_product',compact('data'));
    }

    public function category_data($id,$date){
        return Excel::download(new categorydata($id,$date),'list.xlsx');
    }

    public function vendor_support_product(){
         $vendor = SalesData::where('sales_is_picked',0)->groupby('admin_id')->get();
         return view('backend.pages.vendor_support.index',compact('vendor'));
    }

    public function vendor_wise_product($id){
        $salesdata = SalesData::where('admin_id',$id)->get();
        return view('backend.pages.vendor_support.product_show',compact('salesdata'));
    }

    public function vendor_wise_product_data($id){
        return Excel::download(new VendorProductData($id),'product_list.xlsx');
    }

    public function seoSystem(){
       $data = Seosystem::all();
       return view('backend.pages.seo.index',compact('data'));
    }

    public  function seoSystemId($id){
        $data = Seosystem::find($id);
        return view('backend.pages.seo.edit',compact('data'));
    }

    public function seoSystemIdPost(Request $request,$id){
        $data = Seosystem::find($id);
        $data->seo_title = $request->seo_title;
        $data->seo_keyword = $request->seo_keyword;
        $data->seo_description = $request->seo_description;

        $data->save();
        return back();
    }





}
