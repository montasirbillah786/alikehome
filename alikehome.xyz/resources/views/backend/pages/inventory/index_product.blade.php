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


                            <div class="card-body">
                                <table id="example1"  class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th>Product name</th>
                                        <th>Product Quantity</th>
                                        <th>Product Price</th>
                                        <th>Total Price</th>
                                        <th>Invoice ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer Number</th>
                                        <th>Date</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;  ?>
                                    @foreach ($data as $data)

                                        <tr>
                                            <td scope="row"><?php echo $i++ ?></td>
                                            <td scope="row">{{ $data->product_name  }}</td>
                                            <td scope="row">{{ $data->sales_quantity  }}</td>
                                            <td scope="row">{{ $data->sales_offer_price  }}</td>
                                            <td scope="row">{{ $data->sales_total  }}</td>
                                            <td scope="row">{{ $data->invoice_id  }}</td>
                                            <td scope="row">{{ $data->sales_name  }}</td>
                                            <td scope="row">{{ $data->sales_sales_number  }}</td>
                                            <td scope="row">{{ $data->created_at  }}</td>
                                          <?php  $vendorName = getVendorName($data->vendor);?>
                                            @if(isset($vendorName))
                                            <td scope="row">{{$vendorName->name}}</td>
                                            @else
                                            <td scope="row">{{$vendorName->admin}}</td>
                                            @endif
                                        </tr>

                                    @endforeach
                                    </tfoot>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
