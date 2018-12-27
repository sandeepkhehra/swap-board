<div class="show-div hidden" id="member-list">
	<div class="member-list table-sec ">
		<h2>Member List</h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
				<table class="table-data-provider">
					<thead>
						<tr>
							<th scope="col"><a href="#" class="sort-by">First Name</a></th>
							<th scope="col"><a href="#" class="sort-by">Last Name</a></th>
							<th scope="col"><a href="#" class="sort-by">Invitation Date</a></th>
							<th scope="col"><a href="#" class="sort-by">Administrator</a></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php if ( ! empty( $membersData ) ) :
							foreach ( $membersData as $member ) : ?>
							<tr data-swap-button="popup-open" data-swap-pop-type="invitation">
								<td><?php echo $member->firstName; ?></td>
								<td><?php echo $member->lastName; ?></td>
								<td><?php echo $member->createdAt; ?></td>
								<td>
									<form style="margin: 0">
										<?php sboardDefineFormAction('ajax', 'resendInvite', SwapBoard\Controllers\Admin\InviteMembersController::class); ?>
										<input type="hidden" name="id" value="<?php echo $member->id; ?>">
										<input type="checkbox" data-swap-button="member-admin" name="check" <?php echo $member->isAdmin ? 'checked' : ''; ?>>
									</form>
								</td>
								<td class="inviton">
									<?php if ( ! $member->isMember ) : ?>
									<form style="margin: 0">
										<?php sboardDefineFormAction('ajax', 'resendInvite', SwapBoard\Controllers\Admin\InviteMembersController::class); ?>
										<input type="hidden" name="id" value="<?php echo $member->id; ?>">
										<span class="sb-row-action sb-row-action--small" data-swap-button="resend-invite"><i class="fa fa-paper-plane-o"></i> Resend Invitation</span>
									</form>
									<?php endif; ?>
								</td>
								<td>
									<form style="margin: 0">
										<?php sboardDefineFormAction('ajax', 'delete', SwapBoard\Controllers\Admin\InviteMembersController::class); ?>
										<input type="hidden" name="id" value="<?php echo $member->id; ?>">
										<span class="sb-row-action sb-row-action--small" data-swap-button="delete"><i class="fa fa-trash-o"></i> Delete</span>
									</form>
								</td>
							</tr>
							<?php
							endforeach;
						else: ?>
						<tr>
							<td colspan="6">Nothing found!</td>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="invitation" data-popup="invitation">
		<div class="popup-structure">
			<div class="john-whit clearfix">
				<div class="left-cont">
					<h3>John White</h3>
					<p><strong>Position:</strong> Airport Customer Service Agent</p>
					<p><strong>Email:</strong> jownwhite@gmail.com</p>
				</div>
				<div class="right-img"><img src="image/john-white.png" alt="" class="img-responsive" /></div>
				<p>
					As a Customer Service Agent, you will be an important part of our customers' travel experience. You 'll
					assist customer with check-in, boarding/de-boarding our bus to/from Houston, and addressing questions
					related to checked baggages. In this role, it's vital to create a welcoming environment for our
					customers.
				</p>
				<div class="form-group trms">
					<input type="checkbox" name="term" value="term" id="term" />
					<label for="term"> Give Administrator Permissions</label>
				</div>
				<div class="verificatio">
					<div class="save-profl">
						<a href="#"><i class="fa fa-paper-plane-o"></i>Resend Invitation</a>
					</div>
					<div class="save-profl">
						<a href="#" class="yellow"><i class="fa fa fa-comments"></i>Send Message</a>
					</div>
					<div class="save-profl">
						<a href="#" class="canl-btn"><i class="fa fa-trash-o"></i>Delete user</a>
					</div>
				</div>
			</div>
			<span class="popup-close" data-swap-button="popup-close">&times;</span>
		</div>
	</div>
</div>

