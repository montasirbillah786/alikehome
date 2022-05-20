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
                   <h5>Ads Name : {{ getAdsName($order->ads_id)->note }}</h5>
                   <h5>Size : {{ getAdsName($order->ads_id)->sell_description }}</h5>
                   </div>

                   <div class="col-6">
                    <h5> Order Information Details: </h5>
                    <h5>Comapany name : {{ $order->big_offer_text }}</h5>
                   <h5>Big Offer Text : {{ $order->big_offer_text }}</h3>
                   </div>

                  </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-md-5">
                        <h5> Order Information Details: </h5>
                        <h5>Facebook : {{ $order->facebook }}</h5>
                        <h5>twitter : {{ $order->twitter }}</h5>
                    </div>
                    <div class="col-md-6">
                        <h5> Order Information Details: </h5>
                        <h5>Hostel Address : {{ $order->hostel_address }}</h5>
                        <h5>Hostel Details : {{ $order->hostel_details }}</h5>
                        <h5><img src="{{asset('img/banner/'.getAdsName($order->ads_id)->image)}}" alt="Girl in a jacket" width="100" height="100"></h5>

                    </div>
                </div>
            </div>
          </div>
        </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Image Details</h3>
                      </div>
                      <div class="col-md-8">
                          @foreach(App\AdsImage::where('ads_order_id',$order->id)->get() as $image)
                              <img src="{{asset('img/hostel/'.$image->image)}}" alt="Girl in a jacket" width="100" height="100">
                          @endforeach
                      </div>

                  </div>
              </div>
          </div>
       </div>
              <div class="row" style="padding-top: 20px;padding-bottom: 50px;">
                   <div class="col-md-12">
                     <form method="post" action="{{route('ads.order.update',$order->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <?php if(is_null($order->product_image)) {?>
                        <button type="submit" class="btn btn-primary">Pending</button>
                      <?php }else {?>
                    <button type="submit" class="btn btn-success">Confirm</button>
                      <?php }?>


                     </form>
                  </div>
              </div>



     </section>

 </div>


 @endsection
