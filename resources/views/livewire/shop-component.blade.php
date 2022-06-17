<div>
   	<!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Digital & Electronics</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="{{asset('assets/images/shop-banner.jpg')}}" alt=""></figure>
						</a>
					</div>

					<div class="wrap-shop-control">

						<h1 class="shop-title">Digital & Electronics</h1>

						<div class="wrap-right">

							<div class="sort-item orderby ">
								<select name="orderby" class="use-chosen" wire:model="sorting">
									<option value="default" selected="selected">Default sorting</option>
									<option value="date">Sort by newness</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
							</div>

							<div class="sort-item product-per-page">
								<select name="post-per-page" class="use-chosen" wire:model="paginate">
									<option value="12" selected="selected">12 per page</option>
									<option value="16">16 per page</option>
									<option value="18">18 per page</option>
									<option value="21">21 per page</option>
									<option value="24">24 per page</option>
									<option value="30">30 per page</option>
									<option value="32">32 per page</option>
								</select>
							</div>

							<div class="change-display-mode">
								<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
								<a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
							</div>

						</div>

					</div><!--end wrap shop control-->

					<div class="row">


						<ul class="product-list grid-products equal-container">
							@php
								$wItems=Cart::instance('wishlist')->content()->pluck('id');	
							@endphp
							@forelse ( $items as $item )	
								<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
									<div class="product product-style-3 equal-elem ">
										<div class="product-thumnail">
											<a href="{{route('product.detail',['slug'=>$item->slug])}}" title="{{$item->name}}">
												<figure><img src="{{asset($item->image)}}" alt="{{$item->name}}"></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$item->name}}</span></a>
											<div class="wrap-price"><span class="product-price">${{$item->regular_price}}</span></div>
											<a href="#" class="btn add-to-cart" wire:click.prevent="store({{$item->id}},'{{$item->name}}',{{$item->regular_price}})">Add To Cart</a>
											<div class="product-wish">
												
											@if ($wItems->contains($item->id))
											<a href="#"  wire:click.prevent="removeFromWishlist({{$item->id}})"><i class="fa fa-heart fill-heart"></i></a>
											@else
											<a href="#" wire:click.prevent="addToWishlist({{$item->id}},'{{$item->name}}',{{$item->regular_price}})"><i class="fa fa-heart"></i></a>
											@endif
											</div>
										</div>
									</div>
								</li>
							@empty
								<h4> no product found</h4>
							@endforelse

						</ul>

					</div>

					<div class="wrap-pagination-info">
						{{$items->links('pagination::bootstrap-4')}}
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title">All Categories</h2>
						<div class="widget-content">
							<ul class="list-category">
								@foreach ($Categories as $category)
									<li class="category-item {{count($category->subCategories) > 0 ? 'has-child-cate':''}} ">
										<a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="cate-link">{{$category->name}}</a>
										@if (count($category->subCategories) > 0)	
											<span class="toggle-control">+</span>
											<ul class="sub-cate">
												@foreach ($category->subCategories as $subCategory)
												<li class="category-item"><a href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$subCategory->slug])}}" class="cate-link">{{$subCategory->name}} (22)</a></li>
												@endforeach
											</ul>
										@endif
									</li>
								@endforeach


							</ul>
						</div>
					</div><!-- Categories widget-->

					<div class="widget mercado-widget filter-widget brand-widget">
						<h2 class="widget-title">Brand</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list list-limited" data-show="6">
								<li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
								<li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
								<li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
								<li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
								<li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
								<li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
								<li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div><!-- brand widget-->

					<div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title">Price <span class="text-info">[ $ {{$min_price}} - $ {{$max_price}}]</span></h2>
						<div class="widget-content">
							<div id="slider" wire:ignore></div>
							{{-- <div id="slider-range"></div>
							<p>
								<label for="amount">Price:</label>
								<input type="text" id="amount" readonly>
								<button class="filter-submit">Filter</button>
							</p> --}}
						</div>
					</div><!-- Price-->

					<div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Color</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list has-count-index">
								<li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
							</ul>
						</div>
					</div><!-- Color -->

					<div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Size</h2>
						<div class="widget-content">
							<ul class="list-style inline-round ">
								<li class="list-item"><a class="filter-link active" href="#">s</a></li>
								<li class="list-item"><a class="filter-link " href="#">M</a></li>
								<li class="list-item"><a class="filter-link " href="#">l</a></li>
								<li class="list-item"><a class="filter-link " href="#">xl</a></li>
							</ul>
							<div class="widget-banner">
								<figure><img src="{{asset('assets/images/size-banner-widget.jpg')}}" width="270" height="331" alt=""></figure>
							</div>
						</div>
					</div><!-- Size -->

					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Popular Products</h2>
						<div class="widget-content">
							<ul class="products">
								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="{{asset('assets/images/products/digital_01.jpg')}}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
											<div class="wrap-price"><span class="product-price">$168.00</span></div>
										</div>
									</div>
								</li>

								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="{{asset('assets/images/products/digital_17.jpg')}}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
											<div class="wrap-price"><span class="product-price">$168.00</span></div>
										</div>
									</div>
								</li>

								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="{{asset('assets/images/products/digital_18.jpg')}}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
											<div class="wrap-price"><span class="product-price">$168.00</span></div>
										</div>
									</div>
								</li>

								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="{{asset('assets/images/products/digital_20.jpg')}}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
											<div class="wrap-price"><span class="product-price">$168.00</span></div>
										</div>
									</div>
								</li>

							</ul>
						</div>
					</div><!-- brand widget-->

				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->

</div>
@push('styles')
	<style>
		.product-wish{
			position: absolute;
			top: 10%;
			left: 0;
			z-index: 99;
			right: 30px;
			text-align: right;
			padding-top: 0;
		}
		.product-wish .fa{
			color: #cbcbcb;
			font-size: 32px;
		}
		.product-wish .fa:hover{
			color: #ff7007 ;
		}
		.fill-heart{
			color: #ff7007 !important;
		}

	</style>
@endpush
@push('scripts')
	<script>
		let slider = document.getElementById('slider');

			noUiSlider.create(slider, {
				start: [1, 1000],
				connect: true,
				range: {
					'min': 1,
					'max': 1000
				},
				pips: {
					mode: 'steps',
					stepped: true,
					density: 4
    			}
			});

			slider.noUiSlider.on('update',function(value){
				@this.set('min_price', value[0]);
				@this.set('max_price',value[1]);
			});

	</script>	
@endpush