@extends("layouts.adminmaster")

 @section('content')

 <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">order process</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">order Details</h3>
              </div>

                <div class="row">
                  <div class="col-1">
                  </div>
                   <div class="col-5">
                   <h5> Order Information Details: </h5>
                   <h5>Customer Name : {{ $order->name }}</h5>
                   <h5>Customer Name : {{ $order->phone_number }}</h5>
                   <h5>Order Ip : {{ $order->ip_address }}</h5>
                   <h5>Order Date :{{ date('d-M-y', strtotime($order->created_at)) }}</h5>
                   <h5>Invoice Name :{{$order->invoice_id}}</h5>
                   </div>

                   <div class="col-6">
                    <h5> Order Information Details: </h5>
                    <h5>Shipping Address : {{ $order->shipping_address }}</h5>
                   <h5>Customer Email : {{ $order->email }}</h3>
                   <h5>Transaction number : {{ $order->transaction_number }}</h5>
                   <h5>Transaction Vendor name : {{ $order->payment_id }}</h5>
                   <h5>Total money :{{$order->total_price}} Taka</h5>
                   </div>

                  </div>


            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">order Details</h3>
              </div>

                <div class="row">


                   <div class="col-12">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
{{--                    <th scope="col">Product Quantity</th>--}}
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>


                  </tr>
                  </thead>
                  <tbody>
               @php
                             $total_price = 0;
                             @endphp
                              @foreach(App\Cart::Where('ip_address',$order->ip_address)->Where('product_quantuty','!=','0')->where('order_id',$order->id)->get() as $partents)



                                <tr>
                                  @if($partents->product->images->count()>0)
                                    <td class="cart-pic first-row"><img src="{{getImage($partents->product->images->first()->image,'product')}}" alt="a" width="100"></td>
                                    @endif
                                    <td class="cart-title first-row">
                                        <h5 style="padding-left:10px;">{{ $partents->product->title }}</h5>

                                    </td>
                                     <td class="p-price first-row" style="padding-right:20px;">BDT {{ $partents->product->offer_price}}</td>
{{--                                    <form method="post" action="{{ route('admin.carts.show',['id' => $partents->id]) }}" enctype="multipart/form-data">--}}
{{--                                    {{ csrf_field() }}--}}

{{--                                    <td> <input type="text" name="product_quantuty" class="form-control" value="{{ $partents->product_quantuty}}" style="border-radius: 50px 20px"> </td>--}}


{{--                                   <td> <button type="submit" class="btn btn-warning" style="margin-left: 20px;margin-right: 20px;">Update cart</button> </td>--}}
{{--                                        </form>--}}

                                    <td class="total-price first-row">BDT {{ $partents->product->offer_price * $partents->product_quantuty }}</td>

                                     @php

                                 $total_price = $total_price + ($partents->product->offer_price * $partents->product_quantuty);

                                 @endphp




                                   @endforeach
                                 </tfoot>
                               </table>
                            </div>
                        </div>
                  </div>
               </div>
            </div>
          </div>
       </div>
         <div class="row" style="padding-top: 80px;"style="padding-top: 80px;">

                   <div class="col-md-12 ">
                     <form method="post" action="{{route('order.invoice.update',$order->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary" >Invoice</button>

                     </form>
                  </div>
              </div>

              <div class="row" style="padding-top: 20px;padding-bottom: 50px;">

                   <div class="col-md-3">
                     <form method="post" action="{{route('paid.order.update',$order->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <?php if($order->pending == 0) {?>
                        <button type="submit" class="btn btn-primary">Pending</button>
                      <?php }else {?>
                    <button type="submit" class="btn btn-success">Pending</button>
                      <?php }?>


                     </form>
                  </div>

                  <div class="col-md-3">
                     <form method="post" action="{{route('complete.order.seen',$order->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                        <?php if($order->confirmed == 0) {?>
                        <button type="submit" class="btn btn-primary">confirm</button>
                      <?php }else {?>
                    <button type="submit" class="btn btn-success">confirm</button>
                      <?php }?>

                     </form>
                  </div>

                  <div class="col-md-3">
                     <form method="post" action="{{route('admin.order.seen',$order->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                        <?php if($order->processing == 0) {?>
                        <button type="submit" class="btn btn-primary">processing</button>
                      <?php } else {?>
                    <button type="submit" class="btn btn-success">processing</button>
                      <?php }?>

                     </form>
                  </div>

                 <!--  <div class="col-md-3">
                    <form method="post" action="{{route('complete.order.out',$order->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                        <button class="btn btn-success">Order Done</button>

                     </form>

                  </div> -->
     </section>

 </div>

 @endsection
