<div class="show-div hidden" id="invite-people">
	<div class="invite-peop">
		<h2>Invite People</h2>
		<p>
			Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur
			sea ne, ei his eros dicit altera. Viris decore cu eum, mea id modus petentium voluptatum. Amet abhorreant
			mei ad, eum
		</p>
		<div class="row">
			<form data-swap-form>
				<?php sboardDefineFormAction('ajax', 'create', SwapBoard\Controllers\Admin\InviteMembersController::class); ?>
				<input type="hidden" name="companyID" value="<?php echo $companyData->id; ?>">

				<div class="col-md-12 col-sm-12 col-xs-12 ">
					<div class="invition-form">
						<div class="col-md-4">
							<div class="form-group">
								<label for="memEmail">Email</label>
								<input class="sb-input-field" name="email[]" type="email" id="memEmail" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="memFirstName">First Name (optional)</label>
								<input class="sb-input-field" name="firstName[]" type="text" id="memFirstName">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="memLastName">Last Name (optional)</label>
								<input class="sb-input-field" name="lastName[]" type="text" id="memLastName">
							</div>
						</div>
						<!-- <span class="sb-row-action"><i class="fa fa-plus"></i> Add more</span> -->
					</div>
				</div>
				<div class="col-md-12">
					<div class="margin--35t">
						<button type="button" class="sb-form-button sb-form-button--danger" data-swap-button="invite-members">Send Invitations</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
