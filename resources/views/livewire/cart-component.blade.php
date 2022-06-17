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
				@if(Cart::instance('cart')->count() > 0)
				
					<div class="wrap-iten-in-cart">
						@if (Session::has('success_message'))
							<div class="alert alert-success">
								<strong>Success</strong>{{Session::get('success_message')}}

							</div>
						@endif
						
						@if (Cart::instance('cart')->count() > 0)
							<h3 class="box-title">Products Name</h3>
							<ul class="products-cart">
								@forelse (Cart::instance('cart')->content() as $item )
								
							
									<li class="pr-cart-item">
										<div class="product-image">
											<figure><img src="{{asset($item->model->image)}}" alt="{{$item->model->name}}"></figure>
										</div>
										<div class="product-name">
											<a class="link-to-product" href="{{route('product.detail',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
										</div>
										
										
										@foreach ($item->options as $key=> $value )
											<div style="vertical-align:middle;width:100px;">
												<p><b>{{$key}} : {{$value}}</b></p>
		
											</div>
											
										@endforeach
										<div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
										<div class="quantity">
											<div class="quantity-input">
												<input type="text" name="product-quatity" value="{{$item->qty}}" data-max="{{$item->model->quantity}}" pattern="[0-9]*" >									
												<a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
												<a class="btn btn-reduce" href="#" wire:click.prevent="reduceQuantity('{{$item->rowId}}')"></a>
											</div>
											<p class="text-center"><a href="" wire:click.prevent="switchToSaveLater('{{$item->rowId}}')">{{__('save_for_later')}}</a></p>

										</div>
										<div class="price-field sub-total"><p class="price">${{$item->subtotal}}</p></div>
										<div class="delete">
											<a href="#" class="btn btn-delete" title="" wire:click.prevent="removeItem('{{$item->rowId}}')">
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
							<p class="summary-info"><span class="title">Subtotal</span><b class="index">${{Cart::instance('cart')->subtotal()}}</b></p>
							@if (Session::has('coupon'))
								<p class="summary-info"><span class="title">Discount ({{Session::get('coupon')['code']}})<a href="#"><i class="fa fa-times text-danger" wire:click.prevent="removeCoupon"></i></a></span><b class="index">${{number_format($discount,2)}}</b></p>
								<p class="summary-info"><span class="title">Tax ({{config('cart.tax')}}%)</span><b class="index">${{number_format($taxAfterDiscount,2)}}</b></p>
								<p class="summary-info"><span class="title">Subtotal with Discount</span><b class="index">${{number_format($subtotalAfterDiscount,2)}}</b></p>
								<p class="summary-info total-info"><span class="title">Total</span><b class="index">${{number_format($TotalAfterDiscount,2)}}</b></p>
							@else
								<p class="summary-info"><span class="title">Tax</span><b class="index">${{Cart::instance('cart')->tax()}}</b></p>
								<p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
								<p class="summary-info total-info "><span class="title">Total</span><b class="index">${{Cart::instance('cart')->total()}}</b></p>
							@endif
						</div>
						<div class="checkout-info">
							@if (!Session::has('coupon'))
								<label class="checkbox-field">
									<input class="frm-input " name="have-code" id="have-code" value="1" wire:model="haveCouponCode" type="checkbox"><span>I have promo code</span>
								</label>
								@if ($haveCouponCode==1)							
									<div class="summary-item">
										<form wire:submit.prevnt="applyCoupon">
											<h4 class="title-box">Coupon Code</h4>
											@if (Session::has('coupon_message'))
												<div class="alert alert-danger">
													<strong>{{__('error')}}  </strong>{{Session::get('coupon_message')}}
								
												</div>
											@endif
											<p class="row-in-form">
												<label for="coupon_code">EnterYourCouponCode:</label>
												<input type="text" name="coupon_code" wire:model="couponCode" id="coupon_code"/>
											<p>
												<button type="submit" class="btn btn-small">Apply</button>
										</form>

									</div>
								@endif
								<a class="btn btn-checkout" href="" wire:click.prevent="checkout">Check out</a>
								<a class="link-to-shop" href="{{route('product.shop')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
							@endif
						</div>
						<div class="update-clear">
							<a class="btn btn-clear" href="#" wire:click.prevent="destroy()">Clear Shopping Cart</a>
							<a class="btn btn-update" href="#" >Update Shopping Cart</a>
						</div>
					</div>
				@else
					<div class="text-center" style="padding:30px 0;">
						<h1> {{__('your_Cart_empty')}}</h1>
						<p> {{__('add_item')}}</p>
						<a href="{{route('product.shop')}}" class="btn btn-success">{{__('shop_now')}}</a>
					</div>
				@endif
				{{--  --}}
				<div class="wrap-iten-in-cart">
					{{-- <h3 class="title-box" >{{Cart::instance('saveForLater')->count()}}  {{ __('saveor_later')}}</h3> --}}
					<h3 class="title-box" style="border-bottom :1px solid;padding-bottom:15px;" >{{Cart::instance('saveForLater')->count()}}  {{ __('save_for_later')}}</h3>
					@if (Session::has('success_message_save'))
						<div class="alert alert-success">
							<strong>Success</strong>{{Session::get('success_message_save')}}

						</div>
					@endif
					
					@if (Cart::instance('saveForLater')->count() > 0)
						<h3 class="box-title">Products Name</h3>
						<ul class="products-cart">
							@forelse (Cart::instance('saveForLater')->content() as $item )
							
						
								<li class="pr-cart-item">
									<div class="product-image">
										<figure><img src="{{asset($item->model->image)}}" alt="{{$item->model->name}}"></figure>
									</div>
									<div class="product-name">
										<a class="link-to-product" href="{{route('product.detail',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
									</div>
	

									<div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
									<div class="quantity">
										<p class="text-center"><a href="" wire:click.prevent="moveToCart('{{$item->rowId}}')">{{__('move_to_cart')}}</a></p>
									</div>

									<div class="delete">
										<a href="#" class="btn btn-delete" title="" wire:click.prevent="removeItemFromSaveLate('{{$item->rowId}}')">
											<span>Delete from your Save Later </span>
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
				{{--  --}}

				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >


						@foreach ( $items as $item )							
							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="{{$item->name}}">
										<figure><img src="{{asset($item->image)}}" width="214" height="214" alt="{{$item->name}}"></figure>
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
