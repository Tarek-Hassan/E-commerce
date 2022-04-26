<div>
    	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<form wire:submit.prevent="store">
					<div class="row">
						<div class="col-md-12">
							<div class="wrap-address-billing">
								<h3 class="box-title">Shipping  Address</h3>
									<div class="billing-address">
										<p class="row-in-form">
											<label for="fname">first name<span>*</span></label>
											<input  type="text" wire:model.lazy="firstname"  value="" placeholder="Your name">
											  @error('firstname') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="lname">last name<span>*</span></label>
											<input  type="text" wire:model.lazy="lastname" value="" placeholder="Your last name">
											  @error('lastname') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="email">Email Addreess:</label>
											<input  type="email" wire:model.lazy="email" value="" placeholder="Type your email">
											  @error('email') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="phone">Phone number<span>*</span></label>
											<input  type="number" wire:model.lazy="mobile" value="" placeholder="10 digits format">
											  @error('mobile') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="line1">line1:</label>
											<input  type="text" wire:model.lazy="line1" value="" placeholder="Street at apartment number">
											  @error('line1') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="line2">line2:</label>
											<input  type="text" wire:model.lazy="line2" value="" placeholder="Street at apartment number">
											  @error('line2') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="country">Country<span>*</span></label>
											<input  type="text" wire:model.lazy="country" value="" placeholder="United States">
											  @error('country') <span class="error">{{ $message }}</span> @enderror
										</p>
									
										<p class="row-in-form">
											<label for="province">province<span>*</span></label>
											<input  type="text" wire:model.lazy="province" value="" placeholder="province name">
											  @error('province') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="city">Town / City<span>*</span></label>
											<input  type="text" wire:model.lazy="city" value="" placeholder="City name">
											  @error('city') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="zip-code">Postcode / ZIP:</label>
											<input  type="number" wire:model.lazy="zipcode" value="" placeholder="Your postal code">
											  @error('zipcode') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form fill-wife">
											<label class="checkbox-field">
												<input  value="1" type="checkbox" wire:model="is_shipping_different">
												<span>Ship to a different address?</span>
											</label>
										</p>
									</div>
							</div>
						</div>
						@if ($is_shipping_different)	
						<div class="col-md-12">				
							<div class="wrap-address-billing">
								<h3 class="box-title">Shipping  Address</h3>
									<div class="billing-address">
										<p class="row-in-form">
											<label for="fname">first name<span>*</span></label>
											<input  type="text" wire:model.lazy="_firstname"  value="" placeholder="Your name">
											 @error('_firstname') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="lname">last name<span>*</span></label>
											<input  type="text" wire:model.lazy="_lastname" value="" placeholder="Your last name">
											 @error('_lastname') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="email">Email Addreess:</label>
											<input  type="email" wire:model.lazy="_email" value="" placeholder="Type your email">
											 @error('_email') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="phone">Phone number<span>*</span></label>
											<input  type="number" wire:model.lazy="_mobile" value="" placeholder="10 digits format">
											 @error('_mobile') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="line1">line1:</label>
											<input  type="text" wire:model.lazy="_line1" value="" placeholder="Street at apartment number">
											 @error('_line1') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="line2">line2:</label>
											<input  type="text" wire:model.lazy="_line2" value="" placeholder="Street at apartment number">
											 @error('_line2') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="country">Country<span>*</span></label>
											<input  type="text" wire:model.lazy="_country" value="" placeholder="United States">
											 @error('_country') <span class="error">{{ $message }}</span> @enderror
										</p>
									
										<p class="row-in-form">
											<label for="province">province<span>*</span></label>
											<input  type="text" wire:model.lazy="_province" value="" placeholder="province name">
											 @error('_province') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="city">Town / City<span>*</span></label>
											<input  type="text" wire:model.lazy="_city" value="" placeholder="City name">
											 @error('_city') <span class="error">{{ $message }}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="zip-code">Postcode / ZIP:</label>
											<input  type="number" wire:model.lazy="_zipcode" value="" placeholder="Your postal code">
											 @error('_zipcode') <span class="error">{{ $message }}</span> @enderror
										</p>
									
									</div>
							</div>
						</div>
						@endif
					</div>
					<div class="summary summary-checkout">
						<div class="summary-item payment-method">
							<h4 class="title-box">Payment Method</h4>
							
							@if ($paymentmode=='card')	
								@if (Session::has('stripe_error'))
									<div class="alert alert-danger">
										<strong>{{__('error')}} </strong>{{Session::get('stripe_error')}}
									</div>
								@endif							
								<div class="wrap-address-billing">
									<p class="row-in-form">
										<label for="card_no">Card Number:-<span>*</span></label>
										<input  type="text" wire:model.lazy="card_no" value="" placeholder="Card Number">
										@error('card_no') <span class="error">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="exp_month">Expire Month:-<span>*</span></label>
										<input  type="text" wire:model.lazy="exp_month" value="" placeholder="MM">
										@error('exp_month') <span class="error">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="exp_year">Expire year:-<span>*</span></label>
										<input  type="text" wire:model.lazy="exp_year" value="" placeholder="YYYYY">
										@error('exp_year') <span class="error">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="cvc">CVC:-<span>*</span></label>
										<input  type="password" wire:model.lazy="cvc" value="" placeholder="cvc">
										@error('cvc') <span class="error">{{ $message }}</span> @enderror
									</p>
								</div>
							@endif
						
							<div class="choose-payment-methods">
								<label class="payment-method">
									<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
									<span>Cash On Delivery</span>
									<span class="payment-desc">Order Now Pay on Delivery</span>
								</label>
								<label class="payment-method">
									<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
									<span>Debit/Credit Card</span>
									<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
								</label>
								<label class="payment-method">
									<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
									<span>Paypal</span>
									<span class="payment-desc">You can pay with your credit</span>
									<span class="payment-desc">card if you don't have a paypal account</span>
								</label>
								@error('paymentmode') <span class="error">{{ $message }}</span> @enderror
							</div>
							@if (session()->has('checkout'))
								
							@endif
							 <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{number_format(session()->get('checkout')['total'],2)}}</span></p>
							<button type="submit" class="btn btn-medium">Place order now</button>
						</div>
						<div class="summary-item shipping-method">
							<h4 class="title-box f-title">Shipping method</h4>
							<p class="summary-info"><span class="title">Flat Rate</span></p>
							<p class="summary-info"><span class="title">Fixed $0</span></p>
						
						</div>
					</div>
				</form>
			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
</div>
