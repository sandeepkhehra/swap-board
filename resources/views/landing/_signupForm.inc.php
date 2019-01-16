<div class="popup" data-popup="register">
	<div class="popup-inner">
		<?php if ( ! isset( $_GET['invite'] ) || ! $context->template->validateInvite( $_GET['invite'] ) ) : ?>
			<div class="dash-pop clearfix" data-swap-step-id="1">
				<div class="pop-part">
					<p>Create a Company</p>
					<h2 class="popup-heading">Step #1</h2>

					<div class="form-error-bag">
						<ul class="form-error-bag__list-wrap"></ul>
					</div>

					<div class="create-form">
						<form data-swap-form="company">

							<?php sboardDefineFormAction('ajax', 'check', SwapBoard\Controllers\CompaniesController::class); ?>

							<div class="form-group">
								<label for="companyName" class="sb-form-label sb-form-label--gray">Company Name</label> <input type="text" name="name" id="companyName" class="sb-input-field" required>
							</div>
							<div class="form-group swap-addre">
								<label class="sb-form-label sb-form-label--gray" for="companyUrl">SwapBoard Address</label>
								<div class="flex flex-jc-sb flex-ai-center">
									<input type="text" name="url" id="companyUrl" class="sb-input-field" required>
									<span>.swapboard.com</span>
								</div>
							</div>
							<div class="form-group">
								<label class="sb-form-label sb-form-label--gray" for="companyEmail">Administrator Email</label>
								<input type="email" name="details[email]" id="companyEmail" class="sb-input-field" required>
							</div>
							<div class="form-group">
								<label class="sb-form-label sb-form-label--gray" for="companyPhone">Phone Number</label> <input type="tel"  pattern="[0-9]{10}" name="details[phone]" id="companyPhone" class="sb-input-field" required>
							</div>
							<div class="form-group"><button type="button" class="sb-form-button sb-form-button--danger sb-form-button--big" data-swap-button="check-company" data-swap-step="2">Next</button></div>
						</form>
					</div>
				</div>
			</div>

			<div class="dash-pop hidden clearfix" data-swap-step-id="2">
				<div class="pop-part">
					<p>Create a Company</p>
					<h2 class="popup-heading">Step #2</h2>
					<div class="return-step">
						<p>Create a company</p>
						<h2 class="popup-heading popup-heading--white">Step #1</h2>
						<div class="fild-recrd">
							<aside>
								<h6>Company Name:</h6>
								<span data-form-field="companyName"></span>
							</aside>
							<aside>
								<h6>SwapBoard Address:</h6>
								<span data-form-field="companyUrl"></span><span>.swapboard.com</span>
							</aside>
							<aside>
								<h6>Administrator Email:</h6>
								<span data-form-field="companyEmail"></span>
							</aside>
							<aside>
								<h6>Phone Number:</h6>
								<span data-form-field="companyPhone"></span>
							</aside>
							<aside class="form-group">
								<button type="button" data-swap-button="step-back" class="sb-form-button sb-form-button--secondary sb-form-button--big" data-swap-step="1">Return to Step 1</button>
							</aside>
						</div>
					</div>

					<div class="create-form">
						<form data-swap-form="user">

							<?php sboardDefineFormAction('ajax', 'check', SwapBoard\Controllers\UsersController::class); ?>

							<div class="form-group">
								<label class="sb-form-label sb-form-label--gray" for="name">Your First Name</label> <input type="text" name="first_name" class="sb-input-field" required>
								</div>
							<div class="form-group">
								<label class="sb-form-label sb-form-label--gray" for="email">Your Last Name</label> <input type="text" name="last_name" class="sb-input-field" required>
							</div>
							<div class="form-group">
								<label class="sb-form-label sb-form-label--gray" for="email">Email</label> <input type="text" name="user_login" class="sb-input-field" required>
							</div>
							<div class="form-group">
								<label class="sb-form-label sb-form-label--gray" for="telephone">Phone Number</label> <input type="tel" name="phone" class="sb-input-field" required>
							</div>
							<div class="form-group">
								<label class="sb-form-label sb-form-label--gray" for="password">Password</label> <input type="password" name="user_pass" class="sb-input-field" required>
							</div>
							<div class="form-group">
								<input type="checkbox" name="term" value="term" id="term" />
								<label class="sb-form-label sb-form-label--gray" for="term"> I agree with the <a href="#">Term of use</a></label>
							</div>
							<div class="form-group">
								<button type="button" class="sb-form-button sb-form-button--danger sb-form-button--big" data-swap-button="create-swap-user">Finish</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( isset( $_GET['invite'] ) && $user = $context->template->validateInvite( $_GET['invite'] ) ) :
			$firstName = ! empty( $user->firstName ) ? $user->firstName : '';
			$lastName = ! empty( $user->lastName ) ? $user->lastName : '';
			$userName = empty( $firstName ) && empty( $lastName ) ? 'User' : $firstName .' '. $lastName;
			$companyData = $context->template->model->withOne('sboard_companies', 'userID', $user->companyID);
			$positions = unserialize( $companyData->positions );
			$locations = unserialize( $companyData->locations );
			?>
			<div class="dash-pop clearfix" data-swap-step-id="3">
				<div class="pop-part">
					<div class="create-form joingroup">
						<form>

							<?php sboardDefineFormAction('ajax', 'createInvitedUser', SwapBoard\Controllers\UsersController::class); ?>
							<input type="hidden" value="<?php echo $_GET['invite'] ;?>" name="hash">

							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label for="invFName">First Name</label>
										<input type="text" name="firstName" value="<?php echo $firstName; ?>" id="invFName" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label for="invLName">Last Name</label>
										<input type="text" name="lastName" value="<?php echo $lastName; ?>" id="invLName" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label for="invEmail">Email</label>
										<input type="email" name="invEmail" value="<?php echo $user->email; ?>" readonly>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label for="invTel">Phone Number</label>
										<input type="tel" name="invTel" id="invTel">
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="form-group">
										<label for="invPosition">Position</label>
										<select name="invPosition" id="invPosition">
											<option value="">Select a Position</option>
											<?php foreach ( $positions as $position ) : ?>
												<option value="<?php echo sboardGetSlug( $position ); ?>"><?php echo $position; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="form-group">
										<label for="invDescription">Short Job Description</label>
										<textarea name="invDescription" id="invDescription"></textarea>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label for="invLocations">Location</label>
										<select name="invLocations" id="invLocations">
											<option value="">Select a Location</option>
											<?php foreach ( $locations as $location ) : ?>
												<option value="<?php echo sboardGetSlug( $location ); ?>"><?php echo $location; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label for="invEID">Employee Identification Number</label>
										<input type="text" name="invEID" id="invEID" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label for="invPassword">Password</label>
										<input type="password" name="invPassword" id="invPassword" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="button" data-swap-button="create-invited" class="submit">Join</button>
							</div>
						</form>
					</div>
				</div>
				<div class="return-step">
					<div class="form-fild third">
						<h2>Hi,</h2>
						<h4><?php echo $userName; ?>!</h4>
						<div class="fild-recrd spence-cont"><p>Join <?php echo $companyData->name; ?></p></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<span class="popup-close" data-swap-button="popup-close">&times;</span>
	</div>
</div>
