


<form class="form-inline" action="{{ route('compare.store')}}" method="post">

	@csrf
	<input type="hidden" name="product_id" value="{{ $product->id }}">
	<input type="hidden" name="product_quantuty" value="1">

<button type="submit" class="compare" title="Add to Compare" style="border:none;background-color:transparent;"><a href=""><span class="lnr lnr-sync"></span></a></button>

</form>
