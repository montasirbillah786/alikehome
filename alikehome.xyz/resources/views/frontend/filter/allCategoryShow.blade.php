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

                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">

                    @foreach($category as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">

                                        <a class="primary_img" href="{{route('category.shot',$product->id)}}"><img src="{{getImage($product->image,'category')}}" alt="" ></a>



                                    </div>
                                <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="{{route('category.shot',$product->id)}}">{{$product->name}}</a></h4>

                                      <p></p>
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

