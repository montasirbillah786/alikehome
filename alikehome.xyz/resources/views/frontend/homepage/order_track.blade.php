@extends("layouts.master")

 @section('content')

  <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="search_container">
                                   <form action="{{route('order_track_search')}}" method="get">
                                       
                                        <div class="search_box" >
                                            <input placeholder="Search product by your invoice number ..." type="text" name="search">
                                             <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                        </div>
                                    </form>
                                </div>
                </div>
            </div>
        </div>         
    </div>


 @endsection




    