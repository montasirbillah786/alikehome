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
    <!--       <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Track Zone </h3>
              </div>
              
                <div class="row" style="padding-top:10px;padding-bottom:10px;">
                

                 <div class="col-3">
                 	
                        <a href="{{route('vendor.pick.view',$salesdata->sales_id)}}" class="btn btn-success"> sales_is_Picked </a>
                 </div>
               

                  

                   
             </div>

              

               
          </div> -->
     
    </div>
</section>
</div>



    @endsection