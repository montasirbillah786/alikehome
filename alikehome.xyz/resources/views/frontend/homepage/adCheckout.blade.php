@extends("layouts.master")

@section('content')

    <!--Checkout page section-->
    <div class="Checkout_section mt-70">
        <div class="container">
            <div class="row">
                <div class="col-12">


                </div>
            </div>
            <div class="checkout_form">
                <div class="row">

                        <form method="post" action="{{route('ad.checkout.post')}}" enctype="multipart/form-data" class="checkout-form">
                            {{ csrf_field() }}
                            <div class="col-lg-12">
                            <h3>Ads Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-lg-12 mb-20">
                                        <label>Company Name<span>*</span></label>
                                        <input type="text" name="company_name">
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <label>Big Offer Text<span>*</span></label>
                                        <textarea class="textarea" name="big_offer_text" placeholder="Place some text here"
                                                  style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 20px;"></textarea>
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <label>Facebook Page link<span>*</span></label>
                                        <input type="text" name="facebook">
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <label>Twitter Link<span>*</span></label>
                                        <input type="text" name="twitter">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 mb-20">
                                        <label>About Hostel Details<span>*</span></label>
                                        <textarea class="textarea" name="hostel_details" placeholder="Place some text here"
                                                  style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 20px;"></textarea>
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <label>Hostel Address<span>*</span></label>
                                        <input type="text" name="hostel_address">
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <label>Hostel Room Logo<span>*</span></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" class="form-control" name="hostel_image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <label>Hostel Room Image<span>*</span></label>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="file" class="form-control" name="product_image[]">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" class="form-control" name="product_image[]">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" class="form-control" name="product_image[]">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" class="form-control" name="product_image[]">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <button type="submit" class="btn btn-success" style="text-align: right;">Submit</button>
                                    </div>
                                </div>
                                <div class="row">

                                </div>



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
