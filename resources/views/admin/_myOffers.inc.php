<?php
$positions = unserialize($companyData->positions);
$locations = unserialize($companyData->locations);
$offerController = SwapBoard\Controllers\OffersController::class;
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
								?>
								<tr>
									<td class="<?php echo $offer->status == 1 ? 'accept' : 'expired'; ?>">
										<?php echo $date; ?>
										<!-- <div class="tooltiptext">
											<h5>1 person wants to work your shift!</h5>
											<aside>Comment:</aside>
											<p>
												Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo
												debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris
												decore cu eum, mea id modus petentium voluptatum. Amet abhorreant mei ad,
												eum
											</p>
											<div class="verificatio">
												<div class="save-profl"><a href="#">Accept and hide</a></div>
												<div class="save-profl">
													<a href="#" class="yellow">Accept and Keep active</a>
												</div>
												<div class="save-profl"><a href="#" class="canl-btn">Decline</a></div>
											</div>
										</div> -->
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
