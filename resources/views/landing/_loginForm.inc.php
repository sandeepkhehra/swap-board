<div class="popup" data-popup="login">
	<div class="popup-inner">
		<div class="dash-pop clearfix">
			<div class="pop-part">
				<div class="create-form sign-field ">
					<img
						src="<?php sboardCoreAssets('images', ['delta-logo.png']); ?>"
						class="delta-logo img-responsive"
						alt=""
					/>

					<form data-swap-form="login">

						<?php sboardDefineFormAction('ajax', 'authenticate', SwapBoard\Controllers\Auth\LoginController::class); ?>

						<div class="form-group">
							<label for="email" class="sb-form-label sb-form-label--gray">Email</label>
							<input name="user_login" type="email" id="email" class="sb-input-field" required>
						</div>
						<div class="form-group">
							<label for="password" class="sb-form-label sb-form-label--gray">Password</label>
							<input name="user_pass" type="password" id="password" class="sb-input-field" required>
						</div>
						<div class="form-group flex flex-ai-center flex-jc-sb">
							<button type="button" data-swap-button="login-user" class="sb-form-button sb-form-button--danger sb-form-button--big">Sign In</button>

							<div>
								<label for="term">Remember Me</label>
								<input type="checkbox" name="term" value="term" id="term" />
							</div>
						</div>
						</div>
					</form>
					<!-- <a href="javascript:void(0)" class="forgot">Forget Password?</a> -->
					<div class="acc-pop">
						<small class="form-text text-muted">Don't have an account?</small> <br>
						<small><a href="javascript:void(0)">Contact the administrator</a> of your company.</small>
					</div>
				</div>
			</div>
			<div class="return-step sign-in">
				<div class="form-fild">
					<h2 class="popup-heading popup-heading--white">Sign In</h2>
					<div class="fild-recrd"><p>Join Delta Airlines</p></div>
				</div>
			</div>
		</div>

		<span class="popup-close" data-swap-button="popup-close">&times;</span>
	</div>
</div>
