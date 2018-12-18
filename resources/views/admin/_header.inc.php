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
    <!-- header -->
    <div class="main-section">
        <div class="topheader">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <em> <a href="#">Delta Airlines</a></em>
                        <aside>
							<a id="dashbrd-clck" class="visible-xs text-right"></a>
                            <ul class="listing-navigtion hidden-xs" id="configurator-wrap"">
								<li><a href="#invite-people" class="tbntabs">Invite People</a></li>
								<li><a href="#member-list" class="tbntabs">Member List</a></li>
								<li class="active"><a href="#profile" class="tbntabs">Company Profile</a></li>
							</ul>
							<div class="icons-slide">
								<span class="messahe-des">
									<a href="javascript:void(0)" title="message" class="message-chat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i></a>
									<div class="dropdown-menu " role="menu" aria-labelledby="dLabel">
										<div class="shw-messge">
											<span><img src="<?php sboardCoreAssets('images', ['chat-message.png'], 'admin'); ?>" alt=""/></span>
											<p>You have <a href="#">5 private messages</a>and<a href="#">2 accepted offer</a></p>
										</div>
									</div>
								</span>
								<span class="chats">
									<a href="javascript:void(0)" title="bell" class="chat-notc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i></a>
									<div class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										<div class="shw-messge">
											<span><img src="<?php sboardCoreAssets('images', ['bell-notice.png'], 'admin'); ?>" alt=""/></span>
											<h5>Rosy Brown</h5>
											<p>Hi! I'm with you.</p>
										</div>
									</div>
								</span>
								<span class="profile">
									<a href="javascript:void(0)" title="EUR" class="drop_dn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-out"></i></a>
									<div class="dropdown-menu " role="menu" aria-labelledby="dLabel">
									<ul>
										<li><a href="#"><i class="fa fa-cog"></i> <span>Setting</span></a></li>
										<li><a data-popup-open="sign-popup" href="#"><i class="fa fa-user"></i><span>Profile</span></a></li>
										<li><a href="#"><i class="fa fa-envelope-o"></i> <span>Messages</span></a></li>
										<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span></a></li>
									</ul>
								</span>
							</div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>