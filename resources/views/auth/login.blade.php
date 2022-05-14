
<x-base-layout>
    	<!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="row" style="margin-top: 10%">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
                                <x-jet-validation-errors class="mb-4" />
								<form name="frm-login"method="POST" action="{{ route('login') }}">
                                    @csrf

									<fieldset class="wrap-title">
										<h3 class="form-title">Log in to your account</h3>										
									</fieldset>
									<fieldset class="wrap-input">
										<label for="email">{{ __('Email') }}</label>
										<input type="email" id="email" name="email" placeholder="Type your email address" :value="old('email')" required autofocus >
									</fieldset>
									<fieldset class="wrap-input">
										<label for="password">{{ __('Password') }}</label>
										<input type="password" id="password" name="password" placeholder="************" required autocomplete="current-password" >
									</fieldset>
									
									<fieldset class="wrap-input">
										<label class="remember-field">
											<input class="frm-input " name="remember" id="rememberme" value="forever" type="checkbox"><span>{{ __('Remember me') }}</span>
										</label>
                                        @if (Route::has('password.request'))
										    <a class="link-function left-position" href="{{ route('password.request') }}" title="Forgotten password?"> {{ __('Forgot your password?') }}</a>
                                        @endif
                                    </fieldset>
									<input type="submit" class="btn btn-submit" value="{{ __('Log in') }}" name="submit">
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->
</x-base-layout>


