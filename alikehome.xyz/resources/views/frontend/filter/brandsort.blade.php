@extends("layouts.master")

 @section('content')
 
    
    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            @include('frontend.partials.sort')
                           
                            
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                        <div class=" niceselect_option">
                           <!--  <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Sort by average rating</option>
                                    <option  value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form> -->
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
                                            <ul>
                                                <li class="add_to_cart"> @include('frontend.partials.cart2')</li>
                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box{{$product->id}}"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="add_to_cart"> @include('frontend.partials.compare')</li>
                                            </ul>
                                        </div>
                                    </div>
                                <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="{{route('products.show',$product->id)}}">{{$product->title}}</a></h4>
                                        <p><a href="#">{{$product->category->name}}</a></p>
                                        <div class="price_box"> 
                                            <span class="current_price">{{$product->offer_price}} TAKA</span>
                                                        <span class="old_price">{{$product->price}} TAKA</span>
                                        </div>
                                    </div>
                                <div class="product_content list_content">
                                       <h4 class="product_name"><a href="{{route('products.show',$product->id)}}l">{{$product->title}}</a></h4>
                                        <p><a href="{{route('products.show',$product->id)}}">{{$product->category->name}}</a></p>
                                        <div class="price_box"> 
                                            <span class="current_price">{{$product->offer_price}} TAKA</span>
                                                        <span class="old_price">{{$product->price}} TAKA</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"> @include('frontend.partials.cart2')</li>
                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box{{$product->id}}"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                 
                                               
                                                <li class="add_to_cart"> @include('frontend.partials.compare')</li>
                                            </ul>
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

