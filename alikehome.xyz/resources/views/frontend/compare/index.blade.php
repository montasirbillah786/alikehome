@extends("layouts.master")

 @section('content')


 

 <style type="text/css">
  

.card {
   
    -webkit-box-shadow: 0 0 15px rgba(0,0,0,0.4);
    box-shadow: 0 0 15px rgba(0,0,0,0.4);
    -webkit-transition: all 0.25s ease;
    -o-transition: all 0.25s ease;
    transition: all 0.25s ease;
}

.card:hover {
    -webkit-transform: scale(1.06);
    -ms-transform: scale(1.06);
    -o-transform: scale(1.06);
    transform: scale(1.06);
}

.pricing-title {
    color: #FFF;
    background: #e95846;
    text-align: center;
    font-size: 2.5em;
    padding: 10px 0px;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}


  </style>

 <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>compare</h3>
                        <ul>
                            <li><a href="">home</a></li>
                            <li>Compare</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
            	@foreach ($compare as $compare)




              <div class="col-md-4">

                <div class="product_thumb">
                                        
                                       
                                                
                                        
                                    </div>

            <div class="card" >
  <div class="card-header">
    
    <a class="primary_img" href=""><img src="{{getImage($compare->relationToimage->image,'product')}}" alt="" style="height:250px;width: 250px;text-align: center;"></a>
    <div class="pricing-title" style="color: #2588BB;background-color: white;">
     {{$compare->product->title}}
  </div>
  </div>
  <div class="card-body">
    <h5 class="card-title" style="background: #87CEEB;  font-size: 1.5em;font-weight: 700;padding: 10px ;text-shadow: 0 1px 1px rgba(0,0,0,0.4);color: white;text-align: center;">{{$compare->product->price}} TAKA</h5>
    <div class="card-text" style="color:black;" >
      <li>Offer Price:{{$compare->product->offer_price}}</li>
     <li>Category:{{$compare->product->category->name}} </li>
     <li>Feature: {!! $compare->product->description !!}</li>
     <li>Brand: {{$compare->product->brand->name}}</li>
     

 

    </div>
    
  </div>
<div class="pricing-title" style="color: black;font-weight: 600;background-color: #f9f9f9;">
   <a href="{{route('products.show',$compare->product->slug)}}" class="btn btn-success">Click To Buy</a>
  </div>
  <div class="pricing-title" style="color: black;font-weight: 600;background-color: white;">
   <a href="{{route('compare.delete',$compare->id)}}" class="btn btn-danger">Remove</a>
  </div>
</div>



         </div>
          @endforeach
            </div>
        </div>
    </div>
    


 @endsection