<?php

namespace App\Http\Controllers;

use App\ExtraFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Exports\monthdatas;
use App\Exports\dailydatas;
use App\Exports\yeardatas;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use App\SalesData;
Use Image;
use App\ProductImage;
use App\Newslater;
use Carbon\Carbon;
use PDF;
use Auth;

class VendorController extends Controller
{

		public function __construct()
    {

        $this->middleware('auth:vendor')->except('logout');
    }


    public function index()
    {

    	return view('vendor.index');

    }


         public function product_create()
    {

        return view ('vendor.pages.product.create');

    }

      public function manage_products()
    {
        $products=Product::orderBy('id','desc')->where('admin_id',Auth::user()->id)->get();
        // return view ('backend.pages.product.index')->with('products',$products);

        return view ('vendor.pages.product.index',compact('products'));
    }

     public function product_store(Request $request)
    {
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
        $product->admin_id=Auth::user()->id;


        $product->bathroom=$request->bathroom;
        $product->type=$request->type;
        $product->size=$request->size;
        $product->room_id=$request->room_id;
        $product->floor_no=$request->floor_no;
        $product->available_date=$request->available_date;
        $product->balcony=$request->balcony;
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


        return redirect()->route('vendor.pages.product.create');

    }

    public function product_edit( $id )
    {
        $products=Product::find($id);
        $extra=ExtraFacility::where('product_id',$id)->first();
        $today = Carbon::today();
        return view('vendor.pages.product.edit',compact('products','extra'));
    }

    public function product_update(Request $request,$id)
    {

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

        return redirect()->route('vendor.pages.product.index');

    }

     public function product_delete($id)
   {

    $product =Product::find($id);
    $image=ProductImage:: where('product_id', $id);

    if(!is_null($product))
    {
        $product->delete();


           foreach ($image as $image) {

            $file_name = $image->image;

            if(file_exists(public_path("img/product/".$file_name))){
                unlink(public_path("img/product/".$file_name));
            }
       }

        $image->delete();


    }
    return back();

   }

   // category_ ..................

    public function category_index()
    {
        $categories=Category::orderBy('id','desc')->where('admin_id',Auth::user()->id)->get();
        return view ('vendor.pages.category.index')->with('categories',$categories);
    }

    public function category_create()
    {
        $main_categories=Category::orderBy('id','desc')->where('admin_id',Auth::user()->id)->where('parent_id',NULL)->get();
        return view('vendor.pages.category.create',compact('main_categories')); //comapct and with same
    }


          public function category_store(Request $request)
    {

          $request->validate
       ([

        'name' => 'required|max:255',


    ],

    [
         'name.required' => "Please Provide A category Name ",





        ]);

       $category = new category();

        $category->name=$request->name;
        $category->description =$request->description;
        $category->parent_id =$request->parent_id;
        $category->admin_id=Auth::user()->id;


        // ...... insert image ...... //

          if( $request->image > 0 ){

            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/categories/'.$img);
            Image::make($image)->save($location);
            $category->image =$img;

      }

        $category->save();

        return redirect()->route('vendor.pages.Category.index');



     }

     public function category_edit($id){
        $main_categories=Category::orderBy('id','desc')->where('admin_id',Auth::user()->id)->where('parent_id',NULL)->get();
        $category = Category::find($id);
        if(!is_null( $category )){
            return view('vendor.pages.category.edit.delete',compact('category','main_categories'));

        }
        else{
            return redirect()->route('vendor.pages.Category.index');

        }
    }



     public function category_update( Request $request,$id)
        {

              $request->validate
           ([

            'name' => 'required|max:255',


        ],
        [
             'name.required' => "Please Provide A category Name ",





            ]);

           $category =Category::find($id);

            $category->name=$request->name;
            $category->description =$request->description;
            $category->parent_id =$request->parent_id;
            $category->admin_id=Auth::user()->id;




              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists(public_path('img/category/'.$category->image))){

                File::delete(public_path('img/category/'.$category->image));
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/category/'.$img);
                Image::make($image)->save($location);
                $category->image =$img;

          }

            $category->save();

            return redirect()->route('vendor.pages.Category.index');



         }


            public function category_delete($id)
          {

            $category =Category::find($id);

            if(!is_null($category))
            {
                //..... if it is parent category, then delete all its sub category than delete category image ..... //
                if( $category->parent_id == NULL ){
                    $sub_categories=Category::orderBy('id','desc')->where('parent_id',$category->id)->get();

                    foreach ($sub_categories as $sub_categories) {

                           if(File::exists(public_path('img/category/'.$sub_categories->image))){

                           File::delete(public_path('img/category/'.$sub_categories->image));


                    }

                       $sub_categories->delete();
                    }

                }

                //......delete category image ..... //

                if(File::exists(public_path('img/category/'.$category->image))){

                File::delete(public_path('img/category/'.$category->image));
             }


                $category->delete();

            }


            return back();

           }

      public function test()
      {
        $articles =DB::table('orders')
                ->join('carts','orders.id', '=', 'carts.order_id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->Where('products.admin_id',Auth::user()->id)
                ->select('products.title','carts.order_id','orders.id','orders.pending','orders.confirmed','orders.processing')
                ->get();
             return view('vendor.pages.test',compact('articles'));
      }


      public function manage_order()
    {
        $order =DB::table('orders')
                ->join('carts','orders.id', '=', 'carts.order_id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->Where('products.admin_id',Auth::user()->id)
                ->groupBy('order_id')
                ->select('products.title','carts.order_id','orders.id','orders.pending','orders.confirmed','orders.processing','orders.name','orders.created_at')
                ->get();

        // return view ('backend.pages.product.index')->with('products',$products);

        return view ('vendor.pages.order.index',compact('order'));
                //return view('vendor.pages.test',compact('articles'));
    }

    public function view($id)
    {
       $order=Order::find( $id );

        return view ('vendor.pages.order.order_view',compact('order'));
    }


      public function sales_show()
    {
        $salesdata=SalesData::orderBy('id','desc')->where('admin_id',Auth::user()->id)->groupBy('invoice_id')->get();


        // $data = DB::table('sales_data')->where('sales_quantity', \DB::raw("(select max(`sales_quantity`) from sales_data)"))->get();

        // $data2 = DB::table("sales_data")
        // ->select(DB::raw("SUM(sales_quantity) as count"),'sales_title as coun')
        // ->groupBy(DB::raw("sales_title"))
        // ->get();



        return view ('vendor.pages.sales.index',compact('salesdata'));
    }

    public function view_sales($invoice_id)
    {
        $salesdata=SalesData::where('invoice_id',$invoice_id )->where('admin_id',Auth::user()->id)->get();

        return view ('vendor.pages.sales.view',compact('salesdata'));



    }


    public function insert(Request $request)
    {

        $salesData = new SalesData;

        $salesData->sales_id =$request->sales_id;
        $salesData->sales_name =$request->sales_name;
        $salesData->sales_sales_number =$request->sales_number;
        $salesData->sales_ip_address =$request->sales_ip_address;
        $salesData->sales_transaction_number =$request->sales_transaction_number;

        $salesData->sales_short_name=$request->sales_short_name;
        $salesData->sales_shipping_address=$request->sales_shipping_address;
        $salesData->sales_created_at=$request->sales_created_at;

        $salesData->sales_title =$request->sales_title;
        $salesData->sales_quantity =$request->sales_quantity;
        $salesData->admin_id =$request->admin_id;
        $salesData->sales_offer_price =$request->sales_offer_price;
        $salesData->sales_total =$request->sales_total;


        $salesData->invoice_id =$request->invoice_id;

        $salesData->save();

        $id=$request->sales_product_title;
        $id1=$request->sales_product_quantity;
        $id2=$request->sales_quantity;
        $product =Product::find($id);
        $product->quantity =$id1-$id2;
        $product->save();

        $cart=Cart::find($request->cart_id);

        $cart->sales_update =1;
        $cart->save();

       // dd($request->all());



        return back();
    }

    public function invoice_update($id)
    {
        $order=Order::find( $id );

        $pdf = PDF::loadView('vendor.pages.order.invoice',compact('order'));
        return $pdf->download('invoice.pdf');

    }

     public function paid_update($id)
    {
      $order=Order::find( $id );

      if($order->pending == 0)
      {
        $order->pending = 1;
        $order->save();
      }

      return back();

    }

     public function order_update($id)
    {

        $order=order::find( $id );
        foreach (Cart::Where('ip_address',$order->ip_address)->get() as $cart) {
         $cart->order_id = Null;
          $cart->product_quantuty = 0;
         $cart->save();
        }


        return redirect()->route('vendor.pages.order.index');

    }


    public function manage_products_sell()
    {
        $products=Product::orderBy('id','desc')->get();
        // return view ('backend.pages.product.index')->with('products',$products);

        return view ('vendor.pages.product.all_products_show',compact('products'));
    }

    public function product_edit_sell( $id )
    {
        $products=Product::find( $id );
        return view('vendor.pages.product.edit_sell',compact('products'));
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

        return redirect()->route('vendor.pages.product.manage_products_sell');

    }

      public function pick( $sales_id )
    {
        foreach (SalesData::Where('sales_id',$sales_id)->get() as $cart) {

          $cart->sales_is_picked = 1;
         $cart->save();
        }


     return back();
    }

    public function vendor_info_create()
    {
        return view('vendor.pages.customer.create');
    }


    public function show_image($id)
   {


    $product_image =Product::find($id);
    return view ('vendor.pages.product.product_image',compact('product_image'));


   }


   public function edit_image($id)
   {
    $product_image =ProductImage::find($id);
    return view ('vendor.pages.product.product_image_edit',compact('product_image'));
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


    public function dailydatas()
    {
      return Excel::download(new dailydatas,'daily.xlsx');
    }

    public function monthdatas()
    {
      return Excel::download(new monthdatas,'month.xlsx');
    }

    public function yeardatas()
    {
      return Excel::download(new yeardatas,'year.xlsx');
    }

    public  function order_count_vendor_p()
     {
      $order =DB::table('orders')
                ->join('carts','orders.id', '=', 'carts.order_id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->Where('products.admin_id',Auth::user()->id)
                ->Where('carts.sales_update',0)
                ->select('products.title','carts.order_id','orders.id','orders.pending','orders.confirmed','orders.processing','orders.name','orders.created_at','orders.invoice_id')
                ->get();

              return view('vendor.index',compact('order'));
                //dd($order);
     }
}
