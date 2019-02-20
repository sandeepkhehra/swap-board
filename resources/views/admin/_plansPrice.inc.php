<?php
use SwapBoard\Models\PlansModel;
$plans = new PlansModel;
$allPlans = array_reverse( $plans->readAll() );
$userPlans = get_user_meta( $user_ID, '__sboard_plan_data', true );
if ( ! $userPlans ) $userPlans = [];

?>
<div class="show-div hidden" id="plans-price">
	<div class="sb-plans-wrap">
		<h2>Plans & Prices</h2>
		<?php if ( ! empty( $allPlans ) ) :
			foreach( $allPlans as $plan ) :
				if ( ! array_key_exists( $plan->id, $userPlans ) ) : ?>
			<div class="sb-plan">
				<div class="sb-plan-details-wrap">
					<div class="sb-plan-details">
						<h4 class="sb-plan-title"><?php echo $plan->name; ?></h4>
						<p class="sb-plan-desc"><?php echo $plan->description; ?>
						</p>
					</div>
					<div class="sb-plan-price">
						<h3>$<?php echo $plan->price; ?></h3>

						<form style="margin: 0">
							<?php sboardDefineFormAction('ajax', 'purchasePlan', SwapBoard\Controllers\Admin\PlansController::class); ?>
							<input type="hidden" name="id" value="<?php echo $plan->id; ?>">
							<button class="sb-form-button sb-form-button--danger" data-swap-button="email-blast" data-swap-pop-type="email-blast">Buy Now</button>
						</form>
					</div>
				</div>
			</div>
			<?php endif;
			endforeach;
			else: ?>
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<h4>No plans available now!</h4>
			</div>
		<?php endif; ?>

		<div class="row">
			<div class="col-md-12">
				<p></p>
			</div>
		</div>
	</div>

	<div class="sb-plans-wrap">
		<h2>Active Plans</h2>

		<?php if ( ! empty( $allPlans ) ) :
			foreach( $allPlans as $plan ) :
				if ( array_key_exists( $plan->id, $userPlans ) ) : ?>
			<div class="sb-plan">
				<div class="sb-plan-details-wrap">
					<div class="sb-plan-details">
						<h4 class="sb-plan-title"><?php echo $plan->name; ?></h4>
						<p class="sb-plan-desc"><?php echo $plan->description; ?>
						</p>
					</div>
					<div class="sb-plan-price">
						<h4>Purchased On</h4>
						<span><?php echo $userPlans[ $plan->id ]['create_time'] ;?></span>
					</div>
				</div>
			</div>
			<?php endif;
			endforeach;
		endif; ?>
	</div>
</div>

<div class="invitation offer" data-popup="email-blast">
	<div class="popup-structure">
		<div class="blasstt">
			<h3>Email Blast</h3>
			<p>
				Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim
				omittantur sea ne, ei his eros dicit altera. Viris decore cu eum, mea id modus petentium voluptatum.
				Amet abhorreant mei ad, eum
			</p>

			<!-- <div class="sub-hom">
				<ul>
					<li class="mai-heading">
						<span class="straw">
							<h5>Date</h5>
						</span>
						<span class="straw">
							<h5>Time</h5>
						</span>
						<span class="straw">
							<h5>Type</h5>
						</span>
					</li>
				</ul>
			</div> -->

			<div data-is-pp-btn></div>
		</div>

		<span class="popup-close" data-swap-button="popup-close">&times;</span>
	</div>
</div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
