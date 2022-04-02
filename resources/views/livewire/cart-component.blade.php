<div>
   	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Cart</span></li>
				</ul>
			</div>
			<div class=" main-content-area">

				<div class="wrap-iten-in-cart">
					@if (Session::has('success_message'))
						<div class="alert alert-success">
							<strong>Success</strong>{{Session::get('success_message')}}

						</div>
					@endif
					@if (Cart::count() > 0)
						<h3 class="box-title">Products Name</h3>
						<ul class="products-cart">
							@forelse (Cart::content() as $item )
							{{-- {{dd($item->model)}} --}}
								<li class="pr-cart-item">
									<div class="product-image">
										<figure><img src="{{asset('assets/images/products/'.$item->model->image)}}" alt="{{$item->model->name}}"></figure>
									</div>
									<div class="product-name">
										<a class="link-to-product" href="{{route('product.detail',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
									</div>
									<div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
									<div class="quantity">
										<div class="quantity-input">
											<input type="text" name="product-quatity" value="{{$item->qty}}" data-max="{{$item->model->quantity}}" pattern="[0-9]*" >									
											<a class="btn btn-increase" href="#"></a>
											<a class="btn btn-reduce" href="#"></a>
										</div>
									</div>
									<div class="price-field sub-total"><p class="price">${{$item->subtotal}}</p></div>
									<div class="delete">
										<a href="#" class="btn btn-delete" title="">
											<span>Delete from your cart</span>
											<i class="fa fa-times-circle" aria-hidden="true"></i>
										</a>
									</div>
								</li>
							@empty
								<h4>no item fount in cart</h4>
							@endforelse

							
													
						</ul>
					@endif
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index">${{Cart::subtotal()}}</b></p>
						<p class="summary-info"><span class="title">Tax</span><b class="index">${{Cart::tax()}}</b></p>
						<p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
						<p class="summary-info total-info "><span class="title">Total</span><b class="index">${{Cart::total()}}</b></p>
					</div>
					<div class="checkout-info">
						<label class="checkbox-field">
							<input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
						</label>
						<a class="btn btn-checkout" href="checkout.html">Check out</a>
						<a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear">
						<a class="btn btn-clear" href="#">Clear Shopping Cart</a>
						<a class="btn btn-update" href="#">Update Shopping Cart</a>
					</div>
				</div>

				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >


						@foreach ( $items as $item )							
							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="{{$item->name}}">
										<figure><img src="{{asset('assets/images/products/'.$item->image)}}" width="214" height="214" alt="{{$item->name}}"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
										<span class="flash-item sale-label">sale</span>
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="{{route('product.detail',['slug'=>$item->slug])}}" class="product-name"><span>{{$item->name}}</span></a>
									<div class="wrap-price"><ins><p class="product-price">${{$item->sale_price}}</p></ins> <del><p class="product-price">${{$item->regular_price}}</p></del></div>
								</div>
							</div>
						@endforeach




						</div>
					</div><!--End wrap-products-->
				</div>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->

</div>
