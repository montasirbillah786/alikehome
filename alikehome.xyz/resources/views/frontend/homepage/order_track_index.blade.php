<?php if(is_null($products)) { ?>

     <p>no data found</p>

  <?Php }else { ?>

  	



 <?php }?>


 @extends("layouts.master")

 @section('content')

 
        <div class="container" style="padding:50px;">   
            <div class="row">
            	<div class="col-3" style="text-align: center;"></div>
                <div class="col-8" style="text-align: center;">
                	<div class="card" style="width: 28rem;">
						  <div class="card-header">
						    <h4>Order Tracking For Your Product</h4>
						  </div>
						  <ul class="list-group list-group-flush">
						  	@foreach($products as $product)


						  	@if($product->sales_is_paid == 1)
                 				<li class="list-group-item"><button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                 					<h4>Your Order is already paid</h4></li>
					            @else
					            <li class="list-group-item"><button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                 					<h4>Your Order is on poccessing</h4></li>
					             @endif

						   
						    @if($product->sales_is_picked == 1)
                 				<li class="list-group-item"><button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                 					<h4>Your Order is already Picked</h4></li>
					            @else
					            <li class="list-group-item"><button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                 					<h4>Your Order is on poccessing</h4></li>
					             @endif
						    @if($product->sales_is_shipped == 1)
                 				<li class="list-group-item"><button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                 					<h4>Your Order is already shipped</h4></li>
					            @else
					            <li class="list-group-item"><button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                 					<h4>Your Order is on poccessing</h4></li>
					             @endif

					             @if($product->sales_is_delivered == 1)
                 				<li class="list-group-item"><button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                 					<h4>Your Order is already delivered</h4></li>
					            @else
					            <li class="list-group-item"><button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                 					<h4>Your Order is poccessing</h4></li>
					             @endif
						     @endforeach
							</ul>
						</div>
                    
                </div>
            </div>
        </div>         
  


 @endsection