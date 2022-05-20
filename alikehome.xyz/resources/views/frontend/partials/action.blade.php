<ul>
  <li class="add_to_cart"> @include('frontend.partials.cart2')</li>
  <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box{{$product->id}}"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>  
  <li class="compare">@include('frontend.partials.compare')</li>
</ul>