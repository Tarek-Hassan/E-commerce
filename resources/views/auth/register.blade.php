<x-guest-layout>
    <main id="main" class="main-site left-sidebar">

		<div class="container">
			<div class="row" style="margin-top: 10%">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
					<div class=" main-content-area">
						<div class="wrap-login-item ">
							<div class="register-form form-item ">
                                <x-jet-validation-errors class="mb-4" />
								<form class="form-stl" action="{{ route('register') }}" name="frm-login" method="POST" >
                                    @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Create an account</h3>
										<h4 class="form-subtitle">Personal infomation</h4>
									</fieldset>									
									<fieldset class="wrap-input">
										<label for="frm-reg-lname">{{ __('Name') }}*</label>
										<input type="text" id="frm-reg-lname" name="name" placeholder="{{ __('Name') }}*"  :value="old('name')" required autofocus autocomplete="name" >
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-reg-email">{{ __('Email') }}*</label>
										<input type="email" id="frm-reg-email" name="email" placeholder="{{ __('Email') }}" :value="old('email')" required>
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
                                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <fieldset class="wrap-functions ">
                                        <label class="remember-field">
                                            <input name="terms" id="new-letter"  type="checkbox">
                                            <span>
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',]) !!}
                                            </span>
                                        </label>
                                    </fieldset>
                                    @endif
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
								<input type="submit" class="btn btn-sign mx-5" value=" {{ __('Register') }}" name="register">
								</form>
							</div>											
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
</x-guest-layout>