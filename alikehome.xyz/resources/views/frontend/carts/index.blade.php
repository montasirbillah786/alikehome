@extends("layouts.master")

 @section('content')
 <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                         <li><a href="index.html">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-70">
        <div class="container">


                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
{{--                                    <th class="product_quantity">Quantity</th>--}}
{{--                                    <th class="product_quantity">Update</th>--}}
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total_price = 0;
                                @endphp
                                @foreach(App\Cart::Where('ip_address',request()->ip())->where('order_id', Null)->where('product_quantuty','>=', '1')->get() as $parent)
                                <tr>
                                   <td class="product_remove"><a href="{{route('carts.delete', $parent->id)}}"><i class="fa fa-trash-o"></i></a></td>
                                   @if($parent->product->images->count()>0)
                                    <td class="product_thumb"><a href="#"><img src="{{getImage($parent->product->images->first()->image,'product')}}" alt=""></a></td>
                                    @endif

                                    <td class="product_name"><a href="#">{{ $parent->product->title}}</a></td>
                                    <td class="product-price">{{$parent->product->offer_price}}</td>

{{--                                    <form method="post" action="{{ route('carts.update',$parent->id) }}" enctype="multipart/form-data">--}}
{{--                                    {{ csrf_field() }}--}}
{{--                                    <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" name="product_quantuty" value="{{ $parent->product_quantuty}}" type="number"></td>--}}
{{--                                    <td class="product_quantity"><button type="submit" class="btn btn-dark">update cart</button></td>--}}
{{--                                  </form>--}}


                                    <td class="product_total">ট{{$parent->product->offer_price * 1}}</td>

                                 @php
                                 $total_price = $total_price + ($parent->product->offer_price * $parent->product_quantuty);
                                 @endphp
                                </tr>
                               @endforeach



                            </tbody>
                        </table>
                            </div>

                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount">ট{{$total_price}}</p>
                                   </div>



                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">£ট{{$total_price + 0}}</p>
                                   </div>



                                   </div>




                                   <div class="checkout_btn">
                                       <a href="{{route('checkout')}}">Proceed to Checkout</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->


        </div>
    </div>
     <!--shopping cart area end -->


    @endsection
