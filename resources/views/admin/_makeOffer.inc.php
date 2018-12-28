<?php
$positions = unserialize($companyData->positions);
$locations = unserialize($companyData->locations);
?>
<div class="show-div hidden" id="make-offer">
	<div class="find-offer">
		<h2>Make Offer</h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<form data-swap-form>
					<?php sboardDefineFormAction('ajax', 'create', SwapBoard\Controllers\OffersController::class); ?>
					<input type="hidden" name="companyID" value="<?php echo $companyData->id ?>">
					<div class="invition-form offer">
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
										<label class="sb-form-label sb-form-label--active" for="offerDate">Date</label>
										<input type="date" class="sb-input-field sb-input-field--datetime" name="datetime[date]" id="offerDate" />
									</div>

									<div class="margin--20r">
										<label class="sb-form-label">Day of week</label>
										<div class="weekDays-selector">
											<input type="checkbox" id="weekday-mon" value="mon" name="offerDay[]" class="weekday" />
											<label for="weekday-mon">M</label>
											<input type="checkbox" id="weekday-tue" value="tue" name="offerDay[]" class="weekday" />
											<label for="weekday-tue">T</label>
											<input type="checkbox" id="weekday-wed" value="wed" name="offerDay[]" class="weekday" />
											<label for="weekday-wed">W</label>
											<input type="checkbox" id="weekday-thu" value="thu" name="offerDay[]" class="weekday" />
											<label for="weekday-thu">T</label>
											<input type="checkbox" id="weekday-fri" value="fri" name="offerDay[]" class="weekday" />
											<label for="weekday-fri">F</label>
											<input type="checkbox" id="weekday-sat" value="sat" name="offerDay[]" class="weekday" />
											<label for="weekday-sat">S</label>
											<input type="checkbox" id="weekday-sun" value="sun" name="offerDay[]" class="weekday" />
											<label for="weekday-sun">S</label>
										</div>
									</div>

									<div class="set-time margin--20r">
										<label class="sb-form-label sb-form-label--active">Time</label>
										<div class="flex flex-ai-center">
											<input type="time" class="sb-input-field sb-input-field--datetime" name="datetime[time][start]">
											<span class="padding--5l padding--5r">&mdash;</span>
											<input type="time" class="sb-input-field sb-input-field--datetime" name="datetime[time][end]">
										</div>
									</div>

									<div class="offer-type margin--20r">
										<label class="sb-form-label sb-form-label--active">Offer Type</label>
										<ul>
											<li>
												<input id="postShift" name="type" type="radio" value="1" checked>
												<label for="postShift" class="radio-label">Post a shift</label>
											</li>
											<li>
												<input id="swapShift" name="type" type="radio" value="2" />
												<label for="swapShift" class="radio-label">Shift Swap</label>
											</li>
											<li>
												<input id="permaSwapShift" name="type" type="radio" value="3" />
												<label for="permaSwapShift" class="radio-label">Permanent Shift Swap</label>
											</li>
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
