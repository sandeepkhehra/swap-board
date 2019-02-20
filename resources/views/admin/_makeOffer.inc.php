<?php
$positions = unserialize($companyData->positions);
$locations = unserialize($companyData->locations);
$offerController = SwapBoard\Controllers\Admin\OffersController::class;
?>

<div class="show-div hidden" id="make-offer">
	<div class="find-offer">
		<h2>Make Offer</h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<form data-swap-form>
					<?php sboardDefineFormAction('ajax', 'create', $offerController); ?>
					<input type="hidden" name="userID" value="<?php echo $user_ID ?>">
					<div class="invitation-form offer">
						<div class="padding--35b flex">
							<div class="flex flex-d-c margin--10r w100">
								<h6 class="heading-medium">Position</h6>
								<?php if ( ! empty( $positions ) ) : ?>
								<select class="sb-input-field" name="position">
									<?php foreach ( $positions as $position ) : ?>
									<option value="<?php echo sboardGetSlug( $position ); ?>"><?php echo $position; ?></option>
									<?php endforeach; ?>
								</select>
								<?php else: ?>
								<p>No position exist.</p>
								<?php endif; ?>
							</div>
							<div class="flex flex-d-c w100">
								<h6 class="heading-medium">Location</h6>
								<?php if ( ! empty( $locations ) ) : ?>
								<select class="sb-input-field" name="location">
									<?php foreach ( $locations as $location ) : ?>
									<option value="<?php echo sboardGetSlug( $location ); ?>"><?php echo $location; ?></option>
									<?php endforeach; ?>
								</select>
								<?php else: ?>
								<p>No location exist.</p>
								<?php endif; ?>
							</div>
						</div>
						<div class="padding--35b">
							<h6 class="heading-medium">Description</h6>
							<textarea class="sb-input-field sb-input-field--textarea" name="description" id="">As a Customer Service Agent, you will be an important part of our customers' travel experience. You 'll assist customer with check-in, boarding/de-boarding our bus to/from Houston, and addressing questions related to checked baggages. In this role, it's vital to create a welcoming environment for our customers.</textarea>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="flex flex-jc-sb">

									<div class="margin--20r">
										<label class="sb-form-label sb-form-label--active" for="makeOfferDate">Date</label>
										<input type="date" class="sb-input-field sb-input-field--datetime" name="date" id="makeOfferDate" />
									</div>

									<div class="margin--20r">
										<label class="sb-form-label">Day of week</label>
										<div class="weekDays-selector">
										<?php $timestamp = strtotime('last Sunday');
											for ( $i = 0; $i < 7; $i++ ) :
												$timestamp = strtotime('+1 day', $timestamp); ?>
												<input type="radio" name="date" id="weekday-<?php echo substr( strftime('%A', $timestamp), 0, 3 ); ?>" value="<?php echo date( 'Y-m-d', $timestamp ); ?>" class="weekday" />
												<label for="weekday-<?php echo substr( strftime('%A', $timestamp), 0, 3 ); ?>" title="<?php echo date( 'Y-m-d', $timestamp ); ?>"><?php echo substr( strftime('%A', $timestamp), 0, 1 ); ?></label>
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
													<input id="<?php echo sboardGetSlug( $type ); ?>" name="type" type="radio" value="<?php echo $id; ?>">
													<label for="<?php echo sboardGetSlug( $type ); ?>" class="radio-label"><?php echo $type; ?></label>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>

								<button type="button" class="sb-form-button margin--35t sb-form-button--danger" data-swap-button="create-offer">Add Offer</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="activt-sebsert">To activate offers you need to<a href="#"> buy the subscription</a></div>
	</div>
</div>
