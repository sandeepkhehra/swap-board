<?php
$context = $this;
$title = $context->template->title;

sboardInclude('landing._header', compact('title')); ?>

	<section class="board-index">
		<div class="board-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="home-headline wow fadeInDown" data-wow-delay="0.2s">
							<h2>Web services for employees that helps you manage your shifts' schedule</h2>
							<p>
								Cooperate with your colleagues to swap your shifts and enjoy free time you get to
								travel, sightseeing and have fun with family and friends. Be in charge of your time
								and your life.
							</p>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="home-headline wow fadeInDown" data-wow-delay="0.2s">
							<h2>Let's Swap! Register your company to swap your shifts</h2>
							<form>
								<div class="input-group">
									<input
										class="form-control emailfield"
										type="email"
										placeholder="Email address"
									/>
								</div>
								<button class="sb-form-button sb-form-button--danger sb-form-button--big margin--20t" data-swap-button="popup-open" data-swap-pop-type="register">Add Company</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="container bottom-footer">
			<div class="row">
				<div class="col-md-12 flex flex-jc-sb">
					<small class="bottom-footer__text">Any problems? <a href="#"> We can help</a></small>
					<div class="social-icons">
						<a href="javascript:void(0)" title="Facebook" class="fa fa-facebook"></a>
						<a href="javascript:void(0)" title="Twitter" class="fa fa-twitter"></a>
						<a href="javascript:void(0)" title="YouTube" class="fa fa-youtube-play"></a>
					</div>
				</div>
			</div>
		</footer>
	</section>

<?php sboardInclude('landing._footer', compact( 'context' ) ); ?>