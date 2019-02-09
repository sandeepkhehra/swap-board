<?php
use SwapBoard\Controllers\Admin\ChatsController;
global $user_ID;

$positions = unserialize($companyData->positions);
$locations = unserialize($companyData->locations);
$firstName = isset( $userMeta['firstName'] ) ? $userMeta['firstName'] : '';
$lastName = isset( $userMeta['lastName'] ) ? $userMeta['lastName'] : '';
$userEmail = isset( $userMeta['userEmail'] ) ? $userMeta['userEmail'] : '';
$phone = isset( $userMeta['phone'] ) ? $userMeta['phone'] : '';
$employeeID = isset( $userMeta['employeeID'] ) ? $userMeta['employeeID'] : '';
$userPosition = isset( $userMeta['position'] ) ? $userMeta['position'] : '';
$userLocation = isset( $userMeta['location'] ) ? $userMeta['location'] : '';
$description = isset( $userMeta['description'] ) ? $userMeta['description'] : '';
$chatsController = new ChatsController;

if ( ! empty( $chats ) ) :
	$chatIDs = [];

	foreach ( $chats as $chat ) :
		$chatIDs[] = $chat->id;
	endforeach;

	$chatIDs = implode( ',', $chatIDs );
endif;

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
						<ul class="listing-navigation hidden-xs" id="configurator-wrap"">
							<li><a href="#invite-people" class="tbntabs">Invite People</a></li>
							<li><a href="#member-list" class="tbntabs">Members List</a></li>
							<li class="active"><a href="#profile" class="tbntabs">Company Profile</a></li>
						</ul>
						<div class="icons-slide">
							<span class="message-pop">
								<a href="javascript:void(0)" class="message-chat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i> </a>
								<div class="dropdown-menu " role="menu" aria-labelledby="dLabel">
									<div class="shw-msg">
										<?php if ( isset( $chatIDs ) && $chats = $chatsController->allUnreadChats( $chatIDs ) ) : ?>
											<ul>
												<?php foreach ( $chats as $chat ) :
													$userData = get_userdata( $chat->userID );
												?>
												<li style="white-space: nowrap;">
													<div class="flex">
														<figure style="width: 30px; height: 30px;min-width: 30px; border: 1px solid rgba(0,0,0,0.3); border-radius: 50%; overflow: hidden">
															<img src="<?php echo $userMeta['avatar']; ?>" alt="su" >
														</figure>
														<span style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; padding-left: 20px"><?php echo $chat->content; ?></span>
													</div>
												</li>
												<?php endforeach; ?>
											</ul>
										<?php else: ?>
											<p>No messages!</p>
										<?php endif; ?>
									</div>
								</div>
							</span>
							<span class="message-pop">
								<a href="javascript:void(0)" class="chat-notc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i></a>
								<div class="dropdown-menu" role="menu" aria-labelledby="dLabel">
									<div class="shw-msg">
										<!-- <span><img src="<?php sboardCoreAssets('images', ['bell-notice.png'], 'admin'); ?>" alt=""/></span> -->
										<p>You have no notifications!</p>
									</div>
								</div>
							</span>
							<span class="message-pop profile">
								<a href="javascript:void(0)" class="drop_dn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-out"></i></a>
								<div class="dropdown-menu " role="menu" aria-labelledby="dLabel">
									<div class="shw-msg">
										<ul>
											<!-- <li><a href="#"><i class="fa fa-cog"></i> <span>Setting</span></a></li> -->
											<li><a data-swap-button="popup-open" data-swap-pop-type="sign-popup" href="#"><i class="fa fa-user"></i><span>Profile</span></a></li>
											<!-- <li><a href="#"><i class="fa fa-envelope-o"></i> <span>Messages</span></a></li> -->
											<li><a href="<?php echo wp_logout_url( get_permalink( PLUGIN_ADMIN_LAND_PAGE ) ); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span></a></li>
										</ul>
									</div>
								</div>
							</span>
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
						<?php sboardDefineFormAction( 'ajax', 'updateUserMeta', SwapBoard\Controllers\UsersController::class ); ?>
						<input type="hidden" name="userID" value="<?php echo $user_ID; ?>">
						<div class="profile-detal">
							<h3 class="popup-heading">My Profile</h3>
							<div class="file-upload">
								<div class="file-select textfield">
									<div class="file-select-button" id="fileName"><i class="fa fa-camera"></i></div>
									<div class="file-select-name">
									<?php if ( isset( $userMeta['avatar'] ) ) : ?>
									<img src="<?php echo $userMeta['avatar']; ?>" alt="avatar">
									<?php else: ?>
									No file chosen&hellip;
									<?php endif; ?>
									</div>
									<input type="file" name="avatar">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="firstName">First Name</label>
									<input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" class="sb-input-field" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="lastName">Last Name</label>
									<input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" class="sb-input-field" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="userEmail">Email</label>
									<input type="text" id="userEmail" name="userEmail" value="<?php echo $userEmail; ?>" class="sb-input-field" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="phone">Phone Number</label>
									<input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" class="sb-input-field">
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="position">Position</label>
									<select class="sb-input-field" name="position" id="position">
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
									<label class="sb-form-label sb-form-label--gray" for="location">Location</label>
									<select class="sb-input-field" name="location" id="location">
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
									<label class="sb-form-label sb-form-label--gray" for="employeeID">Employee Identification Number</label>
									<input type="text" id="employeeID" name="employeeID" value="<?php echo $employeeID; ?>" class="sb-input-field">
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label class="sb-form-label sb-form-label--gray" for="description">Short job Description</label>
									<textarea name="description" id="description" class="sb-input-field sb-input-field--textarea"><?php echo $description; ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
						<button type="button" data-swap-button="update-meta" class="sb-form-button sb-form-button--info sb-form-button--big">Save</button>
						<button type="button" data-swap-button="popup-close" class="sb-form-button sb-form-button--danger sb-form-button--big">Cancel</button>
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