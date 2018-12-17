<div class="popup" data-popup="popup">
	<div class="popup-inner">
		<div class="dash-pop clearfix" data-swap-step-id="1">
			<div class="pop-aprt">
				<p>Create a Company</p>
				<h2>Step #1</h2>
				<div class="create-form">
					<form data-swap-form="company">

						<?php sboardDefineFormAction('ajax', 'check', SwapBoard\Controllers\CompaniesController::class); ?>

						<div class="form-group">
							<label for="companyName">Company Name</label> <input type="text" name="name" id="companyName" required />
						</div>
						<div class="form-group swap-addre">
							<label for="companyUrl">Swapboard Address</label> <input type="url" name="url" id="companyUrl" required />
							<span>swapboard.com</span>
						</div>
						<div class="form-group">
							<label for="email">Administrator Email</label>
							<input type="email" name="details[email]" id="adminEmail" required />
						</div>
						<div class="form-group">
							<label for="tel">Phone Number</label> <input type="tel" name="details[phone]" id="tel" required />
						</div>
						<div class="form-group"><button type="button" class="submit" data-swap-button="next" data-swap-step="2">Next</button></div>
					</form>
				</div>
			</div>
		</div>

		<div class="dash-pop is-hidden clearfix" data-swap-step-id="2">
			<div class="pop-aprt">
				<p>Create a Company</p>
				<h2>Step #2</h2>
				<div class="retun-step">
					<div class="form-fild">
						<p>Create a company</p>
						<h2>Step #1</h2>
						<div class="fild-recrd">
							<aside>
								<h6>Company Name:</h6>
								<span data-form-field="companyName">Delta Airlines</span>
							</aside>
							<aside>
								<h6>Swapboard Address:</h6>
								<span data-form-field="companyUrl">delta</span>
							</aside>
							<aside>
								<h6>Administrator Email:</h6>
								<span data-form-field="companyEmail">deltamaster@gmil.com</span>
							</aside>
							<aside>
								<h6>Phone Number:</h6>
								<span data-form-field="companyPhone">(123) 555-6666</span>
							</aside>
							<aside class="form-group">
								<button type="button" data-swap-button="back" class="submit" data-swap-step="1">Return to Step 1</button>
							</aside>
						</div>
					</div>
				</div>

				<div class="create-form">
					<form data-swap-form="user">

						<?php sboardDefineFormAction('ajax', 'check', SwapBoard\Controllers\UsersController::class); ?>

						<div class="form-group">
							<label for="name">Your First Name</label> <input type="text" name="firstName" required />
						</div>
						<div class="form-group">
							<label for="email">Your Last Name</label> <input type="text" name="lastName" required />
						</div>
						<div class="form-group">
							<label for="email">Email</label> <input type="text" name="email" required />
						</div>
						<div class="form-group">
							<label for="telphone">Phone Number</label> <input type="tel" name="phone" required />
						</div>
						<div class="form-group">
							<label for="password">Password</label> <input type="password" name="password" required />
						</div>
						<div class="form-group trms">
							<input type="checkbox" name="term" value="term" id="term" />
							<label for="term"> I agree with the <a href="#">Term of use</a></label>
						</div>
						<div class="form-group">
							<button type="button" class="submit" data-swap-button="next" data-swap-step="3">Finish</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="dash-pop is-hidden clearfix" data-swap-step-id="3">
			<div class="pop-aprt">
				<div class="create-form joingroup">
					<form data-swap-form="userMeta">

					<?php sboardDefineFormAction('ajax', 'check', SwapBoard\Controllers\UserMetaController::class); ?>

						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="name">First Name</label> <input type="text" id="First-name" required />
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="Last-name">Last Name</label>
									<input type="text" id="last-name" required />
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="email">Email</label> <input type="text" id="email" required />
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="telphone">Phone Number</label>
									<input type="tel" id="telphone" required />
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label for="Position">Position</label>
									<select>
										<option>Here is the unstyled select box</option>
										<option>The second option</option>
										<option>The third option</option>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label for="message">Short job Description</label>
									<textarea name="comments" id="message"></textarea>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="Position">Location</label>
									<select>
										<option>Here is the unstyled select box</option>
										<option>The second option</option>
										<option>The third option</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="Identification">Employee Identification Number</label>
									<input type="text" id="Identification" required />
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" id="password" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="button" data-swap-button="finish" class="submit">Join</button>
						</div>
					</form>
				</div>
			</div>
			<div class="retun-step">
				<div class="form-fild third">
					<h2>Hi,</h2>
					<h4>Spencer White!</h4>
					<div class="fild-recrd spence-cont"><p>Join Delta Airlines</p></div>
				</div>
			</div>
		</div>
		<span class="popup-close" data-swap-button="popup-close">&times;</span>
	</div>
</div>
