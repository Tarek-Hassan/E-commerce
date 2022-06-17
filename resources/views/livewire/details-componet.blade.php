    <main id="main" class="main-site">

		<div class="container">

			<div class="row" style="margin-top: 10%">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-product-detail">
						<div class="detail-media">
							<div class="product-gallery" wire:ignore>
							  <ul class="slides">

							    <li data-thumb="{{asset($item->image)}}">
							    	<img src="{{asset($item->image)}}" alt="{{$item->name}}" />
							    </li>
								
								 @if ($item->images)
									@php
										$images=explode(",",$item->images);
									@endphp
									
									@foreach ($images  as $image)
										<li data-thumb="{{asset($image)}}">
											<img src="{{asset($image)}}" />
										</li>
									@endforeach
								@endif 

                                
							  </ul>
							</div>
						</div>
						<div class="detail-info">
							@if ($item->orderItems)
								<div class="product-rating">
									@php
										$avgrating=0;
									@endphp

									@foreach ($item->orderItems->where('status',1) as $orderItem  )
										@php
									
											$avgrating += optional($orderItem->review)->rating;
										@endphp
									@endforeach
									@for ($i=1;$i<=5;$i++)
										@if ($i <= $avgrating)
											<i class="fa fa-star" aria-hidden="true"></i>
										@else
											<i class="fa fa-star color-gray" aria-hidden="true"></i>
										@endif
									@endfor
									<a href="#" class="count-review">({{$item->orderItems->where('status',1)->count()}} review)</a>
								</div>
							@endif
                            <h2 class="product-name">{{$item->name}}</h2>
                            <div class="short-desc">
                               <p>{!!$item->short_description!!}</p>
                            </div>
                            <div class="wrap-social">
                            	<a class="link-socail" href="#"><img src="{{asset('assets/images/social-list.png')}}" alt=""></a>
                            </div>

							@if ($item->sale_price > 0 && $sale_date > now() )
								<div class="wrap-price"><ins><p class="product-price">${{$item->sale_price}}</p></ins> <del><p class="product-price">${{$item->regular_price}}</p></del></div>
							@else
                            	<div class="wrap-price"><span class="product-price">${{$item->regular_price}}</span></div>
							@endif

                            <div class="stock-info in-stock">
                                <p class="availability">Availability: <b>{{$item->stock_status}}</b></p>
                            </div>
							<div>

								@foreach ($item->attributes->unique('attribute_id') as $key=>$attr)
							
								<div class="row" style="margin-top:20px;">
									<div class="col-xs-2">
										<p>{{$attr->attribute->name}}</p>
									</div>
									<div class="col-xs-10">
										<select class="form-control" style="200px"   wire:model="satt.{{$attr->attribute->name}}" >
											@foreach ( $attr->attribute->products->where('product_id',$item->id) as $pav)
												<option value="{{$pav->value}}" >{{$pav->value}}</option>
											@endforeach

										</select>
									</div>
								</div>
								@endforeach
							</div>
                            <div class="quantity" style="margin-top: 200px;">
                            	<span>Quantity:</span>
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="1" wire:model="qty" data-max="120" pattern="[0-9]*" >
									<a class="btn btn-reduce" href="#" wire:click.prevent="reduceQty()" ></a>
									<a class="btn btn-increase" href="#" wire:click.prevent="increaseQty()"></a>
									
								</div>
							</div>
							<div class="wrap-butons">
								<a href="#" class="btn add-to-cart" wire:click.prevent="store({{$item->id}},'{{$item->name}}',{{$item->regular_price}})">Add to Cart</a>
                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                                </div>
							</div>
						</div>
						<div class="advance-info">
							<div class="tab-control normal">
								<a href="#description" class="tab-control-item active">description</a>
								<a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
								<a href="#review" class="tab-control-item">Reviews</a>
							</div>
							<div class="tab-contents">
								<div class="tab-content-item active" id="description">
                                    <p>{!!$item->description!!}</p>
								</div>
								<div class="tab-content-item " id="add_infomation">
									<table class="shop_attributes">
										<tbody>
											<tr>
												<th>Weight</th><td class="product_weight">1 kg</td>
											</tr>
											<tr>
												<th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
											</tr>
											<tr>
												<th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="tab-content-item " id="review">
									
									<div class="wrap-review-form">
										
										<div id="comments">
											<h2 class="woocommerce-Reviews-title">{{$item->orderItems->where('status',1)->count()}} review for <span>{{$item->name}}</span></h2>
											<ol class="commentlist">
												@foreach ($item->orderItems->where('status',1) as $orderItem  )
												<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
													<div id="comment-20" class="comment_container"> 
														<img alt="" src="{{asset(optional(optional(optional($orderItem->review)->user)->profile)->image)}}" height="80" width="80">
														<div class="comment-text">
															<div class="star-rating">
																<span class="width-{{optional($orderItem->review)->rating * 20}}-percent">Rated <strong class="rating">{{optional($orderItem->review)->rating}}</strong> out of 5</span>
															</div>
															<p class="meta"> 
																<strong class="woocommerce-review__author">{{optional(optional($orderItem->review)->user)->name}}</strong> 
																<span class="woocommerce-review__dash">–</span>
																<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse(optional($orderItem->review)->create_at)->format('d F Y g:i A')}}</time>
															</p>
															<div class="description">
																<p>{{optional($orderItem->review)->comment}}</p>
															</div>
														</div>
													</div>
												</li>
												@endforeach
											</ol>
										</div>
										<!-- #comments -->

									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget widget-our-services ">
						<div class="widget-content">
							<ul class="our-services">

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Free Shipping</b>
											<span class="subtitle">On Oder Over $99</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-gift" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Special Offer</b>
											<span class="subtitle">Get a gift!</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-reply" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Order Return</b>
											<span class="subtitle">Return within 7 days</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div><!-- Categories widget-->
                    @if (count($popular_product) > 0)     
                        <div class="widget mercado-widget widget-product">
                            <h2 class="widget-title">Popular Products</h2>
                            <div class="widget-content">
                                <ul class="products">
                                    @foreach ( $popular_product as $product )
                                        
                                        <li class="product-item">
                                            <div class="product product-widget-style">
                                                <div class="thumbnnail">
                                                    <a href="{{route('product.detail',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                                        <figure><img src="{{asset($product->image)}}" alt=""></figure>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <a href="#" class="product-name"><span>{{$product->name}}</span></a>
                                                    <div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    @endif

				</div><!--end sitebar-->
                @if (count($related_product) > 0)
                    <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wrap-show-advance-info-box style-1 box-in-site">
                            <h3 class="title-box">Related Products</h3>
                            <div class="wrap-products">
                                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                                    @foreach ( $related_product as $product)
                                        
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{route('product.detail',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                                    <figure><img src="{{asset($product->image)}}" width="214" height="214" alt="{{$product->name}}"></figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>{{$product->name}}</span></a>
                                                <div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!--End wrap-products-->
                        </div>
                    </div>
                @endif
			</div><!--end row-->

		</div><!--end container-->

	</main>
	@push("styles")
	<style>
		.color-gray{
			color:#e6e6e6 !important;
		}
	</style>
		
	@endpush

