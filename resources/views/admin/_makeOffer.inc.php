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
						<div class="padding--35b">
							<div>
								<h6 class="heading-medium">Position</h6>
								<?php if ( ! empty( $positions ) ) : ?>
								<select class="sb-input-field" name="position">
									<?php foreach ( $positions as $key => $position ) : ?>
									<option value="<?php echo $key; ?>"><?php echo $position; ?></option>
									<?php endforeach; ?>
								</select>
								<?php else: ?>
								<p>No position exist.</p>
								<?php endif; ?>
							</div>
							<div>
								<h6 class="heading-medium">Location</h6>
								<?php if ( ! empty( $locations ) ) : ?>
								<select class="sb-input-field" name="location">
									<?php foreach ( $locations as $key => $location ) : ?>
									<option value="<?php echo $key; ?>"><?php echo $location; ?></option>
									<?php endforeach; ?>
								</select>
								<?php else: ?>
								<p>No location exist.</p>
								<?php endif; ?>
							</div>
							<div class="make-fuldespt">
								<h6 class="heading-medium">Description</h6>
								<textarea class="form-field" name="description" id="">As a Customer Service Agent, you will be an important part of our customers' travel experience. You 'll assist customer with check-in, boarding/de-boarding our bus to/from Houston, and addressing questions related to checked baggages. In this role, it's vital to create a welcoming environment for our customers.</textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="make-timdate">
									<div class="scted clearfix">
										<label for="offerDate">Date</label>
										<input type="date" name="datetime[date]" id="offerDate" />
									</div>
									<div class="time clearfix">
										<label>Day of week</label>
										<div class="checkbox-group" style="display: none;">
											<ul>
												<li>
													<input type="checkbox" id="mon" /> <label for="mon">Mo</label>
												</li>
												<li>
													<input type="checkbox" id="tue" /> <label for="tue">Tu</label>
												</li>
												<li>
													<input type="checkbox" id="wed" /> <label for="wed">We</label>
												</li>
												<li>
													<input type="checkbox" id="thur" /> <label for="thur">Th</label>
												</li>
												<li>
													<input type="checkbox" id="fri" /> <label for="fri">Fr</label>
												</li>
												<li>
													<input type="checkbox" id="sat" /> <label for="sat">Sa</label>
												</li>
												<li>
													<input type="checkbox" id="sun" /> <label for="sun">Su</label>
												</li>
											</ul>
										</div>
									</div>
									<div class="set-time clearfix">
										<label>Time</label>
										<input type="time" name="datetime[time][start]">
										<div class="specer">-</div>
										<input type="time" name="datetime[time][end]">
									</div>
									<div class="offer-type clearfix">
										<h6>Offer Type</h6>
										<div class="radio">
											<input id="postShift" name="type" type="radio" value="1" checked>
											<label for="postShift" class="radio-label">Post a shift</label>
										</div>

										<div class="radio">
											<input id="swapShift" name="type" type="radio" value="2" />
											<label for="swapShift" class="radio-label">Shift Swap</label>
										</div>

										<div class="radio">
											<input id="permaSwapShift" name="type" type="radio" value="3" />
											<label for="permaSwapShift" class="radio-label">Permanent Shift Swap</label>
										</div>
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
