<?php
$details = unserialize($companyData->details);
$positions = unserialize($companyData->positions);
$locations = unserialize($companyData->locations);

?>
<div class="show-div" id="profile">
	<h2>Company Profile</h2>

	<form data-swap-form enctype="multipart/form-data">
		<?php sboardDefineFormAction('ajax', 'update', SwapBoard\Controllers\CompaniesController::class); ?>
		<input type="hidden" name="id" value="<?php echo $companyData->id ?>">
		<div class="company-detail">
			<div class="filed-company">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="form-label" for="companyName">Company Name</label>
							<input type="text" name="name" class="sb-input-field" id="companyName" value="<?php echo $companyData->name; ?>" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-label" for="companyEmail">Admin Email</label>
							<input type="text" name="details[email]" value="<?php echo isset( $details['email'] ) ? $details['email'] : ''; ?>" class="sb-input-field" id="companyEmail">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-label" for="companyPhone">Phone Number</label>
							<input type="tel" name="details[phone]" value="<?php echo isset( $details['phone'] ) ? $details['phone'] : ''; ?>" class="sb-input-field" id="companyPhone">
						</div>
					</div>
				</div>
			</div>
			<div class="company-logo">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<label>Company Logo</label>
					<div class="file-upload">
						<div class="file-select textfield pass">
							<div class="file-select-button" id="fileName"><i class="fa fa-camera"></i></div>
							<div class="file-select-name">
							<?php if ( isset( $details['logo'] ) ) : ?>
							<img src="<?php echo $details['logo']; ?>" alt="logo">
							<?php else: ?>
							No file chosen&hellip;
							<?php endif; ?>
							</div>
							<input type="file" name="details[logo]">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="padding--35t">
			<div class="row">
				<div class="col-md-6">
					<h6 class="heading-medium">Job Positions</h6>
					<div data-swap-row-wrap>
						<?php if ( ! empty( $positions ) ) :
							foreach ( $positions as $key => $position ) : ?>

							<div class="form-group" data-swap-row data-swap-row-count="<?php echo $key; ?>">
								<input type="text" name="positions[]" class="sb-input-field" value="<?php echo $position; ?>" placeholder="Licensed Engineers" />
								<span class="sb-delete-row" data-swap-delete-row><i class="fa fa-trash-o" aria-hidden="true"></i></span>
							</div>

							<?php
							endforeach;
						else: ?>
							<div class="form-group" data-swap-row data-swap-row-count="0">
								<input type="text" name="positions[]" class="sb-input-field" placeholder="Licensed Engineers" />
								<span class="sb-delete-row" data-swap-delete-row><i class="fa fa-trash-o" aria-hidden="true"></i></span>
							</div>
						<?php endif; ?>
					</div>

					<span class="sb-add-row" data-swap-add-row="positions"><i class="fa fa-plus"></i> Add more</span>
				</div>
				<div class="col-md-6">
					<h6 class="heading-medium">Locations</h6>
					<div data-swap-row-wrap>
						<?php if ( ! empty( $locations ) ) :
							foreach ( $locations as $key => $location ) : ?>

							<div class="form-group" data-swap-row data-swap-row-count="<?php echo $key; ?>">
								<input type="text" name="locations[]" class="sb-input-field" value="<?php echo $location; ?>" placeholder="Airport" />
								<span class="sb-delete-row" data-swap-delete-row><i class="fa fa-trash-o" aria-hidden="true"></i></span>
							</div>

							<?php
							endforeach;
						else: ?>
							<div class="form-group" data-swap-row data-swap-row-count="0">
								<input type="text" name="locations[]" class="sb-input-field" placeholder="Airport" />
								<span class="sb-delete-row" data-swap-delete-row><i class="fa fa-trash-o" aria-hidden="true"></i></span>
							</div>
						<?php endif; ?>
					</div>

					<span class="sb-add-row" data-swap-add-row="locations"><i class="fa fa-plus"></i> Add more</span>
				</div>
			</div>
		</div>

		<div class="padding--35t">
			<button type="button" data-swap-button="update" class="sb-form-button">Save</button>
			<button type="button" data-swap-button="cancel" class="sb-form-button sb-form-button--danger">Cancel</button>
		</div>
	</form>
</div>
