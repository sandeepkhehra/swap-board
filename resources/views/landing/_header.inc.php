<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo $context->template->title; ?></title>
		<?php sboardCoreAssets('css', ['reset.css', 'bootstrap.min.css', 'animate.css', 'font-awesome.min.css', 'easy-responsive-tabs.css']); ?>
		<?php wp_head(); ?>
	</head>
	<body>
		<div class="navigation" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<a href="#home" class="logo"> <img src="<?php sboardCoreAssets('images', ['logo.png'], 'landing'); ?>" class="img-responsive" alt="" /> </a>
						<a id="configure" class="visible-xs text-right"></a>
						<div class="navmenu hidden-xs" id="configurator-wrap">

							<ul class="nav">
								<li><a href="#About">About</a></li>
								<li><a href="#Company">Add Company</a></li>
								<li><a href="#plans">Plans & Prices</a></li>
								<li><a href="#help">Help & Support </a></li>
								<li><a data-popup-open="sign-popup" href="#Sign-In">Sign In</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>