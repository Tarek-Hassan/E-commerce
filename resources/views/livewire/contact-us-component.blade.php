<div>
   	<!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Contact us</span></li>
				</ul>
			</div>
			<div class="row">
				<div class=" main-content-area">
					<div class="wrap-contacts ">
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-form">

								<h2 class="box-title">Leave a Message</h2>
								@if (Session::has('success_message'))
									<div class="alert alert-success">
										<strong>{{__('success')}} </strong>{{Session::get('success_message')}}
					
									</div>
								@endif
								<form action=" "  name="frm-contact" wire:submit.prevent="send">

									<label for="name">Name<span>*</span></label>
									<input type="text" value="" id="name" name="name" wire:model="name">
									@error('name') <span class="error">{{ $message }}</span> @enderror
									<br/>

									<label for="email">Email<span>*</span></label>
									<input type="text" value="" id="email" name="email" wire:model="email">
									@error('email') <span class="error">{{ $message }}</span> @enderror
									<br/>
									<label for="phone">Number Phone</label>
									<input type="text" value="" id="phone" name="phone" wire:model="phone">
									@error('phone') <span class="error">{{ $message }}</span> @enderror
									<br/>
									<label for="comment">Comment</label>
									<textarea name="comment" id="comment" wire:model="comment"></textarea>
									@error('comment') <span class="error">{{ $message }}</span> @enderror
									<br/>
									<input type="submit" name="ok" value="Submit" >
								</form>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-info">
								<div class="wrap-map">
									<iframe src="{{optional($setting)->map}}" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
								<h2 class="box-title">Contact Detail</h2>
								<div class="wrap-icon-box">

									<div class="icon-box-item">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<div class="right-info">
											<b>Email</b>
											<p>{{optional($setting)->email}}</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div class="right-info">
											<b>Phone</b>
											<p>{{optional($setting)->phone}} - {{optional($setting)->phone2}}</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<div class="right-info">
											<b>Address</b>
											<p>{{optional($setting)->address}}</p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->
</div>
