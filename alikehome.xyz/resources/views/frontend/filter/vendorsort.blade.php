@extends("layouts.master")

 @section('content')

     <div class="shop_area shop_reverse mt-70 mb-70">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <img class="img-fluid" src="{{asset($vendor->banner_image)}}">
                 </div>
             </div>
             <div class="row mt-5">
                 <div class="col-md-6">
                   <h1>{{$vendor->name}}</h1>
                   <h5>{!! $vendor->description !!}</h5>
                   
                 </div>
                 
                 <div class="col-md-3">
                     <?php $num = getExtraFacilities($vendor->id)->countStart; ?>
                 <h1 style="text-align: right;">{{ number_format($num,1, '.', ' ') }} <img src="{{asset('img/banner/medal.png')}}" alt="" height="30" width="30"></h1>
                         <ul style="text-align: left;">
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities1))
                             <li style="font-weight: 600;"> <i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities1}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities2))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities2}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities3))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities3}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities4))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities4}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities5))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities5}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities6))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities6}}</li>
                             @endif
                            
                         </ul>

                 </div>
                 <div class="col-md-2 mt-5">
                       <h1 style="text-align: right;"> </h1>
                         <ul style="text-align: left;" style="margin-right:100px;">
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities7))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities7}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities8))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities8}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities9))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities9}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities10))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities10}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities11))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities11}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities12))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities12}}</li>
                             @endif
                             @if(!is_null(getExtraFacilities($vendor->id)->extra_facilities13))
                             <li style="font-weight: 600;"><i class="fa fa-eercast" aria-hidden="true" style="padding:2px;"></i>{{getExtraFacilities($vendor->id)->extra_facilities13}}</li>
                             @endif
                         </ul>

                 </div>
                 
             </div>
         </div>
     </div>
    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                        <div class=" niceselect_option">

                        </div>
                        <div class="page_amount">
                            <!-- <p>Showing 1–9 of 21 results</p> -->
                        </div>
                    </div>
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">





                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                    @php $i=1; @endphp

                                                    @foreach ($product->images as $image)

                                                    @if ($i>0)
                                        <a class="primary_img" href="{{route('products.show',$product->id)}}"><img src="{{getImage($image->image,'product')}}" alt=""></a>
                                         @endif

                                                    @php $i-- @endphp

                                                    @endforeach

                                        <div class="label_product">
                                            <?php if($product->status == 1) {?>

                                                    <span class="label_sale">Sale</span>

                                                      <?php }?>
                                        </div>
                                        <div class="action_links">
{{--                                            <ul>--}}
{{--                                                <li class="add_to_cart"> @include('frontend.partials.cart2')</li>--}}
{{--                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box{{$product->id}}"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>--}}


{{--                                                <li class="add_to_cart"> @include('frontend.partials.compare')</li>--}}
{{--                                            </ul>--}}
                                        </div>
                                    </div>
                                <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="{{route('products.show',$product->id)}}">{{$product->title}}</a></h4>
                                        <p><a href="{{route('products.show',$product->id)}}">{{$product->category->name}}</a></p>
                                        <div class="price_box">
                                            <span class="current_price">{{$product->offer_price}} TAKA</span>
                                                        <span class="old_price">{{$product->price}} TAKA</span>
                                        </div>
                                    </div>
                                <div class="product_content list_content">
                                       <h4 class="product_name"><a href="{{route('products.show',$product->id)}}">{{$product->title}}</a></h4>
                                        <p><a href="{{route('products.show',$product->id)}}">{{$product->category->name}}</a></p>
                                        <div class="price_box">
                                            <span class="current_price">{{$product->offer_price}} TAKA</span>
                                                        <span class="old_price">{{$product->price}} TAKA</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                        
                                        </div>
                                        <div class="action_links list_action_right">
{{--                                            <ul>--}}
{{--                                                <li class="add_to_cart"> @include('frontend.partials.cart2')</li>--}}
{{--                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box{{$product->id}}"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>--}}


{{--                                                <li class="add_to_cart"> @include('frontend.partials.compare')</li>--}}
{{--                                            </ul>--}}
                                        </div>
                                    </div>
                            </div>
                        </div>

                        @endforeach


                    </div>


                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
@endsection

