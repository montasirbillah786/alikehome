<section class="product_area related_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Available Rooms	</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product_carousel product_column5 owl-carousel">
                        @foreach($related_product as $product)
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    @php $i=1; @endphp

                                    @foreach ($product->images as $image)

                                    @if ($i>0)
                                    <a class="primary_img" href="{{route('products.show',$product->id)}}"><img src="{{asset('img/product/'.$image->image)}}" alt=""></a>
                                    @endif

                                    @php $i-- @endphp

                               @endforeach

                                 
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="product-details.html">{{$product->title}}</a></h4>
                                    <p><a href="#">{{$product->category->name}}</a></p>
                                    <div class="price_box">
                                        <span class="currency" data-spm-anchor-id="a2a0e.home.flashSale.i0.735245913NXVo6">৳</span> <span class="current_price">{{$product->offer_price}}</span>
                                        <br>
                                        <span class="currency" data-spm-anchor-id="a2a0e.home.flashSale.i0.735245913NXVo6">৳</span> <span class="old_price">{{$product->price}}</span>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                        @endforeach

                </div>
            </div>
        </div>
    </section>
