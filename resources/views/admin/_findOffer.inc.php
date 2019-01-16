<?php
$offerController = SwapBoard\Controllers\OffersController::class;
?>

<div class="show-div hidden" id="find-offer">
	<div class="find-offer">
		<h2>Find Offer</h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<div class="invitation-form offer">
					<form data-swap-form>
						<?php sboardDefineFormAction('ajax', 'findOffers', $offerController); ?>
						<input type="hidden" name="userID" value="<?php echo $user_ID; ?>">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="Position">Position</label>
									<select class="sb-input-field" name="position">
									<?php foreach ( $positions as $position ) : ?>
										<option value="<?php echo sboardGetSlug( $position ); ?>"><?php echo $position; ?></option>
									<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Location">Location</label>
									<select class="sb-input-field" name="location">
									<?php foreach ( $locations as $location ) : ?>
										<option value="<?php echo sboardGetSlug( $location ); ?>"><?php echo $location; ?></option>
									<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="flex flex-jc-sb">

									<div class="margin--20r">
										<label class="sb-form-label sb-form-label--active" for="offerDate">Date</label>
										<input type="date" class="sb-input-field sb-input-field--datetime" name="date" id="offerDate" />
									</div>

									<div class="margin--20r">
										<label class="sb-form-label">Day of week</label>
										<div class="weekDays-selector">
										<?php $timestamp = strtotime('last Sunday');
											for ( $i = 0; $i < 7; $i++ ) :
												$timestamp = strtotime('+1 day', $timestamp); ?>
												<input type="radio" name="date" id="findOffer-<?php echo substr( strftime('%A', $timestamp), 0, 3 ); ?>" value="<?php echo date( 'Y-m-d', $timestamp ); ?>" class="weekday" />
												<label for="findOffer-<?php echo substr( strftime('%A', $timestamp), 0, 3 ); ?>" title="<?php echo date( 'Y-m-d', $timestamp ); ?>"><?php echo substr( strftime('%A', $timestamp), 0, 1 ); ?></label>
											<?php endfor; ?>
										</div>
									</div>

									<div class="set-time margin--20r">
										<label class="sb-form-label sb-form-label--active">Time</label>
										<div class="flex flex-ai-center">
											<input type="time" class="sb-input-field sb-input-field--datetime" name="startTime">
											<span class="padding--5l padding--5r">&mdash;</span>
											<input type="time" class="sb-input-field sb-input-field--datetime" name="endTime">
										</div>
									</div>

									<div class="offer-type margin--20r">
										<label class="sb-form-label sb-form-label--active">Offer Type</label>
										<ul>
											<?php foreach ( $offerController::SHIFT_TYPES as $id => $type ) : ?>
												<li>
													<input id="<?php echo sboardGetSlug( $type ); ?>_find" name="type" type="radio" value="<?php echo $id; ?>">
													<label for="<?php echo sboardGetSlug( $type ); ?>_find" class="radio-label"><?php echo $type; ?></label>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>

								<button type="button" class="sb-form-button margin--35t sb-form-button--danger" data-swap-button="find-offers">Find Offer</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="member-list table-sec">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
					<table id="findOfferTable" class="table-data-provider table-responsive table-striped">
						<thead>
							<tr>
								<th scope="col"><a href="#" class="sort-by">Position</a></th>
								<th scope="col"><a href="#" class="sort-by">Location</a></th>
								<th scope="col"><a href="#" class="sort-by">Date</a></th>
								<th scope="col"><a href="#" class="sort-by">Time</a></th>
								<th scope="col"><a href="#" class="sort-by">Type</a></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="5">Search to get results!</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
