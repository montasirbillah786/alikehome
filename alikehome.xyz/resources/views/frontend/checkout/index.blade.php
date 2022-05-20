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
                            <li>checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

      <!--Checkout page section-->
    <div class="Checkout_section mt-70">
       <div class="container">
            <div class="row">
               <div class="col-12">


               </div>
            </div>
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form method="post" action="{{ route('checkout.store') }}" enctype="multipart/form-data" class="checkout-form">
                         {{ csrf_field() }}
                            <h3>Billing Details</h3>
                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>Email <span>*</span></label>
                                    <input type="text" name="email" value="{{ Auth::check() ? Auth::user()->email : ' '}}">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Bill Name <span>*</span></label>
                                   <input type="text" name="name">
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <label>Address <span>*</span></label>
                                    <textarea name="shipping_address" cols="50" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="col-lg-12 mb-20">
                                    <label>Message</label>
                                    <textarea name="message" cols="50" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone <span>*</span></label>
                                   <input type="text" name="phone_number">

                                </div>
                            </div>

                    </div>
                    <div class="col-lg-6 col-md-6">

                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	 @php
                                      $total_price = 0;
                                      @endphp
                                    @foreach(App\Cart::Where('ip_address',request()->ip())->where('order_id', Null)->where('product_quantuty','>=', '1')->get() as $parent)
                                        <tr>
                                            <td> {{ $parent->product->title }} <strong> × {{ $parent->product_quantuty }}</strong></td>
                                            <td> BDT {{ $parent->product->offer_price * $parent->product_quantuty }}</td>
                                        </tr>
                                       @php
                                         $total_price = $total_price + ($parent->product->offer_price * $parent->product_quantuty);
                                         @endphp

                                     @endforeach



                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th> Subtotal</th>
                                           <td>BDT {{ $total_price }}</td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>BDT {{$total_price}}</strong></td>
                                            <td> <input type="hidden" name="total_price" value="{{$total_price}}"></td>
                                    </tfoot>
                                </table>
                            </div>

                                <div class="order_button">
                                    <button  type="submit">Proceed to Payment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->

 @endsection
