@extends("layouts.master")

 @section('content')
  
    
    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            @include('frontend.partials.sort')
                           
                           
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                        <div class=" niceselect_option">
                           
                        </div>
                        <div class="page_amount">
                            <!-- <p>Showing 1–9 of 21 results</p> -->
                        </div>
                    </div>
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">


                        


                    
                       @foreach($vendor as $vendor)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <div  class="card" style="width: 18rem;height: 15rem;">
                                        <a class="primary_img" href="{{route('vendor.shot',$vendor->id)}}"><img src="{{getImage($vendor->image,'vendor')}}" alt="" ></a>
                                         
                                        
                                      </div>  
                                        
                                    </div>
                                <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="{{route('vendor.shot',$vendor->id)}}">{{$vendor->name}}</a></h4>
                                      
                                    </div>
                                <div class="product_content list_content">
                                       <h4 class="product_name"><a href="{{route('vendor.shot',$vendor->id)}}">{{$vendor->name}}</a></h4>
                                        
                                        
                                        
                                    </div>
                            </div>
                        </div>

                        @endforeach

                     

                        
                    </div>

                    
                   
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
@endsection

