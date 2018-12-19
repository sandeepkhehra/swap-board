<?php
global $user_ID;

$companyData = $context->template->model->withOne('sboard_companies', 'userID', $user_ID)->sboard_companies;
?>
<div class="profile-detail dashboard-tabwrp " id="profile">
	<div class="company-profile ">
		<h2>Company Profile</h2>
		<div class="company-detail">
			<div class="filed-company">
				<div class="row">
					<form name="htmlform" method="post" action="toyousender.php">
						<div class="col-md-12">
							<div class="form-group">
								<label for="name">Company Name</label>
								<input type="text" class="sb-input-field" id="name" value="<?php echo $companyData->name; ?>" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Admin Email</label>
								<input type="text" class="sb-input-field" id="email" required="" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="telphone">Phone Number</label>
								<input type="tel" class="sb-input-field" id="telphone" required="" />
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="company-logo">
				<form>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<label>Company Logo</label>
						<div class="file-upload">
							<div class="file-select textfield pass">
								<div class="file-select-button" id="fileName"><i class="fa fa-camera"></i></div>
								<div class="file-select-name" id="noFile">No file chosen...</div>
								<input type="file" name="chooseFile" id="chooseFile" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="job-decrpt">
		<div class="row">
			<div class="col-md-6">
				<div class="job-postn">
					<h6>Job Positions</h6>
					<div class="select-job">
						<div class="selt-pots" data-swap-row-wrap>
							<div class="form-group" data-swap-row>
								<input type="text" name="positions[]" class="sb-input-field" placeholder="Licensed Engineers" />
								<span class="sb-delete-row"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
							</div>
						</div>
						<span class="sb-add-more" data-swap-add-row><i class="fa fa-plus"></i> Add more</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="job-postn">
					<h6>Locations</h6>
					<div class="select-job">
						<div class="selt-pots">
							<div class="form-group">
								<input type="text" name="locations[]" class="sb-input-field" placeholder="Boston-Logan international Airport">
								<span class="sb-delete-row"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
							</div>
						</div>

						<span class="sb-add-more" data-swap-add-row><i class="fa fa-plus"></i> Add more</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="save-profl"><a href="#" class="sav-btn">Save</a> <a href="#" class="canl-btn">Cancel</a></div>
</div>
