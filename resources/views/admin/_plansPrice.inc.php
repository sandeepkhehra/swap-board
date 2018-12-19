<?php
use SwapBoard\Models\PlansModel;
$plans = new PlansModel;
$allPlans = $plans->readAll();
?>
<div class="show-div hidden" id="plans-price">
	<div class="sb-plans-wrap">
		<h2>Plans & Prices</h2>
		<?php if ( ! empty( $allPlans ) ) :
			foreach( $allPlans as $plan ) : ?>
			<div class="sb-plan">
				<div class="sb-plan-details-wrap">
					<div class="sb-plan-details">
						<h4 class="sb-plan-title"><?php echo $plan->name; ?></h4>
						<p class="sb-plan-desc"><?php echo $plan->description; ?>
						</p>
					</div>
					<div class="sb-plan-price">
						<h3>$<?php echo $plan->price; ?></h3>
						<button class="sb-plan-button" data-popup-open="email-blast" class="buy-blst">Buy Now</button>
					</div>
				</div>
			</div>
		<?php endforeach;
			else: ?>
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<h4>No plans available now!</h4>
			</div>
		<?php endif; ?>

		<div class="row">
			<div class="col-md-12">
				<p>
					Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim
					omittantur sea ne, ei his eros dicit altera. Viris decore cu eum, mea id modus petentium voluptatum.
					Amet abhorreant mei ad, eum
				</p>
			</div>
		</div>
	</div>
</div>
