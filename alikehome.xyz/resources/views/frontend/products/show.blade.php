<?php
$seo_title = $product->title;
$seo_description = $product->title;
$seo_keyword = $product->title;
?>

@extends("layouts.master")

 @section('content')
 <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="">home</a></li>
                            <li>Room details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">

                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">

                            	@php $i=1; @endphp
                                @foreach ($product->images as $image)
                                <?php if ($i == 1): ?>
                                	  <a href="#">
                                <img id="zoom1" src="{{getImage($image->image,'product')}}" data-zoom-image="{{getImage($image->image,'product')}}" alt="big-1">
                                 </a>
                                 <?php endif; ?>
                                @php $i++; @endphp
                                 @endforeach

                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            	@foreach ($product->images as $image)
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{getImage($image->image,'product')}}" data-zoom-image="{{getImage($image->image,'product')}}">
                                        <img src="{{getImage($image->image,'product')}}" alt="zo-th-1"/>
                                    </a>

                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">


                            <h1><a href="#">{{$product->title}} </a></h1>

                            <div class=" product_ratting">
                                <ul>
                                   <!-- <li><a href="#"><i class="icon-star"></i></a></li>-->
                                   <!--<li><a href="#"><i class="icon-star"></i></a></li>-->
                                   <!--<li><a href="#"><i class="icon-star"></i></a></li>-->
                                   <!--<li><a href="#"><i class="icon-star"></i></a></li>-->
                                   <!--<li><a href="#"><i class="icon-star"></i></a></li>-->
                                    <li class="review"><a href="#"> (customer comment ) </a></li>
                                </ul>

                            </div>
                            <div class="price_box">
                                <span class="current_price"><span class="current_price"><span class="currency" data-spm-anchor-id="a2a0e.home.flashSale.i0.735245913NXVo6">৳ {{$product->offer_price}} </span>

                                @if($product->price != 0)
                                <span class="old_price"><span class="current_price"><span class="currency" data-spm-anchor-id="a2a0e.home.flashSale.i0.735245913NXVo6">৳ {{$product->price}} </span>
                                @endif

                            </div>
                            <div class="product_desc">
                                <p>  {!! $product->description !!} </p>
                            </div>
                            <div class="product_desc">
                            <p><span style="font-weight:700">Attached Bathrooms:</span> {{$product->bathroom }}</p>
                            <p><span style="font-weight:700">balcony:</span> {{$product->balcony }}</p>
                            <p><span style="font-weight:700">Room Type:</span> {{$product->type }}</p>
                            <p><span style="font-weight:700">Floor No:</span> {{$product->floor_no }}</p>
                            <p><span style="font-weight:700">Room Size:</span> {{$product->size }}</p>
                            <p><span style="font-weight:700">Address:</span> {{$product->address }}</p>
                            <p><span style="font-weight:700">Available From:</span> {{$product->available_date }}</p>
                            </div>

                             <div class="product_meta">
                                <span>Category: <a href="#">{{$product->category->name}}</a></span>
                            </div>

                            <div class="product_variant quantity">

                                 @include('frontend.partials.cart_button')



                            </div>




                        <div class="priduct_social">
                            <ul>

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info mb-65">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                            
                                <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Show Comment</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                    <p>{!! $product->description !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                <div class="product_d_table">
                                   <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Category</td>
                                                    <td>{{$product->category->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Brand</td>
                                                    <td>{{$product->brand->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Offer Price</td>
                                                    <td>{{$product->offer_price}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Price</td>
                                                    <td>{{$product->price}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Quantity</td>
                                                    <td>{{$product->quantity}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                    <p>{!! $product->description !!}</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <h2>Comments </h2>
                                    @foreach(App\Comment::orderby('id','asc')->where('active',1)->where('product_id',$product->id)->get() as $comment)
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="assets/img/blog/comment2.jpg" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">

                                                <p><strong>{{$comment->name}} </strong>- {{date('d-m-Y',strtotime($comment->created_at))}}</p>
                                                <span>{{$comment->comment}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="comment_title">
                                        <h2>Add a Comment </h2>
                                        <p>Your email address will not be published.  Required fields are marked </p>
                                    </div>

                                    <div class="product_review_form">
                                        <form method="post" action="{{ route('comment.store') }}" enctype="multipart/form-data">
                                       {{ csrf_field() }}
                                            <div class="row">
                                                 <div class="col-lg-6 col-md-6">
                                                    <label for="author">Comment</label>
                                                    <input type="text" class="form-control" name="comment" >
                                                    <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">

                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input type="text" class="form-control" name="name" >

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input type="text" class="form-control" name="email" >
                                                </div>
                                            </div>
                                            <button type="submit">Submit</button>
                                         </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product area start-->

    @include('frontend.partials.relatedproduct')




@endsection
