<div class="show-div hidden" id="archive-offer">
	<div class="find-offer archive">
		<h2>Archive Offers</h2>
		<div class="member-list table-sec ">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
					<table class="table-data-provider">
						<thead>
							<tr>
								<th scope="col"><a href="#" class="sort-by">Date</a></th>
								<th scope="col"><a href="#" class="sort-by">Time</a></th>
								<th scope="col"><a href="#" class="sort-by">Type</a></th>
								<th scope="col"><a href="#" class="sort-by">Accepted By</a></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php if ( ! empty( $offers ) ) :
								foreach ( $offers as $offer ) :
									if ( $offer->status != 1) : ?>
										<tr>
											<td>May29, 2016</td>
											<td>7am-12am</td>
											<td>Shift swap</td>
											<td>King Crimson</td>
											<td class="inviton" data-href="url://"><i class="fa fa-repeat"></i>Repeat</td>
										</tr>
										<?php
									endif;
								endforeach;
							else: ?>
							<tr>
								<td colspan="5">Nothing found!</td>
							</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
