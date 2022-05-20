@extends("layouts.adminmaster")

 @section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->

        <!-- /.row -->

        <!-- /.row -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ App\Order::new_order() }}</h3>


                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ App\Order::pending_order() }}</h3>

                <p>pendind Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ App\Order::confirmed_order() }}</h3>

                <p>Confirmed order</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ App\Order::process_order() }}</h3>

                <p>Processing order</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->


            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Invoice ID</th>
                      <th>Phone Number</th>
                      <th>Status</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach(App\Order::orderby('id','desc')->limit(5)->get() as $order)
                    <tr>
                      <td><a href="pages/examples/invoice.html">{{$order->invoice_id}}</a></td>
                      <td>{{$order->phone_number}}</td>
                      <?php if($order->pending == 1 and $order->confirmed == 1 and $order->processing == 1) { ?>
                      <td><span class="badge badge-warning">Pending</span></td>
                    <?php  } elseif($order->pending == 1 and $order->confirmed == 1) { ?>
                      <td><span class="badge badge-info">Confirm</span></td>
                    <?php  } elseif($order->pending == 1)  { ?>
                      <td><span class="badge badge-success">Confirm</span></td>
                      <?php  } else { ?>
                      <td><span class="badge badge-danger">Wrong</span></td>
                      <?php } ?>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->created_at}}</div>
                      </td>
                    </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">

                <a href="{{route('backend.pages.order.index') }}" class="btn btn-sm btn-info float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>



          </div>
         

        </div>

        <div class="row">
        
          <!-- /.col -->
        
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Vendor</span>
                <span class="info-box-number">{{ App\Vendor::total_vendor() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">{{ App\User::total_user() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>


        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">

            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Stock at a glance</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card">

                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Rooms Name</th>
                                                        <th class="border-0">Price</th>
                                                        <th class="border-0">Created_at</th>
                                                        <th class="border-0">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $i=1; ?>
                                                    @foreach(App\Product::orderby('id','ASC')->limit(5)->get() as $parents)
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>

                                                        <td>{{$parents->title}}</td>
                                                        <td>{{$parents->price}} TAKA</td>
                                                        <td>{{$parents->created_at}}</td>

                                                        <td><a href="{{ route('backend.pages.product.edit',$parents->id) }}" class="btn btn-success"> Edit </a></td>
                                                    </tr>
                                                    @endforeach


                                                    <tr>
                                                        <td colspan="9"><a href="{{route('backend.pages.product.index')}}" class="btn btn-outline-light float-right">View Details</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
            
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Rooms</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
            @foreach(App\Product::orderby('id','desc')->limit(5)->get() as $parents)
                  <li class="item">
                    <div class="product-img">
                       @php $i=1; @endphp

                      @foreach ($parents->images as $image)

                                         @if ($i>0)
                      <!-- <img src="{{asset('img/product/'.$image->image)}}" alt="Product Image" class="img-size-50"> -->
                      @endif

                                                    @php $i-- @endphp

                                                    @endforeach
                    </div>
                    <div class="product-info">
                      <a href="" class="product-title">{{ $parents->title }}
                        <span class="badge badge-warning float-right">BDT {{ $parents->offer_price }}</span></a>

                    
                    </div>
                  </li>
          @endforeach


                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

      @endsection
