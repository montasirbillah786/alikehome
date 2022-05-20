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
              <form method="post" action="{{ route('backend.pages.product.update',$products->id) }}" enctype="multipart/form-data">
                          <!-- {{ csrf_field() }} -->
                          @csrf
                <div class="card-body">
                     @include('layouts.message')
                                        <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title"  placeholder="Enter Title" value="{{ $products->title }} ">
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea class="textarea" name="description" placeholder="Place some text here"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 20px;">{!! $products->description !!}</textarea>
    </div>
      <div class="form-group">
    <label>Rent</label>
    <input type="number" class="form-control" name="price"  placeholder="Enter Price" value="{{ $products->price }}">
  </div>
  <div class="form-group">
    <label>Offer Rent</label>
    <input type="number" class="form-control" name="offer_price"  placeholder="Enter Price" value="{{ $products->offer_price }}">
  </div>
                    <div class="form-group">
                        <label>Attached Bathroom</label>
                        <select class="form-control" name="bathroom">
                            <option value="Yes" {{($products->bathroom == 'Yes')? 'selected' : ''}}> Yes </option>
                            <option value="No" {{($products->bathroom == 'No')? 'selected' : ''}}> No </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type">
                            <option value="Furnished" {{($products->type == 'Furnished')? 'selected' : ''}}>Furnished</option>
                            <option value="Non-Furnished" {{($products->type == 'Non-Furnished')? 'selected' : ''}}>Non-Furnished</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label>Size</label>
                            <input type="text" class="form-control" name="size"  placeholder="Enter Size" value="{{$products->size}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label>Room Id</label>
                            <input type="text" class="form-control" name="room_id"  placeholder="Enter Size" value="{{$products->room_id}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Room Type</label>
                        <select class="form-control" name="type">
                            <option value="Single"{{($products->type == 'Single')? 'selected' : ''}}>Single</option>
                            <option value="Double"{{($products->type == 'Double')? 'selected' : ''}}>Double</option>
                            <option value="Triple"{{($products->type == 'Triple')? 'selected' : ''}}>Triple</option>
                            <option value="Quad"{{($products->type == 'Quad')? 'selected' : ''}}>Quad</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label>Floor No</label>
                            <input type="text" class="form-control" name="floor_no"  placeholder="Enter Floor No" value="{{$products->floor_no}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label>Available Date</label>
                            <input type="date" class="form-control" name="available_date"  placeholder="Enter Floor No" value="{{$products->date}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Balcony </label>
                        <select class="form-control" name="balcony">
                            <option value="Yes"{{($products->balcony == 'Yes')? 'selected' : ''}}> Yes </option>
                            <option value="No"{{($products->balcony == 'No')? 'selected' : ''}}> No </option>
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
                                                    <input type="hidden" name="ex_id" value="{{$extra->id}}">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities1" value="3 Time Meals" {{is_null($extra->extra_facilities1) ? '' :'checked' }}>
                                                    3 Time Meals
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities2" value="Personal Locker" {{is_null($extra->extra_facilities2) ? '' :'checked' }}>
                                                    Personal Locker
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities3" value="Laundry Service" {{is_null($extra->extra_facilities3) ? '' :'checked' }}>
                                                    Laundry Service
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities4" value="House Keeping" {{is_null($extra->extra_facilities4) ? '' :'checked' }}>
                                                    House Keeping
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities5" value="Wi-Fi" {{is_null($extra->extra_facilities5) ? '' :'checked' }}>
                                                    Wi-Fi
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities6" value="Lift" {{is_null($extra->extra_facilities6) ? '' :'checked' }}>
                                                    Lift
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities7" value="Generator/IPS" {{is_null($extra->extra_facilities7) ? '' :'checked' }}>
                                                    Generator/IPS
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities8" value="24 Hours Security" {{is_null($extra->extra_facilities8) ? '' :'checked' }}>
                                                    24 Hours Security
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities9" value="Common Room/Lobby" {{is_null($extra->extra_facilities9) ? '' :'checked' }}>
                                                    Common Room/Lobby

                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities10" value="Reading Room" {{is_null($extra->extra_facilities10) ? '' :'checked' }}>
                                                    Reading Room
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities11" value="Library Room" {{is_null($extra->extra_facilities11) ? '' :'checked' }}>
                                                    Library Room
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities12" value="Fire Safety" {{is_null($extra->extra_facilities12) ? '' :'checked' }}>
                                                    Fire Safety
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="extra_facilities13" value="GYM" {{is_null($extra->extra_facilities13) ? '' :'checked' }}>
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
                                <option value=" {{$products->category_id}}"> {{$products->category->name}} </option>
                                   @foreach(App\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $parent)
                                      <option value="{{$parent->id}} "> {{$parent->name}} </option>
                                   @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                          <label>Select Institute</label>

                          <select class="form-control" name="brand_id">
                            <option value="{{$products->brand_id}}"> {{$products->brand->name}} </option>
                            @foreach(App\Brand::orderby('id','asc')->where('id',$products->brand_id)->get() as $parent)

                              <option value="{{$parent->id}} "> {{$parent->name}} </option>


                            @endforeach
                          </select>
                    </div>


                    <div class="form-group">
                          <label>Select Vendor</label>

                          <select class="form-control" name="admin_id">
                            @foreach(App\Vendor::orderby('id','asc')->where('id',$parent->id)->get() as $parent)
                              <option value="{{$parent->id}} "> {{$parent->name}} </option>
                            @endforeach

                             <option value="5012 "> Admin </option>
                            @foreach(App\Vendor::orderby('id','asc')->get() as $parent)
                              <option value="{{$parent->id}} "> {{$parent->name}} </option>
                            @endforeach
                          </select>
                              </div>



                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Product</button>
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
