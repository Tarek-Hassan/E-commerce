<x-base-layout>
    <main id="main" class="main-site left-sidebar">

		<div class="container">
			<div class="row" style="margin-top: 10%">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
					<div class=" main-content-area">
						<div class="wrap-login-item ">
							<div class="register-form form-item ">
                                <x-jet-validation-errors class="mb-4" />
								<form class="form-stl" action="{{ route('password.update') }}" name="frm-login" method="POST" >
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

									<fieldset class="wrap-input">
										<label for="frm-reg-email">{{ __('Email') }}*</label>
										<input type="email" id="frm-reg-email" name="email" placeholder="{{ __('Email') }}" value="{{old('email', $request->email)}}" required>
									</fieldset>

									<fieldset class="wrap-title">
										<h3 class="form-title">Login Information</h3>
									</fieldset>
									<fieldset class="wrap-input item-width-in-half left-item ">
										<label for="frm-reg-pass">{{ __('Password') }} *</label>
										<input type="password" id="frm-reg-pass" name="password" placeholder="Password" required autocomplete="new-password" >
									</fieldset>
									<fieldset class="wrap-input item-width-in-half ">
										<label for="frm-reg-cfpass">{{ __('Confirm Password') }} *</label>
										<input type="password" id="frm-reg-cfpass" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" >
									</fieldset>
                                   
                                   
								<input type="submit" class="btn btn-sign mx-5" value="{{ __('Reset Password') }}" name="register">
								</form>
							</div>											
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
</x-base-layout>