@extends("layouts.adminmaster")

@section('content')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order Name</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($order as $order)

                                        <tr>
                                            <th scope="row"><?php echo $i++ ?></th>
                                            <td>{{ getAdsName($order->ads_id)->note }}</td>

                                            <td>{{ $order->company_name }}</td>
                                            <td>{{ date('d-M-y', strtotime($order->created_at)) }}</td>
                                            <td> <a href="{{ route('admin.ads.order.view',$order->id) }}"><button type="button" class="btn btn-primary">view</button> </a></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    @if(is_null($order->product_image))

                                                        <button type="button" class="btn btn-success">Pending</button>
                                                    @else
                                                        <button type="button" class="btn btn-success">Confirmed</button>
                                                    @endif
                                                </div>
                                            </td>
                                            <td><a href="{{ route('admin.order.delete',$order->id)}}"> <button type="button" class="btn btn-danger">Delete</button></td>



                                        </tr>

                                    @endforeach
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>



@endsection
