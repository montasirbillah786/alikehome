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
                                        <th>Vendor/Shop Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($vendor as $date)

                                        <tr>
                                            <td scope="row"><?php echo $i++ ?></td>
                                            <td scope="row">{{ getVendorName($date->admin_id)->name}}</td>
                                            <td scope="row"><a href="{{route('backend.pages.vendor_wise_product',$date->admin_id)}}" class="btn btn-success"> View </a></td>
                                            <td scope="row"><a href="{{route('export.report.vendor_wise_product_data',$date->admin_id)}}" class="btn btn-success"> Download Excel </a></td>
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
