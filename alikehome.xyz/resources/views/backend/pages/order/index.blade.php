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
                    <th scope="col">Order ID</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Client Number</th>
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
      <td>{{ $order->id }}</td>
    
      <td>{{ $order->name }}</td>
      <td>{{ $order->phone_number }}</td>
      <td>{{ date('d-M-y', strtotime($order->created_at)) }}</td>
      

   
      <td> <a href="{{ route('admin.order.view',$order->id) }}"><button type="button" class="btn btn-primary">view</button> </a></td>

      <td>  
        <div class="btn-group" role="group" aria-label="Basic example">
          @if($order->pending)
         
          <button type="button" class="btn btn-success">Pending</button>
         @else
         <button type="button" class="btn btn-warning">Not pending</button>
         @endif

         @if($order->confirmed)
         <button type="button" class="btn btn-success">Confirmed</button>
         @else
         <button type="button" class="btn btn-warning">Not Confirmed</button>
         @endif

         @if($order->processing)
         <button type="button" class="btn btn-success">Processing</button>
         @else
         <button type="button" class="btn btn-warning">Not Processing</button>
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