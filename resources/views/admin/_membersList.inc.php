<div class="show-div hidden" id="member-list">
	<div class="member-list table-sec ">
		<h2>Members List</h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
				<table class="table-data-provider">
					<thead>
						<tr>
							<th scope="col"><a href="#" class="sort-by">First Name</a></th>
							<th scope="col"><a href="#" class="sort-by">Last Name</a></th>
							<th scope="col"><a href="#" class="sort-by">Invitation Date</a></th>
							<th scope="col"><a href="#" class="sort-by">Administrator</a></th>
							<th colspan="3">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php if ( ! empty( $membersData ) ) :
							foreach ( $membersData as $member ) : ?>
							<tr>
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
								<td>
									<form style="margin: 0">
										<?php sboardDefineFormAction('ajax', 'userDetails', SwapBoard\Controllers\UsersController::class); ?>
										<input type="hidden" name="id" value="<?php echo $member->id; ?>">
										<span class="sb-row-action sb-row-action--small" data-swap-button="user-details"><i class="fa fa-list"></i> Details</span>
									</form>
								</td>
								<td>
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
					<h3 data-inv-name></h3>
					<p><strong>Position:</strong> <span data-inv-pos></span></p>
					<p><strong>Email:</strong> <span data-inv-email></span></p>
				</div>
				<div class="right-img" data-inv-avatar><img src="#" alt="user" class="img-responsive" /></div>
				<p data-inv-desc></p>
				<div class="form-group">
					<input type="checkbox" name="term" value="term" id="term" />
					<label for="term"> Give Administrator Permissions</label>
				</div>
				<div class="flex flex-jc-sb padding--35t">
					<?php if ( ! $member->isMember ) : ?>
						<button class="sb-form-button sb-form-button--info"><i class="fa fa-paper-plane-o"></i> Resend Invitation</a>
					<?php endif; ?>
					<!-- <button class="sb-form-button sb-form-button--warning" class="yellow"><i class="fa fa fa-comments"></i> Send Message</a> -->
					<form style="margin: 0">
						<?php sboardDefineFormAction('ajax', 'delete', SwapBoard\Controllers\Admin\InviteMembersController::class); ?>
						<input type="hidden" name="id" value="<?php echo $member->id; ?>">
						<button class="sb-form-button sb-form-button--danger" data-swap-button="delete"><i class="fa fa-trash-o"></i> Delete user</a>
					</form>
				</div>
			</div>
			<span class="popup-close" data-swap-button="popup-close">&times;</span>
		</div>
	</div>
</div>

