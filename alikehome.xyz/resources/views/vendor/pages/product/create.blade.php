@extends("layouts.vendormaster")

 @section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Create</li>
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
                <h3 class="card-title">Product Create <small>Give the details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('vendor.product.store') }}" enctype="multipart/form-data">
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
                            <input type="date" class="form-control" name="available_date"  placeholder="Enter Floor No">
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Extra Facilitate</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="3 Time Meals" value="extra_facilities1">
                                                    3 Time Meals
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="Personal Locker" value="extra_facilities2">
                                                    Personal Locker
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="Laundry Service" value="extra_facilities3">
                                                    Laundry Service
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="House Keeping" value="extra_facilities4">
                                                    House Keeping
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="Wi-Fi" value="extra_facilities5">
                                                    Wi-Fi
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="Lift" value="extra_facilities6">
                                                    Lift
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="Generator/IPS" value="extra_facilities7">
                                                    Generator/IPS
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="24 Hours Security" value="extra_facilities8">
                                                    24 Hours Security
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="Common Room/Lobby" value="extra_facilities9">
                                                    Common Room/Lobby

                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="Reading Room" value="extra_facilities10">
                                                    Reading Room
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="Library Room" value="extra_facilities11">
                                                    Library Room
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="Fire Safety" value="extra_facilities12">
                                                    Fire Safety
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="GYM" value="extra_facilities13">
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
