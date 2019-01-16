<?php
$positions = unserialize($companyData->positions);
$locations = unserialize($companyData->locations);
$user = get_userdata( $user_ID );
$userMeta = get_user_meta( $user_ID, '__swap-user', true );
$firstName = $user->first_name;
$lastName = $user->last_name;
$phone = isset( $userMeta['phone'] ) ? $userMeta['phone'] : '';
$employeeID = isset( $userMeta['employeeID'] ) ? $userMeta['employeeID'] : '';
$userPosition = isset( $userMeta['position'] ) ? $userMeta['position'] : '';
$userLocation = isset( $userMeta['location'] ) ? $userMeta['location'] : '';
$description = isset( $userMeta['description'] ) ? $userMeta['description'] : '';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo $title; ?></title>
		<?php sboardCoreAssets('css', ['reset.css', 'bootstrap.min.css', 'animate.css', 'font-awesome.min.css', 'easy-responsive-tabs.css']); ?>
		<?php wp_head(); ?>
	</head>
	<body>
    <!-- header -->
	<div class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 flex flex-jc-sb">
					<a href="#" class="sb-logo-title"><?php echo $companyData->name; ?></a>
					<aside class="flex">
						<a id="dashbrd-clck" class="visible-xs text-right"></a>
						<ul class="listing-navigtion hidden-xs" id="configurator-wrap"">
							<li><a href="#invite-people" class="tbntabs">Invite People</a></li>
							<li><a href="#member-list" class="tbntabs">Members List</a></li>
							<li class="active"><a href="#profile" class="tbntabs">Company Profile</a></li>
						</ul>
						<div class="icons-slide">
							<span class="messahe-des">
								<a href="javascript:void(0)" title="message" class="message-chat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i></a>
								<div class="dropdown-menu " role="menu" aria-labelledby="dLabel">
									<div class="shw-messge">
										<span><img src="<?php sboardCoreAssets('images', ['chat-message.png'], 'admin'); ?>" alt=""/></span>
										<p>You have no notification!</p>
									</div>
								</div>
							</span>
							<span class="chats">
								<a href="javascript:void(0)" class="chat-notc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i></a>
								<div class="dropdown-menu" role="menu" aria-labelledby="dLabel">
									<div class="shw-messge">
										<!-- <span><img src="<?php sboardCoreAssets('images', ['bell-notice.png'], 'admin'); ?>" alt=""/></span> -->
										<h5>No messages!</h5>
									</div>
								</div>
							</span>
							<span class="profile">
								<a href="javascript:void(0)" class="drop_dn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-out"></i></a>
								<div class="dropdown-menu " role="menu" aria-labelledby="dLabel">
								<ul>
									<!-- <li><a href="#"><i class="fa fa-cog"></i> <span>Setting</span></a></li> -->
									<li><a data-swap-button="popup-open" data-swap-pop-type="sign-popup" href="#"><i class="fa fa-user"></i><span>Profile</span></a></li>
									<!-- <li><a href="#"><i class="fa fa-envelope-o"></i> <span>Messages</span></a></li> -->
									<li><a href="<?php echo wp_logout_url( get_permalink( PLUGIN_ADMIN_LAND_PAGE ) ); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span></a></li>
								</ul>
							</span>
						</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>

	<div class="popup" data-popup="sign-popup" style="display: none">
		<div class="popup-inner">
			<div class="dash-pop clearfix">
				<div class="pop-part">
					<form>
						<div class="profile-detal">
							<h3 class="popup-heading">My Profile</h3>
							<div class="file-upload">
								<div class="file-select textfield pass">
									<div class="file-select-button" id="fileName"><i class="fa fa-camera"></i></div>
									<div class="file-select-name" id="noFile">No file chosen...</div>
										<input type="file" name="chooseFile" id="chooseFile">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="first_name">First Name</label>
									<input type="text" id="first_name" name="first_name" value="<?php echo $firstName; ?>" class="sb-input-field" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="last_name">Last Name</label>
									<input type="text" id="last_name" name="last_name" value="<?php echo $lastName; ?>" class="sb-input-field" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="user_email">Email</label>
									<input type="text" id="user_email" name="user_email" value="<?php echo $user->user_email; ?>" class="sb-input-field" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="phone">Phone Number</label>
									<input type="tel" id="phone" name="pone" value="<?php echo $employeeID; ?>" class="sb-input-field">
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="Position">Position</label>
									<select class="sb-input-field">
										<option value="">Select a Position</option>
										<?php if ( ! empty( $positions ) ) :
											foreach ( $positions as $position ) : ?>
											<option value="<?php echo sboardGetSlug( $position ); ?>" <?php echo sboardGetSlug( $position ) == sboardGetSlug( $userPosition ) ? 'checked' : ''; ?>><?php echo $position; ?></option>
										<?php endforeach;
										endif; ?>
									</select>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="Position">Location</label>
									<select class="sb-input-field">
										<option value="">Select a Location</option>
										<?php if ( ! empty( $locations ) ) :
											foreach ( $locations as $location ) : ?>
											<option value="<?php echo sboardGetSlug( $location ); ?>" <?php echo sboardGetSlug( $position ) == sboardGetSlug( $userLocation ) ? 'checked' : ''; ?>><?php echo $location; ?></option>
										<?php endforeach;
										endif; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="Identification">Employee Identification Number</label>
									<input type="text" id="Identification" class="sb-input-field" required>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="message">Short job Description</label>
									<textarea name="comments" id="message" class="sb-input-field sb-input-field--textarea"><?php echo $description; ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
						<button type="button" class="sb-form-button sb-form-button--info sb-form-button--big">Save</button>
						<button type="button" class="sb-form-button sb-form-button--danger sb-form-button--big">Cancel</button>
						</div>
					</form>
				</div>
				<div class="return-step">
					<div class="third">
						<h4 class="popup-heading popup-heading--white popup-heading--mid padding--35b">Change Password</h4>
						<form>
							<div class="form-group">
								<label for="current" class="sb-form-label sb-form-label--light">Current Password</label>
								<input type="password" id="current" class="sb-input-field" required>
							</div>
							<div class="form-group">
								<label for="password" class="sb-form-label sb-form-label--light">Password</label>
								<input type="password" id="password" class="sb-input-field" required>
							</div>
							<div class="form-group">
								<button type="button" class="sb-form-button sb-form-button--danger sb-form-button--big">Change</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<span class="popup-close" data-swap-button="popup-close">&times;</span>
		</div>
	</div>