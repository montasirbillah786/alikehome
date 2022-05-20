@extends("layouts.adminmaster")

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Vendor Info </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Vendor Create</li>
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
                                <h3 class="card-title">Vendor Create <small>Give the details</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{ route('admin.vendor.update',$vendor->id) }}" enctype="multipart/form-data">
                            <!-- {{ csrf_field() }} -->
                                @csrf
                                <div class="card-body">
                                    @include('layouts.message')
                                    <div class="form-group">
                                        <label>Hostel Name</label>
                                        <input type="text" class="form-control" name="name"  placeholder="Enter Shop name" value="{{$vendor->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email"  placeholder="Enter Email" value="{{$vendor->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="textarea" name="description" placeholder="Place some text here"
                                                  style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 20px;">{!! $vendor->description !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Vendor Image</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{getImage($vendor->image,'vendor')}}" alt="img" height=100 width=100> <br>
                                                <input type="file" class="form-control" name="image">
                                            </div>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Banner Image</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{asset($vendor->banner_image)}}" alt="img" height=100 width=100> <br>
                                                <input type="file" class="form-control" name="image_banner">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input
                                            id="pac-input" class="form-control bg-light" type="text" placeholder="Search Box" name="address" required value="{{$vendor->address}}"
                                        />
                                    </div>
                                    <div id="map"></div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Edit vendor</button>
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
