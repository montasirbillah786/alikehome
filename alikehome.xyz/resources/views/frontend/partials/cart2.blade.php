<form class="form-inline" action="{{ route('carts.store')}}" method="post">

	@csrf
	<input type="hidden" name="product_id" value="{{ $product->id }}">
	<input type="hidden" name="product_quantuty" value="1">

<button type="submit"  title="Add to cart" style="border:none;background-color:transparent;"><a href=""><span class="lnr lnr-cart"></span></a></button>

</form>
