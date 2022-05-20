@extends("layouts.vendormaster")

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
                    <th>Invoice Name</th>
                    <th>Customer Name</th>
                    <th>Customer Number</th>
                    <th>Paid || Picked || Shipped</th>
                    <th>Action</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                 <?php $i=1; ?>
                  @foreach ($salesdata as $salesdata)
                 
                    <tr>
                      <td scope="row"><?php echo $i++ ?></td> 
                      <td scope="row">{{ $salesdata->invoice_id }}</td>
                      <td>{{ $salesdata->sales_name }}</td>
                      <td>{{ $salesdata->sales_sales_number }}</td>

                      <td>  
        <div class="btn-group" role="group" aria-label="Basic example">
          <?php if($salesdata->sales_is_paid == 1) {?>


          
         
          <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
        <?php } else {?>
         <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
         <?php } ?>

          @if($salesdata->sales_is_picked == 1)
         <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
         @else
         <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
         @endif

         @if($salesdata->sales_is_shipped == 1)
         <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
         @else
         <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
         @endif
      </div>
      </td>
                      
        <td><a href="{{route('vendor.sales_data.view',$salesdata->invoice_id)}}" class="btn btn-success"> View </a></td>
        <td><a href="" class="btn btn-danger"> Delete </a></td>
                      

                        

                      
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