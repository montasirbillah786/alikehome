<?php

namespace App\Http\Controllers;

use App\AdsImage;
use App\AdsOrder;
use App\ExtraFacility;
use App\ProductImage;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\Brand;
use App\Blog;
use App\Cart;
use App\SalesData;
use App\Store;
use App\Store2;
use App\Store3;
use App\Store4;
Use Image;
Use File;

class PageController extends Controller
{
    public function index()
    {
    	$image = Store::orderby('id','asc')->where('active',1)->get();
        $parent= Category::orderby('name','asc')->where('admin_id',1)->get();
        $products = Product::orderby('id','asc')->get();
        $image1 = Store2::orderby('id','asc')->where('active',1)->first();
        $products_status =Product::orderby('id','asc')->where('status',1)->get();
        $image3 =Store3::orderby('id','asc')->where('active',1)->limit(1)->get();
        $image4 =Store4::orderby('id','asc')->where('active',1)->get();

      $star = ExtraFacility::orderBy('countStart','DESC')->where('type','vendor')->limit(6)->pluck('product_id')->toArray();
     // dd($star);
      $largest = array_slice($star, 0, 6);
    //   $hostel = Vendor::whereIn('id',$largest)->limit(6)->get();
    $hostel = Vendor::join('extra_facilities','extra_facilities.product_id', '=', 'vendors.id')->where('extra_facilities.type','vendor')
          ->orderby('extra_facilities.countStart','DESC')->limit(6)->get();
         // $hostel = json_decode($hostel);
      //dd($hostel);
      return view ('frontend.homepage.homepage',compact('image','parent','products','image1','products_status','image3','image4','hostel'));

    }


    public function search(Request $request){

        $search = $request->search;
//        if( $request->brand == 'institute' ){
//           // $products=Product::Where('brand_id','like','%'.$request->brand.'%');
//
//            $brand = Brand::where('name','like','%'.$request->search.'%')->pluck('id');
//
//            if( !is_null($request->max_price) or !is_null($request->min_price) or !is_null($brand)){
//                $min_price = is_null($request->min_price) ? '0' : $request->min_price;
//                $max_price = is_null($request->max_price) ? '0' : $request->max_price;
//                $products=Product::orwhereBetween('offer_price',[$min_price, $request->max_price])->orwhere('category_id',$request->gender)->orwhereIn('brand_id',$brand);
//            }
//        }elseif ($request->brand == 'location'){
//            if( !is_null($request->max_price) or !is_null($request->min_price) or !is_null($request->brand)){
//                $min_price = is_null($request->min_price) ? '0' : $request->min_price;
//                $max_price = is_null($request->max_price) ? '0' : $request->max_price;
//                $products=Product::orwhereBetween('offer_price',[$min_price, $request->max_price])->orwhere('category_id',$request->gender)->orwhere('address','like','%'.$request->search.'%');
//            }
//        }


//        if(!is_null($request->gender)){
//            $products=Product::Where('category_id',$request->gender);
//        }

//        if(!is_null($request->search)){
//            $products=Product::orWhere('description','like','%'.$search.'%')->orWhere('title','like','%'.$search.'%');
//        }

        if( $request->brand == 'institute' ) {
            if(!is_null($request->search)) {
                $brand = Brand::where('name', 'like', '%' . $request->search . '%')->pluck('id');
                $products = Product::whereIn('brand_id', $brand);
            }
            if(!is_null($request->gender)){
                $products=Product::Where('category_id',$request->gender);
            }
            if( !is_null($request->max_price) or !is_null($request->min_price)){
                $min_price = is_null($request->min_price) ? '0' : $request->min_price;
                $max_price = is_null($request->max_price) ? '20000' : $request->max_price;
                $products=Product::whereBetween('offer_price',[$min_price, $max_price]);
                if(!is_null($request->gender)){
                    $products=Product::whereBetween('offer_price',[$min_price, $request->max_price])->Where('category_id',$request->gender);
                }
            }
        }
       elseif ($request->brand == 'location'){
            if(!is_null($request->search)){
                $products=Product::where('address','like','%'.$request->search.'%');
            }
           if(!is_null($request->gender)){
               $products=Product::Where('category_id',$request->gender);
           }
           if( !is_null($request->max_price) or !is_null($request->min_price)){
               $min_price = is_null($request->min_price) ? '0' : $request->min_price;
               $max_price = is_null($request->max_price) ? '20000' : $request->max_price;
               $products=Product::whereBetween('offer_price',[$min_price, $max_price]);
               if(!is_null($request->gender)){
                   $products=Product::whereBetween('offer_price',[$min_price, $request->max_price])->Where('category_id',$request->gender);
               }
           }
        }
        $products = $products->get();

        return view('frontend.products.search',compact('products'));

    }

    public function pricesearch(Request $request){
      $price1=$request->price1;
      $price2=$request->price2;

      //$products=Product::orderBy('id','desc')->Where('price',$request->price1)->get();


      $products = Product::where(function($query) use ($request) {

                $query->whereBetween('offer_price',array($request->price1,$request->price2));

    })
      ->paginate(10);

        return view('frontend.products.pricesearch',compact('products'));



    }

     public function product(){


        $products=Product::orderBy('id','desc')->get();
        return view('frontend.products.index',compact('products'));

    }

    public function order_track()
    {
      return view ('frontend.homepage.order_track');
    }

      public function order_track_search(Request $request){

        $search=$request->search;
        $products=SalesData::Where('invoice_id',$search)->groupby('invoice_id')->get();
          ;



        //return view ('pages.product.search',compact('search','product'));
        return view('frontend.homepage.order_track_index',compact('search','products'));

    }


   public function aboutus()
    {
      return view('frontend.homepage.aboutus');
    }
    public function deliveryus()
    {
      return view('frontend.homepage.delivery_info');
    }
    public function policyus()
    {
      return view('frontend.homepage.policy_info');
    }
    public function contactus()
    {
      return view('frontend.homepage.contact');
    }

     public function contactmap()
    {
      return view('frontend.homepage.contactmap');
    }

    public function testy()
    {
      return view('frontend.homepage.testy');
    }

    public function adsCheckout($id){
        $data = Store::find($id);
        return view('frontend.homepage.adCheckout',compact('data'));
    }

    public function adsCheckoutPost(Request $request){
        //dd($request->all());
        $order = new AdsOrder();
        $order->ads_id = $request->id;
        $order->company_name = $request->company_name;
        $order->big_offer_text = $request->big_offer_text;
        $order->facebook = $request->facebook;
        $order->twitter = $request->twitter;
        $order->hostel_details = $request->hostel_details;
        $order->hostel_address = $request->hostel_address;

            $image = $request->file('hostel_image');
            $img = time().'.'. $image->getClientOriginalExtension();
             $request->hostel_image->move('img/hostel/',$img);
            $order->hostel_image ='img/hostel/'.$img;

        $order->save();

        if( $request->product_image > 0 ){

            foreach ($request->product_image as $image) {

                $random = Str::random(10);

                $img = $random.'.'. $image->getClientOriginalExtension();
                $location = public_path('img/hostel/'.$img);
                Image::make($image)->save($location);

                $product_image = new AdsImage();
                $product_image->ads_order_id = $order->id;
                $product_image->image = $img;
                $product_image->save();


            }
        }

        return back();

    }

}
