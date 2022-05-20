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
                    <div class="col-6">
                        <?php $i=1; ?>
                        @foreach ($salesdata as $salesdata)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">order Details (<?php echo $i++ ?>)</h3>
                                </div>

                                <div class="row">
                                    <div class="col-1">
                                    </div>

                                    <div class="col-11">
                                        <h4 style="color:blue;">Invoice Name :{{$salesdata->invoice_id}}</h4>
                                        <h5>Product Name :{{$salesdata->sales_title}}</h5>
                                        <h5>Product Quentity :{{$salesdata->sales_quantity}}</h5>
                                        <h5>Price :{{$salesdata->sales_total}}</h5>
                                        <h5>Customer Name :{{$salesdata->sales_name}}</h5>
                                        <h5>Customer Number :{{$salesdata->sales_sales_number}}</h5>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order tracking </h3>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <!-- <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                    <h5>Picked</h5>
                                    <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                    <h5>Picked</h5> -->
                                    <div class="row" style="padding:10px;">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-2">
                                            @if($salesdata->sales_is_paid == 1)
                                                <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            @else
                                                <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                                            @endif
                                            <h5>Paid</h5>
                                        </div>
                                        <div class="col-md-3">
                                            @if($salesdata->sales_is_picked == 1)
                                                <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            @else
                                                <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                                            @endif
                                            <h5>Picked</h5>
                                        </div>
                                        <div class="col-md-3">
                                            @if($salesdata->sales_is_shipped == 1)
                                                <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            @else
                                                <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                                            @endif
                                            <h5>Shipped</h5>
                                        </div>
                                        <div class="col-md-3">
                                            @if($salesdata->sales_is_delivered == 1)
                                                <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            @else
                                                <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                                            @endif
                                            <h5>Deliverved</h5>
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Download Invoice </h3>
                            </div>

                            <div class="row" style="padding:10px;">
                                <div class="col-12">
                                    <form method="post" action="{{route('order.invoice.update',$salesdata->sales_id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary" >Invoice</button>

                                    </form>
                                </div>


                            </div>

                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order Track Zone </h3>
                            </div>

                            <div class="row" style="padding-top:10px;padding-bottom:10px;">
                                <div class="col-3">
                                    <form method="post" action="{{route('is_sales.paid.update',$salesdata->sales_id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @if($salesdata->sales_is_paid == 1)
                                            <button type="submit" class="btn btn-success" >sales_is_paid</button>
                                        @else
                                            <button type="submit" class="btn btn-danger">sales_is_paid</button>
                                        @endif


                                    </form>


                                </div>

                                <div class="col-3">

                                    <a href="{{route('admin.pick.view',$salesdata->sales_id)}}" class="btn btn-success"> sales_is_Picked </a>
                                </div>
                                <div class="col-3">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Shipping_name
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Shipping Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="post" action="{{ route('admin.shipping.store') }}" enctype="multipart/form-data">
                                                    <!-- {{ csrf_field() }} -->
                                                        @csrf
                                                        <input type="hidden" class="form-control" name="invoice_id"  value="{{$salesdata->invoice_id}}">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Courrier Service Name</label>
                                                            <input type="text" class="form-control" name="courrier_name" placeholder="Enter Courrier Service Name">
                                                            <small id="emailHelp" class="form-text text-muted"> Share your Courrier Service Name.</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Rider Name</label>
                                                            <input type="text" class="form-control" name="rider_name"  placeholder="Enter your Rider Name">
                                                            <small id="emailHelp" class="form-text text-muted"> Share your Rider Name.</small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Amount</label>
                                                            <input type="number" class="form-control" name="amount" placeholder="Enter your Amount">
                                                            <small id="emailHelp" class="form-text text-muted"> Share your Amount.</small>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                                        Shipping_Show
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">View Shipping Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach(App\Shipping::orderby('id','asc')->where('invoice_id',$salesdata->invoice_id)->get() as $shipping)
                                                        <p>Invoice Id: {{$shipping->invoice_id}}</p>
                                                        <p>Currier Service Name: {{$shipping->courrier_name}}</p>
                                                        <p>Rider Name: {{$shipping->rider_name}}</p>
                                                        <p>Amount: {{$shipping->amount}} Taka</p>
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>




                        </div>
                        <div class="row">
                            <div class="col-4">
                                <form method="post" action="{{route('is_sales.shipped.update',$salesdata->sales_id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @if($salesdata->sales_is_shipped == 1)
                                        <button type="submit" class="btn btn-success" >sales_is_shipped</button>
                                    @else
                                        <button type="submit" class="btn btn-danger">sales_is_shipped</button>
                                    @endif

                                </form>


                            </div>

                            <div class="col-4">
                                <form method="post" action="{{route('is_sales.paid.updates',$salesdata->sales_id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @if($salesdata->sales_is_delivered == 1)
                                        <button type="submit" class="btn btn-success" >sales_is_delivered</button>
                                    @else
                                        <button type="submit" class="btn btn-danger">sales_is_delivered</button>
                                    @endif
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection
