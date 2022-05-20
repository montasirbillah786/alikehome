@extends("layouts.adminmaster")

 @section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hostel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hostel Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Hostel Create <small>Give the details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                           {{ csrf_field() }}


                <div class="card-body">
                     @include('layouts.message')
                                        <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                          <label>Title</label>
                        <input type="text" class="form-control" name="title"  placeholder="Enter Title">
                        </div>
                      </div>


                                        <div class="form-group">
                                          <div class="col-12 col-sm-8 col-lg-6">
                        <label>Description</label>
                        </div>
                        <textarea class="textarea" name="description" placeholder="Place some text here"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 20px;"></textarea>
                      </div>

                                       <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                          <label>Rent</label>
                        <input type="text" class="form-control" name="price"  placeholder="Enter Price">
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                          <label>Offer Rent</label>
                        <input type="text" class="form-control" name="offer_price"  placeholder="Enter Offer Price">
                        </div>
                      </div>

                    <div class="form-group">
                        <label>Attached Bathroom</label>
                        <select class="form-control" name="bathroom">
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type">
                            <option value="Furnished">Furnished</option>
                            <option value="Non-Furnished">Non-Furnished</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label>Size</label>
                            <input type="text" class="form-control" name="size"  placeholder="Enter Size">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label>Room Id</label>
                            <input type="text" class="form-control" name="room_id"  placeholder="Enter Size">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Room Type</label>
                        <select class="form-control" name="type">
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                            <option value="Triple">Triple</option>
                            <option value="Quad">Quad</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label>Floor No</label>
                            <input type="text" class="form-control" name="floor_no"  placeholder="Enter Floor No">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label>Available Date</label>
                            <input type="date" class="form-control" name="available_dates"  placeholder="Enter Floor No">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Balcony </label>
                        <select class="form-control" name="balcony">
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input
                            id="pac-input" class="form-control bg-light" type="text" placeholder="Search Box" name="address" required
                        />
                    </div>
                    <div id="map"></div>
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Extra Facilitate</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="3 Time Meals" name="extra_facilities1">
                                                    3 Time Meals
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="Personal Locker" name="extra_facilities2">
                                                    Personal Locker
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="Laundry Service" name="extra_facilities3">
                                                    Laundry Service
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="House Keeping" name="extra_facilities4">
                                                    House Keeping
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="Wi-Fi" name="extra_facilities5">
                                                    Wi-Fi
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="Lift" name="extra_facilities6">
                                                    Lift
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="Generator/IPS" name="extra_facilities7">
                                                    Generator/IPS
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="24 Hours Security" name="extra_facilities8">
                                                    24 Hours Security
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="Common Room/Lobby" name="extra_facilities9">
                                                    Common Room/Lobby

                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="Reading Room" name="extra_facilities10">
                                                    Reading Room
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="Library Room" name="extra_facilities11">
                                                    Library Room
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="Fire Safety" name="extra_facilities12">
                                                    Fire Safety
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="GYM" name="extra_facilities13">
                                                    GYM
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                      <div class="form-group">
                          <label>Select Category</label>

                          <select class="form-control" name="category_id">
                            <option value=" "> Choce a Category </option>
                            @foreach(App\Category::orderby('name','asc')->get() as $parent)
                              <option value="{{$parent->id}} "> {{$parent->name}} </option>
                            @endforeach
                          </select>
                              </div>
                                 <div class="form-group">
                          <label>Select Institute</label>

                          <select class="form-control" name="brand_id">
                            <option value=" "> Choce a Institute </option>
                            @foreach(App\Brand::orderby('name','asc')->get() as $parent)
                              <option value="{{$parent->id}} "> {{$parent->name}} </option>
                            @endforeach
                          </select>
                              </div>

                              <div class="form-group">
                          <label>Select Vendor</label>

                          <select class="form-control" name="admin_id">
                             <option value="5012 "> Admin </option>
                            @foreach(App\Vendor::orderby('id','asc')->get() as $parent)
                              <option value="{{$parent->id}} "> {{$parent->name}} </option>
                            @endforeach
                          </select>
                              </div>


                                        <div class="form-group">
                        <label>Room Image</label>
                        <div class="row">
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]">
                          </div>
                        </div>
                      </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


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
