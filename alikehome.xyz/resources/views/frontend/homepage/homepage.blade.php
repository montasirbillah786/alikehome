@extends("layouts.master")
@section('content')
    <!--shipping area end-->
    <div class="banner_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <div class="search_container">
                        <div class="" style="text-align: center;">
                            <form action="{{route('search')}}" method="get">
                                <div class="hover_category">
                                    <select class="select_option" name="brand">
                                        <option selected value="institute">Select  Institute</option>
                                        <option selected value="location">Select location</option>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="Search ..." type="text" name="search">
                                    <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 5px;">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder=" maximum price" name="max_price">
                </div>
                
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder=" minimum price" name="min_price">
                </div>
              
                    <div class="col-md-3">
                            <select class="form-control" name="gender">
                                <option selected value=" ">Select a Gender</option>
                                <option value="41">Male</option>
                                <option value="42">Female</option>
                            </select>
                    </div>
                    <div class="col-md-1"></div>



            </div>
            </form>
        </div>
    </div>

    <div class="product_area  mb-64">
        <div class="container">
            <div class="row" style="padding-top: 20px;">
                <div class="col-md-4">
                    <img src="{{asset('img/banner2/'.$image1->image)}}" alt="">
                </div>
                <div class="col-md-8">
                    <div class="product_header">
                        <div>
                            <h2>Top Hostels</h2>
                        </div>
                    </div>

                    <div class="product_container">
                <div class="row">
                    @foreach($hostel as $hostel)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-8" style="padding-top: 5px;">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a href="{{route('vendor.shot',$hostel->product_id)}}" class="primary_img" ><img src="{{asset('img/vendor/'.$hostel->image)}}" alt=""></a>
                            </div>
                        <div class="product_content grid_content">
                            <div class="row">
                                <div class="col-md-6">
                                <h4 class="product_name"><a href="{{route('vendor.shot',$hostel->product_id)}}">{{$hostel->name}}</a></h4>
                                </div>
                            
                                <div class="col-md-6">
                                <h4 class="product_name"><a href="{{route('vendor.shot',$hostel->product_id)}}">
                            {{ number_format($hostel->countStart,1, '.', ' ') }}
                                    <img src="{{asset('img/banner/medal.png')}}" alt="" height="20" width="20"></a></h4>
                                </div>
                            </div>
                            <div class="price_box">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span class="current_price" style="color: #0b0b0b;">Laundry</span>
                                        <span class="current_price" style="color: #0b0b0b;">{{  is_null($hostel->extra_facilities3) ? 'No' : 'Yes'  }}</span>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <span class="current_price" style="color: #0b0b0b;">Lift</span>
                                        <span class="current_price" style="color: #0b0b0b;">{{  is_null($hostel->extra_facilities6) ? 'No' : 'Yes'  }}</span>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <span class="current_price" style="color: #0b0b0b;">Wifi</span>
                                        <span class="current_price" style="color: #0b0b0b;">{{  is_null($hostel->extra_facilities5) ? 'No' : 'Yes'  }}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="current_price" style="color: #0b0b0b;">GYM</span>
                                        <span class="current_price" style="color: #0b0b0b;">{{  is_null($hostel->extra_facilities13) ? 'No' : 'Yes'  }}</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
              </div>
        </div>
        </div>
    </div>

    <!--blog area start-->
    <section class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <p></p>
                        <h2>Diverse Ad Types</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog_carousel blog_column3 owl-carousel">
                    @foreach($image as $blog)
                        <div class="col-lg-3">
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="{{route('ad.checkout',$blog->id)}}"><img src="{{asset('img/banner/'.$blog->image)}}" alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <div class="articles_date">
                                            <p>{{date('d-m-Y',strtotime($blog->created_at))}}</p>
                                        </div>
                                        <div class="articles_date">
                                            <p>Size(Dimension) : {{$blog->note}}</p>
                                        </div>
                                        <div class="articles_date">
                                            <p>Placement : {{$blog->sell_description}}</p>
                                        </div>

                                        <footer class="blog_footer">
                                            <a href="{{route('ad.checkout',$blog->id)}}">Book Designer</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--blog area end-->

    <div class="product_area  mb-64">
        <div class="container">
            <div class="row" style="padding-top: 20px;">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <p></p>
                            <h2>More Hostels</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="product_carousel product_column5 owl-carousel">
                                    @foreach(App\Vendor::orderby('id','desc')->get() as $product)
                                        <div class="product_items">

                                            <article class="single_product">
                                                <figure>
                                                    <div class="product_thumb" style="max-width:200px;height:220px;">
                                                        <a class="primary_img" href="{{route('vendor.shot',$product->id)}}"><img src="{{asset('img/vendor/'.$product->image)}}" alt="" ></a>

                                                    </div>
                                                    <figcaption class="product_content">
                                                        <h4 class="product_name"><a href="{{route('vendor.shot',$product->id)}}">{{$product->name}}</a></h4>
                                                    </figcaption>

                                                </figure>

                                            </article>

                                        </div>
                                    @endforeach

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--banner fullwidth area satrt-->

    <!--banner fullwidth area end-->



    <!--blog area start-->
{{--    <section class="blog_section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="section_title">--}}
{{--                        <p>Our recent articles about Organic</p>--}}
{{--                        <h2>Our Blog Posts</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="blog_carousel blog_column3 owl-carousel">--}}
{{--                    @foreach(App\Blog::orderby('id','asc')->get() as $blog)--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <article class="single_blog">--}}
{{--                                <figure>--}}
{{--                                    <div class="blog_thumb">--}}
{{--                                        <a href="{{route('blog.details.show',$blog->id)}}"><img src="{{asset('img/blog/'.$blog->image)}}" alt=""></a>--}}
{{--                                    </div>--}}
{{--                                    <figcaption class="blog_content">--}}
{{--                                        <div class="articles_date">--}}
{{--                                            <p>{{date('d-m-Y',strtotime($blog->created_at))}} | <a href="{{route('blog.details.show',$blog->id)}}">{{$blog->name}}</a> </p>--}}
{{--                                        </div>--}}

{{--                                        <footer class="blog_footer">--}}
{{--                                            <a href="{{route('blog.details.show',$blog->id)}}">Show more</a>--}}
{{--                                        </footer>--}}
{{--                                    </figcaption>--}}
{{--                                </figure>--}}
{{--                            </article>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--blog area end-->

    


    <!-- <div class="newletter-popup">
        <div id="boxes" class="newletter-container">
            <div id="dialog" class="window">
                <div id="popup2">
                    <span class="b-close"><span>close</span></span>
                </div>
                <div class="box">


                      @foreach(App\Store2::where('id',2)->where('active',1)->get() as $image)

        <a href={{$image->link}}><img src="{{asset('img/banner2/'.$image->image)}}" alt=""></a>

                @endforeach

        </div>
    </div>

</div>
</div>
<!-- /.box -->




@endsection

@push('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8AWIQyXO0kFl4_zD3dEk21BPaz08WBmA&callback=initAutocomplete&libraries=places&v=weekly"
        async
    ></script>
    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initAutocomplete() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -33.8688, lng: 151.2195 },
                zoom: 13,
                mapTypeId: "roadmap",
            });
            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
    </script>
@endpush
