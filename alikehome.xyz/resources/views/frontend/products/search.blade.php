@extends("layouts.master")

 @section('content')
  <!--breadcrumbs area start-->
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">

                            <div class="widget_list widget_filter">
                                <h3>Filter by price</h3>
                                <form method="post" action="{{ route('price.search') }}" enctype="multipart/form-data">

                          @csrf
                                      <div data-role="rangeslider">
                                        <label for="price-min">Price:</label>
                                        <input type="range" name="price1" id="myRange" value="200" min="0" max="10000">
                                        <p>Value: <span id="demo"></span></p>
                                        <br>
                                        <label for="price-max">Price:</label>
                                        <input type="range" name="price2" id="myRange1" value="800" min="0" max="10000">
                                        <p>Value: <span id="demo1"></span></p>

                                          <script type="text/javascript">

                                        var slider = document.getElementById("myRange");
                                        var output = document.getElementById("demo");
                                        var slider1 = document.getElementById("myRange1");
                                        var output1 = document.getElementById("demo1");
                                            output.innerHTML = slider.value;
                                           output1.innerHTML = slider1.value;
                                            slider.oninput = function() {
                                              output.innerHTML = this.value;

                                            }
                                            slider1.oninput = function() {
                                              output1.innerHTML = this.value;

                                              }

        </script>
      </div>
        <button type="submit">Filter</button>

      </form>
                            </div>


                            <div class="widget_list banner_widget">
                                @include('frontend.partials.image')
                            </div>
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
                                                <!-- <li class="add_to_cart"> @include('frontend.partials.cart2')</li> -->
                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box{{$product->id}}"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>


                                                <li class="add_to_cart"> @include('frontend.partials.compare')</li>
                                            </ul>
                                        </div>
                                    </div>
                                <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="">{{$product->title}}</a></h4>
                                        <p><a href="#">{{$product->category->name}}</a></p>
                                        <div class="price_box">
                                            <span class="current_price">{{$product->offer_price}} TAKA</span>
                                            @if($product->price != 0)
                                                        <span class="old_price">{{$product->price}} TAKA</span>
                                                        @endif
                                        </div>
                                    </div>
                                <div class="product_content list_content">
                                       <h4 class="product_name"><a href="product-details.html">Cas Meque Metus</a></h4>
                                        <p><a href="#">Fruits</a></p>
                                        <div class="price_box">
                                            <span class="current_price">{{$product->offer_price}} TAKA</span>
                                                        <span class="old_price">{{$product->price}} TAKA</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>{{!! $product->description !!}}</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart">@include('frontend.partials.cart2')</li>
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

