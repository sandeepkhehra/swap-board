<div class="popup" data-popup="login">
	<div class="popup-inner">
		<div class="dash-pop clearfix">
			<div class="pop-aprt">
				<div class="create-form sign-field ">
					<img
						src="<?php sboardCoreAssets('images', ['delta-logo.png']); ?>"
						class="delta-logo img-responsive"
						alt=""
					/>

					<div class="mp-form-errors">
						Username or Password is incorrect!
					</div>

					<form data-swap-form="login">

						<?php sboardDefineFormAction('ajax', 'authenticate', SwapBoard\Controllers\Auth\LoginController::class); ?>

						<div class="form-group">
							<label for="email">Email</label> <input name="email" type="text" id="email" required />
						</div>
						<div class="form-group">
							<label for="password">Password</label> <input name="password" type="password" id="password" required />
						</div>
						<div class="form-group sigm-rem">
							<button type="button" data-swap-button="finish" class="submit">Sign In</button>
						</div>
						<div class="trms">
							<input type="checkbox" name="term" value="term" id="term" />
							<label for="term">Remember Me</label>
						</div>
					</form>
					<a href="javascript:void(0)" class="forgot">Forget Password?</a>
					<div class="acc-pop">
						<a href="javascript:void(0)">Don't have an account?</a>
						<p><a href="javascript:void(0)" class="accont">Contact the administrator</a> of your company</p>
					</div>
				</div>
			</div>
			<div class="retun-step sign-in">
				<div class="form-fild">
					<h2>Sign In</h2>
					<div class="fild-recrd"><p>Join Delta Airlines</p></div>
				</div>
			</div>
		</div>

		<span class="popup-close" data-swap-button="popup-close">&times;</span>
	</div>
</div>
