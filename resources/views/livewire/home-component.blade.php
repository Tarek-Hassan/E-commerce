<div>
   
	<main id="main">
		<div class="container">

			<!--MAIN SLIDE-->
			<div class="wrap-main-slide">

				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">

					@foreach ( $sliders as $slider)
						
						<div class="item-slide">
							<img src="{{asset($slider->image)}}" alt="{{$slider->title}}" class="img-slide">
							<div class="slide-info slide-1">
								<h2 class="f-title">{{$slider->title}}</h2>
								<span class="subtitle">{{$slider->subtitle}}</span>
								<p class="sale-info">Only price: <span class="price">${{$slider->price}}</span></p>
								<a href="{{$slider->link}}" class="btn-link">{{__('Shop Now')}}</a>
							</div>
						</div>
					@endforeach

				</div>
			</div>

			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{asset('assets/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190"></figure>
					</a>
				</div>
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{asset('assets/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190"></figure>
					</a>
				</div>
			</div>

			<!--On Sale-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">On Sale</h3>
				<div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('assets/images/products/tools_equipment_7.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
							<div class="wrap-price"><span class="product-price">$250.00</span></div>
						</div>
					</div>

					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('assets/images/products/digital_18.jpg')}}" width="800" height="800" alt=""></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
							<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
						</div>
					</div>

					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('assets/images/products/fashion_08.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
							<div class="wrap-price"><span class="product-price">$250.00</span></div>
						</div>
					</div>

					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('assets/images/products/digital_17.jpg')}}" width="800" height="800" alt=""></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
							<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
						</div>
					</div>

					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('assets/images/products/tools_equipment_3.jpg')}}" width="800" height="800" alt=""></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
							<div class="wrap-price"><span class="product-price">$250.00</span></div>
						</div>
					</div>

					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('assets/images/products/fashion_05.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
							<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
						</div>
					</div>

					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('assets/images/products/digital_4.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
							<div class="wrap-price"><span class="product-price">$250.00</span></div>
						</div>
					</div>

					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('assets/images/products/kidtoy_05.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
							<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
						</div>
					</div>

				</div>
			</div>

			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{asset('assets/images/digital-electronic-banner.jpg')}}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">						
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >



									@foreach ($lproducts as $lproduct )
											
										<div class="product product-style-2 equal-elem ">
											<div class="product-thumnail">
												<a href="{{route('product.detail',['slug'=>$lproduct->slug])}}" title="{{$lproduct->name}}">
													<figure><img src="{{asset($lproduct->image)}}" width="800" height="800" alt="{{$lproduct->name}}"></figure>
												</a>
												<div class="group-flash">
													<span class="flash-item new-label">new</span>
													@if ($lproduct->sale_price > 0)
														<span class="flash-item sale-label">sale</span>
													@endif
													<span class="flash-item bestseller-label">Bestseller</span>
												</div>
												<div class="wrap-btn">
													<a href="{{route('product.detail',['slug'=>$lproduct->slug])}}" class="function-link">quick view</a>
												</div>
											</div>
											<div class="product-info">
												<a href="{{route('product.detail',['slug'=>$lproduct->slug])}}" class="product-name"><span>{{$lproduct->name}}</span></a>
												<div class="wrap-price"><ins><p class="product-price">${{$lproduct->sale_price}}</p></ins> <del><p class="product-price">${{$lproduct->regular_price}}</p></del></div>
											</div>
										</div>
									@endforeach

								

			

								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>

			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Product Categories</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{asset('assets/images/fashion-accesories-banner.jpg')}}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control">
							@foreach ( $categories as $key=>$category)
								<a href="#fashion_{{$category->id}}" class="tab-control-item {{$key==0 ? 'active' : ''}}">{{$category->name}}</a>
							@endforeach
						</div>
						<div class="tab-contents">
							@foreach ( $categories as $key=>$category)
								@php
									$c_products=$products->where('category_id',$category->id)->take($no_of_products)
								@endphp
								<div class="tab-content-item {{$key==0 ? 'active' : ''}}" id="fashion_{{$category->id}}">
									<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
										@foreach ( $c_products as $c_product)
											<div class="product product-style-2 equal-elem ">
												<div class="product-thumnail">
													<a href="{{route('product.detail',['slug'=>$c_product->slug])}}" title="{{$c_product->name}}">
														<figure><img src="{{asset($c_product->image)}}" width="800" height="800" alt="{{$c_product->name}}"></figure>
													</a>
													<div class="group-flash">
														<span class="flash-item new-label">new</span>
													</div>
													<div class="wrap-btn">
														<a href="#" class="function-link">quick view</a>
													</div>
												</div>
												<div class="product-info">
													<a href="#" class="product-name"><span>{{$c_product->name}}</span></a>
													<div class="wrap-price"><span class="product-price">${{$c_product->regular_price}}</span></div>
												</div>
											</div>
										@endforeach

									</div>
								</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>			

		</div>

	</main>
</div>
