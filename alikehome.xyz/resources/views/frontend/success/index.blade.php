@extends("layouts.master")

 @section('content')


<div class="contact_map mt-70">
       <div class="map-area">

        <div class="container">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <div class="card" style="background-color">
              <div class="card-header" style="border:1px;">
                <h3 class="card-title" style="text-align: center;">Order Details</h3>
                <h4 style="text-align: center;">Thanks You For Order</h4>
                <p><span style="color: black;font-weight: 600;">Invoice Number :{{$order->invoice_id}}</span></p>
                <p><span style="color: black;font-weight: 600;">Customer Name :{{$order->name}}</span></p>
                <p><span style="color: black;font-weight: 600;">Customer Name :{{$order->email}}</span></p>
                <p><span style="color: black;font-weight: 600;">Contact Number :{{$order->phone_number}}</span></p>
                <p><span style="color: black;font-weight: 600;">Contact Number :{{$order->shipping_address}}</span></p>

                @foreach(App\Cart::Where('ip_address',request()->ip())->where('order_id', $order->id)->get() as $parent)
                <p><span style="color: black;font-weight: 600;">Order Details :</span>{{ $parent->product->title}} --->  {{$parent->product->offer_price}} *{{$parent->product_quantuty}} = {{$parent->product->offer_price * $parent->product_quantuty}}</p>
                 @endforeach
                <p><span style="color: black;font-weight: 600;">Total Price :{{$order->total_price}}
                </span></p>
                <h4 style="text-align: center;"><span style="color: black;font-weight: 600;">Have Any Issue Please Contact Us:+8801676772959 and <br>
                track your delivary go our order section and search to your invoice id</span></h4>
                <a href="{{url('/')}}" class="btn btn-success"><h5>Continue Shopping </h5></a>

              </div>
          </div>
                </div>

                <div class="col-md-1">

                </div>

            </div>
        </div>

       </div>
    </div>



 @endsection
