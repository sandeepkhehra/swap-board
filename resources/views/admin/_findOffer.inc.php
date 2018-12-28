<div class="show-div hidden" id="find-offer">
	<div class="find-offer">
		<h2>Find Offer</h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<div class="invition-form offer">
					<form data-swap-form>
						<?php sboardDefineFormAction('ajax', 'findOffers', SwapBoard\Controllers\OffersController::class); ?>
						<input type="hidden" name="companyID" value="<?php echo $companyData->id; ?>">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="Position">Position</label>
									<select class="sb-input-field" name="position">
									<?php foreach ( $positions as $position ) : ?>
										<option value="<?php echo $position; ?>"><?php echo $position; ?></option>
									<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Location">Location</label>
									<select class="sb-input-field" name="location">
									<?php foreach ( $locations as $location ) : ?>
										<option value="<?php echo $location; ?>"><?php echo $location; ?></option>
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
										<input type="date" class="sb-input-field sb-input-field--datetime" name="datetime[date]" id="offerDate" />
									</div>

									<div class="margin--20r">
										<label class="sb-form-label">Day of week</label>
										<div class="weekDays-selector">
											<input type="checkbox" id="findOffer-mon" value="mon" class="weekday" />
											<label for="findOffer-mon">M</label>
											<input type="checkbox" id="findOffer-tue" value="tue" class="weekday" />
											<label for="findOffer-tue">T</label>
											<input type="checkbox" id="findOffer-wed" value="wed" class="weekday" />
											<label for="findOffer-wed">W</label>
											<input type="checkbox" id="findOffer-thu" value="thu" class="weekday" />
											<label for="findOffer-thu">T</label>
											<input type="checkbox" id="findOffer-fri" value="fri" class="weekday" />
											<label for="findOffer-fri">F</label>
											<input type="checkbox" id="findOffer-sat" value="sat" class="weekday" />
											<label for="findOffer-sat">S</label>
											<input type="checkbox" id="findOffer-sun" value="sun" class="weekday" />
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
					<table class="table-data-provider table-responsive table-striped">
						<thead>
							<tr>
								<th scope="col"><a href="#" class="sort-by">Position</a></th>
								<th scope="col"><a href="#" class="sort-by">Location</a></th>
								<th scope="col"><a href="#" class="sort-by">Date</a></th>
								<th scope="col"><a href="#" class="sort-by">Time</a></th>
								<th scope="col"><a href="#" class="sort-by">Type</a></th>
								<th></th>
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
