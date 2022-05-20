@extends("layouts.vendormaster")

 @section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
   
    </div>
 
    <section class="content">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-lg-8">
            <!-- small box -->
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
                      @foreach($order as $order)
                    <tr>
                      <td>{{$order->invoice_id}}</td>
                      <td>{{$order->title}}</td>
                      <?php if($order->pending == 1 and $order->confirmed == 1 and $order->processing == 1) { ?>
                      <td><span class="badge badge-success">Successfull</span></td>
                    <?php  } elseif($order->pending == 1 and $order->confirmed == 1) { ?>
                      <td><span class="badge badge-info">Confirm</span></td>
                    <?php  } elseif($order->pending == 1)  { ?>
                      <td><span class="badge badge-warning">Confirm</span></td>
                      <?php  } else { ?>
                      <td><span class="badge badge-danger">Pending</span></td>
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
          
                <a href="{{route('vendor.pages.order.index') }}" class="btn btn-sm btn-info float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Order</span>
                <span class="info-box-number">{{ App\Order::order_count_vendor() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fab fa-sellsy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Daily Sell</span>
                <span class="info-box-number">BDT {{ App\SalesData::day_order_sums() }}  <a href="{{route('export.report.dailydatas')}}" class="btn btn-sm btn-primary float-right">Download</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-layer-group"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Monthly Sell</span>
                <span class="info-box-number">BDT {{ App\SalesData::month_order_sums() }} <a href="{{route('export.report.monthdatas')}}" class="btn btn-sm btn-success float-right">Download</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-vote-yea"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Yearly Sell</span>
                <span class="info-box-number">BDT {{ App\SalesData::year_order_sums() }} <a href="{{route('export.report.yeardatas')}}" class="btn btn-sm btn-warning float-right">Download</a></span>
                <span></span>
                              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
        

        
          <!-- ./col -->
        </div>
        <!-- Main row -->

        
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            
              <div class="card">
                                    <h5 class="card-header">Stock at a glance</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Product Name</th>
                                                        <th class="border-0">Product Quantity</th>
                                                        <th class="border-0">Price</th>
                                                        <th class="border-0">Created_at</th>
                                                        <th class="border-0">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $i=1; ?>
                                                    @foreach(App\Product::orderby('quantity','ASC')->where('admin_id',Auth::user()->id)->get() as $parents)
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                      
                                                        <td>{{$parents->title}}</td>
                                                        <td>{{$parents->quantity}} </td>
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
          </div>
         
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      @endsection