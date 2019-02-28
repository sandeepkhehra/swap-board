<?php
$positions = unserialize($companyData->positions);
$locations = unserialize($companyData->locations);
$offerController = SwapBoard\Controllers\Admin\OffersController::class;
$appliedOffersController = new SwapBoard\Controllers\Admin\AppliedOffersController;
?>

<div class="show-div hidden" id="my-offer">
	<div class="find-offer">
		<h2>My Offers</h2>

		<div class="member-list table-sec offer ">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
					<table class="table-data-provider">
						<thead>
							<tr>
								<th scope="col"><a href="#" class="sort-by">Date</a></th>
								<th scope="col"><a href="#" class="sort-by">Time</a></th>
								<th scope="col"><a href="#" class="sort-by">Type</a></th>
								<th scope="col" colspan="3">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php if ( ! empty( $offers ) ) :
								foreach ( $offers as $offer ) :
									$date = (new DateTime($offer->startDatetime))->format('M d, Y');
									$startTime = (new DateTime($offer->startDatetime))->format('g:i A');
									$endTime = (new DateTime($offer->endDatetime))->format('g:i A');
									$appliedOffers = $appliedOffersController->get( $offer->id );
									$alreadyApplied = $appliedOffersController->isOfferActive( $offer->id );
								?>
								<tr <?php echo $offer->status == 2 ? 'class="is-hidden"' : ''; ?>>
									<td <?php echo ! empty( $appliedOffers ) && count( $appliedOffers ) > 0 && ! $alreadyApplied && $offer->status == 0 ? 'data-swap-has-offer' : ''; ?>>
										<?php echo $date; ?>

										<?php if ( ! empty( $appliedOffers ) && count( $appliedOffers ) > 0 && ! $alreadyApplied ) :
											$offersCount = count( $appliedOffers );
											?>
										<div class="tooltip-text">
											<h3><?php printf( _n( '%s person', '%s people', $offersCount ), number_format_i18n( $offersCount ) ); ?> wants to work your shift!</h3>

											<?php foreach ( $appliedOffers as $appliedOffer ) : ?>
												<aside>Comment:</aside>
												<p><?php echo $appliedOffer->comment; ?></p>
												<div class="flex margin--35t margin--35b">
													<form style="margin: 0">
														<?php sboardDefineFormAction('ajax', 'acceptOffer', SwapBoard\Controllers\Admin\AppliedOffersController::class); ?>
														<input type="hidden" name="id" value="<?php echo $appliedOffer->id; ?>">
														<input type="hidden" name="offerID" value="<?php echo $appliedOffer->offerID; ?>">
														<input type="hidden" name="userID" value="<?php echo $appliedOffer->userID; ?>">
														<button class="sb-form-button sb-form-button--info" data-swap-button="accept-offer"><i class="fa fa fa-check"></i> Accept</button>
													</form>
													<form style="margin: 0">
														<?php sboardDefineFormAction('ajax', 'declineOffer', SwapBoard\Controllers\Admin\AppliedOffersController::class); ?>
														<input type="hidden" name="id" value="<?php echo $appliedOffer->id; ?>">
														<button class="sb-form-button sb-form-button--danger" data-swap-button="decline-offer"><i class="fa fa fa-times"></i> Decline</button>
													</form>
												</div>
											<?php endforeach; ?>

										</div>
										<?php endif; ?>

									</td>
									<td><?php echo $startTime; ?> &mdash; <?php echo $endTime; ?></td>
									<td><?php echo $offerController::SHIFT_TYPES[ $offer->type ]; ?></td>
									<td>
										<form style="margin: 0">
											<?php sboardDefineFormAction('ajax', 'edit', $offerController); ?>
											<input type="hidden" name="id" value="<?php echo $offer->id; ?>">
											<span class="sb-row-action sb-row-action--small" data-swap-button="edit-offer" data-swap-pop-type="edit-offer"><i class="fa fa-pencil"></i> Edit</span>
										</form>
									</td>
									<td>
										<form style="margin: 0">
											<?php sboardDefineFormAction('ajax', 'delete', $offerController); ?>
											<input type="hidden" name="id" value="<?php echo $offer->id; ?>">
											<span class="sb-row-action sb-row-action--small" data-swap-button="delete-offer"><i class="fa fa-trash-o"></i> Delete</span>
										</form>
									</td>
									<td>
										<form style="margin: 0">
											<?php sboardDefineFormAction('ajax', 'toggleOfferVisibility', $offerController); ?>
											<input type="hidden" name="id" value="<?php echo $offer->id; ?>">

											<?php if ( $offer->status == 2 ) : ?>
												<input type="hidden" name="status" value="0">
												<span class="sb-row-action sb-row-action--small" data-swap-button="offer-visibility"><i class="fa fa-eye"></i> Show<span>
											<?php else: ?>
												<input type="hidden" name="status" value="2">
												<span class="sb-row-action sb-row-action--small" data-swap-button="offer-visibility"><i class="fa fa-eye-slash"></i> Hide<span>
											<?php endif; ?>
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

					<?php if ( ! empty( $offers ) && count( $offers ) > 15 ) : ?>
					<div class="pagination">
						<a href="#" class="prev"><i class="fa fa-long-arrow-left"></i> Previous</a>
						<span>
							<a href="#">1</a> <a class="active" href="#">2</a> <a href="#">3</a> <a href="#">4</a>
							<a href="#">5</a> <a href="#">6</a>
						</span>
						<a href="#" class="next">Next<i class="fa fa-long-arrow-right"></i></a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="invitation" data-popup="edit-offer">
		<div class="popup-structure">
			<div class="john-whit clearfix">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 ">
						<form data-swap-form>
							<?php sboardDefineFormAction('ajax', 'update', $offerController); ?>
							<input type="hidden" name="id" value="">
							<div>
								<div class="margin--20b flex">
									<div class="flex flex-d-c margin--10r w100">
										<h6 class="heading-medium">Position</h6>
										<select class="sb-input-field" name="position">
											<?php foreach ( $positions as $position ) : ?>
											<option value="<?php echo sboardGetSlug( $position ); ?>"><?php echo $position; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="flex flex-d-c w100">
										<h6 class="heading-medium">Location</h6>
										<select class="sb-input-field" name="location">
											<?php foreach ( $locations as $location ) : ?>
											<option value="<?php echo sboardGetSlug( $location ); ?>"><?php echo $location; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="margin--20b">
									<h6 class="heading-medium">Description</h6>
									<textarea class="sb-input-field sb-input-field--textarea" name="description"></textarea>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="flex flex-jc-sb">

											<div class="margin--20r">
												<label class="sb-form-label sb-form-label--active" for="makeOfferDate_edit">Date</label>
												<input type="date" class="sb-input-field sb-input-field--datetime" name="date" id="makeOfferDate_edit" />
											</div>

											<div class="set-time margin--20r">
												<label class="sb-form-label sb-form-label--active">Time</label>
												<div class="flex flex-ai-center">
													<input type="time" class="sb-input-field sb-input-field--datetime" name="startTime">
													<span class="padding--5l padding--5r">&mdash;</span>
													<input type="time" class="sb-input-field sb-input-field--datetime" name="endTime">
												</div>
											</div>
										</div>

										<div class="margin--20t">
											<div class="offer-type">
												<label class="sb-form-label sb-form-label--active">Offer Type</label>
												<ul>
													<?php foreach ( $offerController::SHIFT_TYPES as $id => $type ) : ?>
														<li>
															<input id="<?php echo sboardGetSlug( $type ); ?>-edit" name="type" type="radio" value="<?php echo $id; ?>">
															<label for="<?php echo sboardGetSlug( $type ); ?>-edit" class="radio-label"><?php echo $type; ?></label>
														</li>
													<?php endforeach; ?>
												</ul>
											</div>
										</div>

										<button type="button" class="sb-form-button margin--35t sb-form-button--danger" data-swap-button="update-offer">Update Offer</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<span class="popup-close" data-swap-button="popup-close">&times;</span>
		</div>
	</div>
</div>

