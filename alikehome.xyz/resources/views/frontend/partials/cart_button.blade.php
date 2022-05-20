<form class="form-inline" action="{{ route('carts.store')}}" method="post">

                                                    @include('frontend.partials.message')



                                                <input type="hidden" name="product_quantuty" value="{{ is_null($product->product_quantuty) ? '1' : ' $product->product_quantuty'}}" min="1">













     @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <button class="button" type="submit">Book Now</button>

</form>
<!-- <form class="form-inline" action="{{ route('carts.store')}}" method="post">
@include('frontend.partials.message')
@csrf
<input type="number" name="product_quantuty" value="{{ is_null($product->product_quantuty) ? '1' : ' $product->product_quantuty'}}" min="1">
<button class="button" type="submit">add to cart</button>
  </form> -->
