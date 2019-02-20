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
					<table class="table-data-provider" id="table-id">
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
								<tr>
									<td class="<?php echo $offer->status == 1 ? 'accept' : 'expired'; ?>">
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
									<td><span class="sb-row-action sb-row-action--small" data-swap-button=""><i class="fa fa-pencil"></i> Edit</span></td>
									<td>
										<form style="margin: 0">
											<?php sboardDefineFormAction('ajax', 'delete', $offerController); ?>
											<input type="hidden" name="id" value="<?php echo $offer->id; ?>">
											<span class="sb-row-action sb-row-action--small" data-swap-button="delete-offer"><i class="fa fa-trash-o"></i> Delete</span>
										</form>
									</td>
									<td><span class="sb-row-action sb-row-action--small" data-swap-button=""><i class="fa fa-eye-slash"></i> Hide</td>
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
</div>
