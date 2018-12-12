<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Swapboard</title>
		<?php sboardCoreAssets('css', ['bootstrap.min.css', 'animate.css', 'font-awesome.min.css', 'easy-responsive-tabs.css']); ?>
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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrapper">
                        <!-- Sidebar Holder -->
                        <div class="sidebar">

							<div class="specier-name">
								<h5>Spencer White</h5>
							</div>
							<div class="close-btn sidebarCollapse"></div>
                            <ul class="list-unstyled components">
                                <li class="tabs_div">
                                    <a href="#find-offer">
                                        <span><i class="fa fa-search"></i></span>
                                        <dd>Find Offer</dd>
                                    </a>
                                </li>
                               <li class="tabs_div">
                                    <a href="#make-offer">
                                            <span><i class="fa fa-plus"></i></span>
                                            <dd>Make Offer</dd>
                                        </a>
                                </li>
                                <li class="tabs_div">
                                    <a href="#my-offer">
                                            <span><i class="fa fa-list"></i></span>
                                            <dd>My Offer</dd>
                                        </a>
                                </li>
                               <li class="tabs_div">
                                    <a href="#private-mesage">
                                            <span><i class="fa fa-comments"></i></span>
                                            <dd>Private Messages</dd>
                                        </a>
                                </li>
                                <li class="tabs_div">
                                    <a href="#plans-price">
                                            <span><i class="fa fa-usd"></i></span>
                                            <dd>Plans & Prices</dd>
                                        </a>
                                </li>
                                <li class="tabs_div">
                                    <a href="#archive-offer">
                                            <span><i class="fa fa-archive"></i></span>
                                            <dd>Archive Offers</dd>
                                        </a>
                                </li>
                                <li class="tabs_div">
                                    <a href="#">
                                            <span><i class="fa fa-comment-o"></i></span>
                                            <dd>Forum</dd>
                                        </a>
                                </li>
                                <li>
                                    <a data-popup-open="faq-popup" href="#">
                                            <span><i class="fa fa-question"></i></span>
                                            <dd>FAQ</dd>
                                     </a>
                                </li>

                            </ul>

                        </div>
                        <!-- Page Content Holder -->
                        <div id="content">
                            <!-- company-profile -->
							<div class="profile-detail dashboard-tabwrp " id="profile">
								<div class="company-profile ">
									<h2>Company Profile</h2>
									<div class="company-detail">
										<div class="filed-company">
											<div class="row">
												<form name="htmlform" method="post" action="toyousender.php">
													<div class="col-md-12">
														<div class="form-group">
															<label for="name">Company Name</label>
															<input type="text" id="name" required="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="email">Admin Email</label>
															<input type="text" id="email" required="">

														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="telphone">Phone Number</label>
															<input type="tel" id="telphone" required="">
														</div>
													</div>
												</form>
											</div>

										</div>
										<div class="company-logo">
											<form>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<label>Company Logo</label>
													<div class="file-upload">
														<div class="file-select textfield pass">
															<div class="file-select-button" id="fileName"><i class="fa fa-camera"></i></div>
															<div class="file-select-name" id="noFile">No file chosen...</div>
															<input type="file" name="chooseFile" id="chooseFile">
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>

								</div>
								<div class="job-decrpt">
									<div class="row">
										<div class="col-md-6">
											<div class="job-postn">
												<h6>Job Positions</h6>
												<div class="select-job">
													<div class="selt-pots">
														<div class="form-group">
															<select>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
															</select>
														</div>
														<a href="#" class="trash-fild"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</div>
													<div class="selt-pots">
														<div class="form-group">
															<select>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
															</select>
														</div>
														<a href="#" class="trash-fild"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</div>
													<div class="selt-pots">
														<div class="form-group">
															<select>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
															</select>
														</div>
														<a href="#" class="trash-fild"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</div>
													<div class="selt-pots">
														<div class="form-group">
															<select>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
															</select>
														</div>
														<a href="#" class="trash-fild"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</div>
													<div class="selt-pots">
														<div class="form-group">
															<select>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
															</select>
														</div>
														<a href="#" class="trash-fild"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</div>
													<div class="selt-pots">
														<div class="form-group">
															<select>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
																<option>Licensed Engineers</option>
															</select>
														</div>
														<a href="#" class="trash-fild"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</div>
													<a href="#" class="add-mort"><i class="fa fa-plus"></i>Add more</a>
												</div>
											</div>
										</div>
											<div class="col-md-6">
											<div class="job-postn">
												<h6>Locations</h6>
												<div class="select-job">
													<div class="selt-pots">
														<div class="form-group">
															<select>
																<option>Boston-Logan international Airport</option>
																<option>Boston-Logan international Airport</option>
																<option>Boston-Logan international Airport</option>
															</select>
														</div>
														<a href="#" class="trash-fild"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</div>
													<div class="selt-pots">
														<div class="form-group">
															<select>
																<option>Boston-Logan international Airport</option>
																<option>Boston-Logan international Airport</option>
																<option>Boston-Logan international Airport</option>
															</select>
														</div>
														<a href="#" class="trash-fild"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</div>


													<a href="#" class="add-mort"><i class="fa fa-plus"></i>Add more</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="save-profl">
									<a href="#" class="sav-btn">Save</a>
									<a href="#" class="canl-btn">Cancel</a>
								</div>

							</div>
							<!-- member-list -->
							<div class="show-div hidden" id="member-list">
								<div class="member-list table-sec ">
									<h2>Member List</h2>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                            <table class="table-data-provider">
												<thead>
													<tr>
														<th scope="col"><a href="#" class="sort-by">First Name</a></th>
														<th scope="col"><a href="#" class="sort-by">Last Name</a></th>
														<th scope="col"><a href="#" class="sort-by">Invitation Date</a></th>
														<th scope="col"><a href="#" class="sort-by">Administrator</a></th>
														<th></th>
														<th></th>
													</tr>
												</thead>
                                                <tbody>
                                                    <tr data-popup-open="invetion-popup">
                                                      <td>Rosy</td>
                                                      <td>Brown</td>
                                                      <td>05.25.2016</td>
                                                      <td><input type="checkbox" name="check" /></td>
                                                      <td class="inviton" data-href='url://'><i class="fa fa-paper-plane-o"></i>Resend Invitation</td>
                                                      <td class="inviton thrsh" data-href='url://'><i class="fa fa-trash-o"></i>Delete</td>
                                                    </tr>
                                                    <tr data-popup-open="invetion-popup">
                                                      <td>Rosy</td>
                                                      <td>Brown</td>
                                                      <td>05.25.2016</td>
                                                      <td><input type="checkbox" name="check" /></td>
                                                      <td class="inviton" data-href='url://'><i class="fa fa-paper-plane-o"></i>Resend Invitation</td>
                                                      <td class="inviton thrsh" data-href='url://'><i class="fa fa-trash-o"></i>Delete</td>
                                                    </tr>
													<tr data-popup-open="invetion-popup">
                                                      <td>Rosy</td>
                                                      <td>Brown</td>
                                                      <td>05.25.2016</td>
                                                      <td><input type="checkbox" name="check" /></td>
                                                      <td class="inviton" data-href='url://'><i class="fa fa-paper-plane-o"></i>Resend Invitation</td>
                                                      <td class="inviton thrsh" data-href='url://'><i class="fa fa-trash-o"></i>Delete</td>
                                                    </tr>
													<tr data-popup-open="invetion-popup">
                                                      <td>Rosy</td>
                                                      <td>Brown</td>
                                                      <td>05.25.2016</td>
                                                      <td><input type="checkbox" name="check" /></td>
                                                      <td class="inviton" data-href='url://'><i class="fa fa-paper-plane-o"></i>Resend Invitation</td>
                                                      <td class="inviton thrsh" data-href='url://'><i class="fa fa-trash-o"></i>Delete</td>
                                                    </tr>
                                                    <tr data-popup-open="invetion-popup">
                                                      <td>Rosy</td>
                                                      <td>Brown</td>
                                                      <td>05.25.2016</td>
                                                      <td><input type="checkbox" name="check" /></td>
                                                      <td class="inviton" data-href='url://'><i class="fa fa-paper-plane-o"></i>Resend Invitation</td>
                                                      <td class="inviton thrsh" data-href='url://'><i class="fa fa-trash-o"></i>Delete</td>
                                                    </tr>
                                                    <tr data-popup-open="invetion-popup">
                                                      <td>Rosy</td>
                                                      <td>Brown</td>
                                                      <td>05.25.2016</td>
                                                      <td><input type="checkbox" name="check" /></td>
                                                      <td class="inviton" data-href='url://'><i class="fa fa-paper-plane-o"></i>Resend Invitation</td>
                                                      <td class="inviton thrsh" data-href='url://'><i class="fa fa-trash-o"></i>Delete</td>
                                                    </tr>
                                                    <tr data-popup-open="invetion-popup">
                                                      <td>Rosy</td>
                                                      <td>Brown</td>
                                                      <td>05.25.2016</td>
                                                      <td><input type="checkbox" name="check" /></td>
                                                      <td class="inviton" data-href='url://'><i class="fa fa-paper-plane-o"></i>Resend Invitation</td>
                                                      <td class="inviton thrsh" data-href='url://'><i class="fa fa-trash-o"></i>Delete</td>
                                                    </tr>
                                                    <tr data-popup-open="invetion-popup">
                                                      <td>Rosy</td>
                                                      <td>Brown</td>
                                                      <td>05.25.2016</td>
                                                      <td><input type="checkbox" name="check" /></td>
                                                      <td class="inviton" data-href='url://'><i class="fa fa-paper-plane-o"></i>Resend Invitation</td>
                                                      <td class="inviton thrsh" data-href='url://'><i class="fa fa-trash-o"></i>Delete</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
								</div>
							</div>
							<!-- invite people -->
							<div class="show-div hidden" id="invite-people">
								<div class="invite-peop">
									<h2>Invite People</h2>
									<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris decore cu eum,
									mea id modus petentium voluptatum. Amet abhorreant mei ad, eum </p>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                                           <div class="invition-form">
												<form name="htmlform" method="post" action="toyousender.php">
													<div class="col-md-4">
														<div class="form-group">
															<label for="email">Email</label>
															<input type="email" id="email" required="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="name">First Name (optional)</label>
															<input type="text" id="name" required="">

														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="name">Lastt Name (optional)</label>
															<input type="text" id="name" required="">
														</div>
													</div>
												</form>
												<form name="htmlform" method="post" action="toyousender.php">
													<div class="col-md-4">
														<div class="form-group">
															<label for="email">Email</label>
															<input type="email" id="email" required="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="name">First Name (optional)</label>
															<input type="text" id="name" required="">

														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="name">Last Name (optional)</label>
															<input type="text" id="name" required="">
														</div>
													</div>
												</form>
												<a href="#" class="add-mort"><i class="fa fa-plus"></i>Add more</a>
											</div>
                                        </div>
										<div class="col-md-12">
											<div class="save-profl">
												<a href="#" class="canl-btn">Send Invitation</a>
											</div>
										</div>
                                    </div>
								</div>
							</div>

							<!-- Find-offer -->
							<div class="show-div hidden" id="find-offer">
								<div class="find-offer">
									<h2>Find Offer</h2>
									<div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                                           <div class="invition-form offer">
												<form name="htmlform" method="post" action="toyousender.php">
													<div class="col-md-6">
														<div class="form-group">
															<label for="Position">Position</label>
															<select class="fa-map-marker">
																<option>Flight Safety Manager</option>
																<option>Flight Safety Manager</option>
																<option>Flight Safety Manager</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="Location">Location</label>
															<select>
																<option>Boston-Logan International Airport</option>
																<option>Boston-Logan International Airport</option>
																<option>Boston-Logan International Airport</option>
															</select>

														</div>
													</div>
													<div class="col-md-12 offer-res">
														<div class="date">
															<label for="Date">Date</label>
															<aside>Day of week</aside>
															<div class="checkbox-group">
																  <ul>
																	<li>
																		<input type="checkbox" id="mon"/>
																		<label for="mon">Mo</label>
																	</li>
																	<li>
																		<input type="checkbox" id="tue"/>
																		<label for="tue">Tu</label>
																	</li>
																	<li>
																		<input type="checkbox" id="wed"/>
																		<label for="wed">We</label>
																	</li>
																	<li>
																		<input type="checkbox" id="thur"/>
																		<label for="thur">Th</label>
																	</li>
																	<li>
																		<input type="checkbox" id="fri"/>
																		<label for="fri">Fr</label>
																	</li>
																	<li>
																		<input type="checkbox" id="sat"/>
																		<label for="sat">Sa</label>
																	</li>
																	<li>
																		<input type="checkbox" id="sun"/>
																		<label for="sun">Su</label>
																	</li>
																  </ul>
															</div>

														</div>
														<div class="time-change">
															<div class="time">
																<label for="Time">Time</label>
																<input type="time"/>
																<div class="specer">-</div>
																<input type="time"/>
															</div>
															<div class="time shift">
																<label for="shift-type">Shift Type</label>
																<select>
																	<option>Shift Swap</option>
																	<option>Shift Swap</option>
																	<option>Shift Swap</option>
																</select>
															</div>
														</div>
														<div class="search">
															<button type="submit">Search</button>
														</div>
													</div>

												</form>


											</div>
                                        </div>
								</div>
									<div class="member-list table-sec ">
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
                                                    <tr data-popup-open="find-offer">
                                                      <td>Licensed Engineer</td>
                                                      <td>Boston-Logan International Airport</td>
                                                      <td>May29, 2016</td>
													  <td>7am-12am</td>
													  <td>Shift swap</td>
                                                    </tr>
                                                    <tr data-popup-open="find-offer">
                                                      <td>Licensed Engineer</td>
                                                      <td>Boston-Logan International Airport</td>
                                                      <td>May29, 2016</td>
													  <td>7am-12am</td>
													  <td>Shift</td>
                                                    </tr>
													<tr data-popup-open="find-offer">
                                                      <td>Licensed Engineer</td>
                                                      <td>Boston-Logan International Airport</td>
                                                      <td>May29, 2016</td>
													  <td>7am-12am</td>
													  <td>Shift swap</td>
                                                    </tr>
													<tr data-popup-open="find-offer">
                                                      <td>Licensed Engineer</td>
                                                      <td>Boston-Logan International Airport</td>
                                                      <td>May29, 2016</td>
													  <td>7am-12am</td>
													  <td>Shift swap</td>
                                                    </tr>
                                                    <tr data-popup-open="find-offer">
                                                      <td>Licensed Engineer</td>
                                                      <td>Boston-Logan International Airport</td>
                                                      <td>May29, 2016</td>
													  <td>7am-12am</td>
													  <td>Shift swap</td>
                                                    </tr>
                                                   <tr data-popup-open="find-offer">
                                                      <td>Licensed Engineer</td>
                                                      <td>Boston-Logan International Airport</td>
                                                      <td>May29, 2016</td>
													  <td>7am-12am</td>
													  <td>Shift swap</td>
                                                    </tr>
                                                   <tr data-popup-open="find-offer">
                                                      <td>Licensed Engineer</td>
                                                      <td>Boston-Logan International Airport</td>
                                                      <td>May29, 2016</td>
													  <td>7am-12am</td>
													  <td>Shift swap</td>
                                                    </tr>
                                                    <tr data-popup-open="find-offer">
                                                      <td>Licensed Engineer</td>
                                                      <td>Boston-Logan International Airport</td>
                                                      <td>May29, 2016</td>
													  <td>7am-12am</td>
													  <td>Shift swap</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
								</div>
							</div>
                     		</div>
							<!-- MAKE-offer -->
							<div class="show-div hidden" id="make-offer">
								<div class="find-offer">
									<h2>Make Offer</h2>
									<div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                                           <div class="invition-form offer makoffer">
										    <div class="col-md-12 col-sm-12 col-xs-12 ">
												<div class="make-ofdes">
													<span>
														<h6>Position</h6>
														<p>Airport Customer Service Agent</p>
													</span>
													<span>
														<h6>Location</h6>
														<p>Dallas-Fort Worth Airport (DWF)</p>
													</span>
													<div class="make-fuldespt">
														<h6>Description</h6>
														<p>As a Customer Service Agent, you will be an important part of our customers' travel experience. You 'll assist customer with check-in, boarding/de-boarding our bus to/from Houston, and addressing questions related to checked baggages.
														In this role, it's vital to create a welcoming environment for our customers.</p>
													</div>
												</div>
												<div class="row">
												<form name="htmlform" method="post" action="toyousender.php">
													<div class="col-md-12">
														<div class="make-timdate">
															<div class="scted clearfix">
																<label for="dateofbirth">Date</label>
																<input type="date" name="dateofbirth" id="dateofbirth">
															</div>
															<div class="time clearfix">
																<label>Day of week</label>
																<div class="checkbox-group" style="display: none;">
																  <ul>
																	<li>
																		<input type="checkbox" id="mon"/>
																		<label for="mon">Mo</label>
																	</li>
																	<li>
																		<input type="checkbox" id="tue"/>
																		<label for="tue">Tu</label>
																	</li>
																	<li>
																		<input type="checkbox" id="wed"/>
																		<label for="wed">We</label>
																	</li>
																	<li>
																		<input type="checkbox" id="thur"/>
																		<label for="thur">Th</label>
																	</li>
																	<li>
																		<input type="checkbox" id="fri"/>
																		<label for="fri">Fr</label>
																	</li>
																	<li>
																		<input type="checkbox" id="sat"/>
																		<label for="sat">Sa</label>
																	</li>
																	<li>
																		<input type="checkbox" id="sun"/>
																		<label for="sun">Su</label>
																	</li>
																  </ul>
																</div>

															</div>
															<div class="set-time clearfix">
																<label for="Time">Time</label>
																<input type="time"/>
																<div class="specer">-</div>
																<input type="time"/>
															</div>
															<div class="offer-type clearfix">
																<h6>Offer Type</h6>
																<div class="radio">
																	<input id="radio-1" name="radio" type="radio" checked>
																	<label for="radio-1" class="radio-label">Post a shift</label>
																</div>

																<div class="radio">
																	<input id="radio-2" name="radio" type="radio">
																	<label  for="radio-2" class="radio-label">shift swap</label>
																</div>

																<div class="radio">
																	<input id="radio-3" name="radio" type="radio">
																	<label for="radio-3" class="radio-label">permanent shift swap</label>
																</div>
															</div>
														</div>





														<div class="add-order">
															<button type="submit">Add Order</button>
														</div>
													</div>

												</form>
												</div>
												</div>
											</div>
                                        </div>
								</div>
								<div class="activt-sebsert">To activate offers you need to<a href="#"> buy the subscription</a></div>
							</div>
                     		</div>
							<!-- My-offer -->
							<div class="show-div hidden" id="my-offer">
								<div class="find-offer">
									<h2>My Offers</h2>

									<div class="member-list table-sec offer ">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                            <table class="table-data-provider" id="table-id">

												<thead>
													<tr>
														<th scope="col"><a href="#" class="sort-by">Date</a></th>
														<th scope="col"><a href="#" class="sort-by">Time</a></th>
														<th scope="col"><a href="#" class="sort-by">Type</a></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
													</tr>
												</thead>
                                                <tbody>
                                                    <tr>
														<td class="accept">May29, 2016
															<div class="tooltiptext">
																<h5>1 person wants to work your shift!</h5>
																<aside>Comment:</aside>
																<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris decore cu eum,
																	mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
																	<div class="verificatio">
																		<div class="save-profl">
																			<a href="#">Accept and hide</a>
																		</div>
																		<div class="save-profl">
																			<a href="#" class="yellow">Accept and Keep active</a>
																		</div>
																		<div class="save-profl">
																			<a href="#" class="canl-btn">Decline</a>
																		</div>
																	</div>
															</div>
														</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-eye-slash"></i>Hide</td>
														<td></td>
													</tr>
                                                    <tr class="expired">
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton show" data-href="url://"><i class="fa fa-eye"></i>Show</td>
														<td></td>
													</tr>
													<tr>
														<td class="accept">May29, 2016
															<div class="tooltiptext">
																<h5>1 person wants to work your shift!</h5>
																<div class="content-hide">
																	<span class="comment">
																		<aside>Comment:</aside>
																		<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris decore cu eum,
																		mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
																		<div class="verificatio">
																			<div class="save-profl">
																				<a href="#">Accept and hide</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="yellow">Accept and Keep active</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="canl-btn">Decline</a>
																			</div>
																		</div>
																	</span>
																</div>
															</div>
														</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-eye-slash"></i>Hide</td>
														<td></td>
													</tr>
													<tr>
														<td class="accept">May29, 2016
															<div class="tooltiptext">
																<h5>1 person wants to work your shift!</h5>
																<div class="content-hide">
																	<span class="comment">
																		<aside>Comment:</aside>
																		<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris decore cu eum,
																		mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
																		<div class="verificatio">
																			<div class="save-profl">
																				<a href="#">Accept and hide</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="yellow">Accept and Keep active</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="canl-btn">Decline</a>
																			</div>
																		</div>
																	</span>
																</div>
															</div>
														</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-eye-slash"></i>Hide</td>
														<td></td>
													</tr>
                                                    <tr>
														<td class="accept">May29, 2016
															<div class="tooltiptext">
																<h5>2 person wants to work your shift!</h5>
																<div class="content-hide">
																	<span class="comment">
																		<aside>Comment:</aside>
																		<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris decore cu eum,
																		mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
																		<div class="verificatio">
																			<div class="save-profl">
																				<a href="#">Accept and hide</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="yellow">Accept and Keep active</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="canl-btn">Decline</a>
																			</div>
																		</div>
																	</span>
																	<span class="comment">
																		<aside>Comment:</aside>
																		<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris decore cu eum,
																		mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
																		<div class="verificatio">
																			<div class="save-profl">
																				<a href="#">Accept and hide</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="yellow">Accept and Keep active</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="canl-btn">Decline</a>
																			</div>
																		</div>
																	</span>
																</div>
															</div>
														</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-eye-slash"></i>Hide</td>
														<td></td>
													</tr>
													<tr>
														<td class="accept">May29, 2016
															<div class="tooltiptext">
																<h5>1 person wants to work your shift!</h5>
																<div class="content-hide">
																	<span class="comment">
																		<aside>Comment:</aside>
																		<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris decore cu eum,
																		mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
																		<div class="verificatio">
																			<div class="save-profl">
																				<a href="#">Accept and hide</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="yellow">Accept and Keep active</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="canl-btn">Decline</a>
																			</div>
																		</div>
																	</span>
																</div>
															</div>
														</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-eye-slash"></i>Hide</td>
														<td></td>
													</tr>
                                                    <tr>
														<td class="accept">May29, 2016
															<div class="tooltiptext">
																<h5>2 person wants to work your shift!</h5>
																<div class="content-hide">
																	<span class="comment">
																		<aside>Comment:</aside>
																		<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris decore cu eum,
																		mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
																		<div class="verificatio">
																			<div class="save-profl">
																				<a href="#">Accept and hide</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="yellow">Accept and Keep active</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="canl-btn">Decline</a>
																			</div>
																		</div>
																	</span>
																	<span class="comment">
																		<aside>Comment:</aside>
																		<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera. Viris decore cu eum,
																		mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
																		<div class="verificatio">
																			<div class="save-profl">
																				<a href="#">Accept and hide</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="yellow">Accept and Keep active</a>
																			</div>
																			<div class="save-profl">
																				<a href="#" class="canl-btn">Decline</a>
																			</div>
																		</div>
																	</span>
																</div>
															</div>
														</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-eye-slash"></i>Hide</td>
														<td></td>
													</tr>
													<tr class="expired">
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton show" data-href="url://"><i class="fa fa-eye"></i>Show</td>
														<td>Expired</td>
													</tr>
													<tr data-popup-open="find-offer" class="expired">
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton show" data-href="url://"><i class="fa fa-eye"></i>Show</td>
														<td>Expired</td>
													</tr>
													<tr data-popup-open="find-offer" class="expired">
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td class="inviton edit" data-href="url://"><i class="fa fa-pencil"></i>Edit</td>
														<td class="inviton thrsh" data-href="url://"><i class="fa fa-trash-o"></i>Delete</td>
														<td class="inviton show" data-href="url://"><i class="fa fa-eye"></i>Show</td>
														<td>Expired</td>
													</tr>
                                                </tbody>
                                            </table>
										<!--Start Pagination -->

												<div class="pagination">
													  <a href="#" class="prev"><i class="fa fa-long-arrow-left" ></i> Previous</a>
													  <span>
														  <a href="#">1</a>
														  <a class="active" href="#">2</a>
														  <a href="#">3</a>
														  <a href="#">4</a>
														  <a href="#">5</a>
														  <a href="#">6</a>
													  </span>
													  <a href="#" class="next">Next<i class="fa fa-long-arrow-right" ></i></a>
												</div>






                                        </div>
                                    </div>
								</div>
								</div>
                   		</div>
						<!-- Private-message -->
						<!-- plans and price -->
							<div class="show-div hidden" id="private-mesage">
								<div class="find-offer archive">
									<h2>Private Messages</h2>
									<div class="wrapper-chat">
										<div class="container-left">
											<div class="left">
												<ul class="people">
													<li class="person" data-chat="person1">
														<img src="<?php sboardCoreAssets('images', ['thomas.jpg'], 'admin'); ?>" alt="" />
														<span class="name">Thomas Bangalter</span>
														<span class="time">3</span>
														<span class="preview">I was wondering...</span>
													</li>
													<li class="person" data-chat="person2">
														<img src="<?php sboardCoreAssets('images', ['dog.png'], 'admin'); ?>" alt="" />
														<span class="name">Dog Woofson</span>
														<span class="time">5</span>
														<span class="preview">I've forgotten how it felt before</span>
													</li>
													<li class="person" data-chat="person3">
														<img src="<?php sboardCoreAssets('images', ['louis-ck.jpeg'], 'admin'); ?>" alt="" />
														<span class="name">Louis CK</span>
														<span class="time">2</span>
														<span class="preview">But we’re probably gonna need a new carpet.</span>
													</li>
													<li class="person" data-chat="person4">
														<img src="<?php sboardCoreAssets('images', ['bo-jackson.jpg'], 'admin'); ?>" alt="" />
														<span class="name">Bo Jackson</span>
														<span class="time">5</span>
														<span class="preview">It’s not that bad...</span>
													</li>
													<li class="person" data-chat="person5">
														<img src="<?php sboardCoreAssets('images', ['michael-jordan.jpg'], 'admin'); ?>" alt="" />
														<span class="name">Michael Jordan</span>
														<span class="time">0</span>
														<span class="preview">Wasup for the third time like is
									you blind bitch</span>
													</li>
													<li class="person" data-chat="person6">
														<img src="<?php sboardCoreAssets('images', ['drake.jpg'], 'admin'); ?>" alt="" />
														<span class="name">Drake</span>
														<span class="time">5</span>
														<span class="preview">howdoyoudoaspace</span>
													</li>
												</ul>
											</div>
											<div class="right">
												<div class="chat" data-chat="person1">
													<div class="conversation-start">
														<span>Thomas Bangalter</span>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="<?php sboardCoreAssets('images', ['thomas.jpg']); ?>" alt="" />
														</div>
														<div class="bubble you">
															Hello,
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="<?php sboardCoreAssets('images', ['thomas.jpg']); ?>" alt="" />
														</div>
														<div class="bubble you">
															it's me.
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="<?php sboardCoreAssets('images', ['thomas.jpg']); ?>" alt="" />
														</div>
														<div class="bubble you">
															I was wondering...
														</div>
													</div>

												</div>
												<div class="chat" data-chat="person2">
													<div class="conversation-start">
														<span>Dog Woofson</span>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/dog.png" alt="" />
														</div>
														<div class="bubble you">
															Hello, can you hear me?
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/dog.png" alt="" />
														</div>
														<div class="bubble you">
															I'm in California dreaming
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/thome.jpg" alt="" />
														</div>
														<div class="bubble me">
															... about who we used to be.
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/thome.jpg" alt="" />
														</div>
														<div class="bubble me">
															Are you serious?
														</div>
													</div>

													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/dog.png" alt="" />
														</div>
														<div class="bubble you">
															When we were younger and free...
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/dog.png" alt="" />
														</div>
														<div class="bubble you">
															I've forgotten how it felt before
														</div>
													</div>

												</div>
												<div class="chat" data-chat="person3">
													<div class="conversation-start">
														<span>Louis CK</span>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/louis-ck.jpeg" alt="" />
														</div>
														<div class="bubble you">
															Hey human!
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/louis-ck.jpeg" alt="" />
														</div>
														<div class="bubble you">
															Umm... Someone took a shit in the hallway.
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/client-sp.jpg" alt="" />
														</div>
														<div class="bubble me">
															... what.
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/client-sp.jpg" alt="" />
														</div>
														<div class="bubble me">
															Are you serious?
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/louis-ck.jpeg" alt="" />
														</div>
														<div class="bubble you">
															I mean....
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/louis-ck.jpeg" alt="" />
														</div>
														<div class="bubble you">
															It’s not that bad...
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/louis-ck.jpeg" alt="" />
														</div>
														<div class="bubble you">
															But we’re probably gonna need a new carpet.
														</div>
													</div>

												</div>
												<div class="chat" data-chat="person4">
													<div class="conversation-start">
														<span>Bo Jackson</span>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/client-sp.jpg" alt="" />
														</div>
														<div class="bubble me">
															Hey human!
														</div>
													</div>

													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/client-sp.jpg" alt="" />
														</div>
														<div class="bubble me">
															Umm... Someone took a shit in the hallway.
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/bo-jackson.jpg" alt="" />
														</div>
														<div class="bubble you">
															... what.
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/bo-jackson.jpg" alt="" />
														</div>
														<div class="bubble you">
															Are you serious?
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/client-sp.jpg" alt="" />
														</div>
														<div class="bubble me">
															I mean...
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/client-sp.jpg" alt="" />
														</div>
														<div class="bubble me">
															It’s not that bad...
														</div>
													</div>
												</div>
												<div class="chat" data-chat="person5">
													<div class="conversation-start">
														<span>Michael Jordan</span>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/michael-jordan.jpg" alt="" />
														</div>
														<div class="bubble you">
															Hello,
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/michael-jordan.jpg" alt="" />
														</div>
														<div class="bubble you">
															Wasup
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/michael-jordan.jpg" alt="" />
														</div>
														<div class="bubble you">
															I was wondering...
														</div>
													</div>


												</div>
												<div class="chat" data-chat="person6">
													<div class="conversation-start">
														<span>Drake</span>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/drake.jpg" alt="" />
														</div>
														<div class="bubble you">
															So, how's your new phone?
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/drake.jpg" alt="" />
														</div>
														<div class="bubble you">
															You finally have a smartphone :D
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/drake.jpg" alt="" />
														</div>
														<div class="bubble you">
															Why aren't you answering?
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/thome.jpg" alt="" />
														</div>
														<div class="bubble me">
															... about who we used to be.
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/thome.jpg" alt="" />
														</div>
														<div class="bubble me">
															Are you serious?
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/thome.jpg" alt="" />
														</div>
														<div class="bubble me">
															Drake?
														</div>
													</div>
													<div class="convert-timr oter">
														<div class="img-chat">
															<img src="image/thome.jpg" alt="" />
														</div>
														<div class="bubble me">
															Why aren't you answering?
														</div>
													</div>
													<div class="convert-timr">
														<div class="img-chat">
															<img src="image/drake.jpg" alt="" />
														</div>
														<div class="bubble you">
															howdoyoudoaspace
														</div>
													</div>
												</div>
												<div class="write">
													<a href="javascript:;" class="write-link attach"></a>
													<input type="text" />
													<a href="javascript:;" class="write-link smiley"></a>
													<a href="javascript:;" class="write-link send"></a>
												</div>
											</div>
										</div>
									</div>
								</div>
                     		</div>
							<!-- plans and price -->
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
                                                    <tr>
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td>King Crimson</td>
														<td class="inviton" data-href="url://"><i class="fa fa-repeat"></i>Repeat</td>
                                                    </tr>
													<tr>
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td>King Crimson</td>
														<td class="inviton" data-href="url://"><i class="fa fa-repeat"></i>Repeat</td>
                                                    </tr>
													<tr>
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td>King Crimson</td>
														<td class="inviton" data-href="url://"><i class="fa fa-repeat"></i>Repeat</td>
                                                    </tr>
													<tr>
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td>King Crimson</td>
														<td class="inviton" data-href="url://"><i class="fa fa-repeat"></i>Repeat</td>
                                                    </tr>
                                                    <tr>
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td>King Crimson</td>
														<td class="inviton" data-href="url://"><i class="fa fa-repeat"></i>Repeat</td>
                                                    </tr>
													<tr>
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td>King Crimson</td>
														<td class="inviton" data-href="url://"><i class="fa fa-repeat"></i>Repeat</td>
                                                    </tr>
													<tr>
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td>King Crimson</td>
														<td class="inviton" data-href="url://"><i class="fa fa-repeat"></i>Repeat</td>
                                                    </tr>
                                                    <tr>
														<td>May29, 2016</td>
														<td>7am-12am</td>
														<td>Shift swap</td>
														<td>King Crimson</td>
														<td class="inviton" data-href="url://"><i class="fa fa-repeat"></i>Repeat</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
								</div>
							</div>
                     		</div>
							<!-- archive-offer -->
							<div class="show-div hidden" id="plans-price">
								<div class="plans-offers">
									<h2>Plans & Prices</h2>
									<div class="offer-detl">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12 ">
												<div class="emal-deft">
													<div class="emal-blast">
														<h4>Email Blast</h4>
														<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera.
														Viris decore cu eum, mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
													</div>
													<div class="blast-rate">
														<h3>$5</h3>
														<a href="#" data-popup-open="email-blast" class="buy-blst">Buy Now</a>
													</div>
												</div>

											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera.
													Viris decore cu eum, mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>
										</div>
									</div>

								</div>
                     		</div>
							<!-- Faq -->
							<div class="show-div hidden" id="term-use">
								<div class="plans-offers">
									<h2>H1. Terms of Use</h2>
									<div class="faq-sec">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12 ">
												<p>Lorem ipsurn dolor sit amet, consectetur adipiscing elit. <a href"#">Fusce posuere nisl non ultricies sodales.</a> Donec luctus lectus ante, eget tempus dolor convallis non. <a href"#">Donec nec !list racuada,</a> ultricies est euismod, laoreet nunc. Pellentesque at mauris justo. Proin dignissim tellus nibh, quis volutpat odio mattisVi. Pellentesque odio mauris, tincidunt at commodo sit amet, fringilla vitae odio. Cras lobortis lectus vulputate accumsan rhoncus. Quisque sit amet vestibulum tellus. Nam luctus sollicitudin libero, quis lacinia enim laoreet nec. Ut ac iaculis risus, eget interdum orci. Integer dignissim feugiat suscipit. Donec vitae elementum nunc, eget rutrum odio.</p>
												<p>	Mauris lacinia orci tortor, vitae tincidunt tortor dapibus imperdiet. In gravida eleifend tincidunt. Proin dapibus sem nulla, sed dictum est porttitor et. Morbi molestie enim id aliquam facilisis. Integer id mattis purus. Vestibulum sagittis augue non feugiat facilisis. Nulla facilisi.</p>
												<h4>H2. Curabitur sit amet dui non sapien pulvinar tincidunt. In nunc est, aliquet at scelerisque in, accumsan et purus </h4>
												<ul>
													<li>Duis auctor odio nec leo egestas, ultricies euismod ex laoreet. Proin libero diam, pellentesque et cursus eget, molestie ut lacus. In sed metus leo.</li>
													<li>Cras sagittis, orci ac pellentesque mollis, fel s mauris placerat ante, at gravida metus est non arcu. Aenean eu interdum ante, vitae facilisis lectus. </li>
													<li>Fusce ultrices lacus vet mauris pharetra, sit amet semper ipsum semper. Nam sit amet condimentum diam, sed cursus urna. Quisque id lectus vitae orci varius laoreet. In tempor sagittis risus, nee convallis nibh convallis sed. Nam suscipit risus nec orci posuere volutpat.</li>
												</ul>
												<p>Sad suscipit eu metus eget rhoncus. Vestibulum suscipit tempor nibh a finibus. Sad sit amet sollicitudin at In ut orci leo. Quisque sed venenatis libero, ac rutrum ipsum. In sapien purus, maximus at quam quis, ullamcorper egestas lacus.</p>
												<ol>
													<li>Duis auctor odio nec leo egestas, ultricies euismod ex laoreet. Proin libero diam, pellentesque et cursus eget, molestie ut lacus. In sed metus leo. </li>
													<li>Cras sagittis, orci ac pellentesque mollis, felis mauris placerat ante, at gravida metus est non arcu. Aenean eu interdum ante, vitae facilisis lectus.</li>
													<li>Fusce ultrices lacus vet mauris pharetra, sit amet semper ipsum semper. Nam sit amet condimentum diam, sed cursus urna. Quisque id lectus vitae orci varius laoreet. In tempor sagittis risus, nee convallis nibh convallis sed. Nam suscipit risus nec orci posuere volutpat.</li>
												</ol>
												<h4 class="colo-drk">H3. Quisque consectetur purus vitae quam suscipit scelerisque. Praesent id consectetur nibh, id tempus ex </h4>
												<p>Donec rnauris dui, rutrurn eget aliquet sed, egestas rnalesuada tellus. Curn sociis natoque penatibus et rnagnis dis parturient montes </p>
												<h4 class="colo-blk">H4. NAM VENENATIS METUS QUIS FAUCIBUS ORNARE </h4>
												<p class="ilat-spc">The professional solar panel specialists can recommend the optimal variant with regard of such factors as the climate in your location, type of roof, nee. of your household, architectural specifics and aesthetic goals. </p>
												<table class="table-data-provider faq">
												<thead>
													<tr>
														<th scope="col">TITLE 1</th>
														<th scope="col">TITLE 2</th>
														<th scope="col">TITLE 3</th>
														<th scope="col">TITLE 4</th>

													</tr>
												</thead>
                                                <tbody>
                                                    <tr>
														<td>Cell with text block</td>
														<td>Cell</td>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
                                                    </tr>
													<tr>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
                                                    </tr>
													<tr>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
                                                    </tr>
													<tr>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
														<td>Cell with text Cell with text block block </td>
                                                    </tr>
                                                </tbody>
                                            </table>
											<p>Excellent perforrnance of our residential solar panels is guaranteed. Solar panels for horne have proven to be reliable and will serve for at least 25 years with the sarne output of energy. The product is airned at durable use and brings to the econorny in the long terrn. </p>









											</div>
										</div>
									</div>


								</div>
                     		</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </section>
    <!-- ------------member-list popup-------------- -->
		<div class="invention" data-popup="invetion-popup">
			<div class="popup-strutre">
				<div class="john-whit clearfix">
					<div class="left-cont">
						<h3>John White</h3>
						<p><strong>Position:</strong> Airport Customer Service Agent</p>
						<p><strong>Email:</strong> jownwhite@gmail.com</p>
					</div>
					<div class="right-img">
						<img src="image/john-white.png" alt="" class="img-responsive" />
					</div>
					<p>As a Customer Service Agent,  you will be an important part of our customers' travel experience. You 'll assist customer with
					check-in, boarding/de-boarding our bus to/from Houston, and addressing questions related to checked baggages. In this role, it's vital
					to create a welcoming environment for our customers.
					</p>
					<div class="form-group trms">
						<input type="checkbox" name="term" value="term" id="term">
						<label for="term"> Give Administrator Permissions</label>
					</div>
					<div class="verificatio">
						<div class="save-profl">
							<a href="#"><i class="fa fa-paper-plane-o"></i>Resend Invitation</a>
						</div>
						<div class="save-profl">
							<a href="#" class="yellow"><i class="fa fa fa-comments"></i>Send Message</a>
						</div>
						<div class="save-profl">
							<a href="#" class="canl-btn"><i class="fa fa-trash-o"></i>Delete user</a>
						</div>
					</div>
				</div>
				<a class="john-close" data-popup-close="invetion-popup" href="#">x</a>
			</div>
		</div>
				<!-- ------------Find-offer popup-------------- -->
		<div class="invention offer" data-popup="find-offer">
			<div class="popup-strutre">
				<div class="john-whit clearfix">
					<div class="left-cont">
						<h3>Airport Customer Service Agent</h3>
					</div>
					<p>As a Customer Service Agent,  you will be an important part of our customers' travel experience. You 'll assist customer with
					check-in, boarding/de-boarding our bus to/from Houston, and addressing questions related to checked baggages. In this role, it's vital
					to create a welcoming environment for our customers.
					</p>
					<div class="offer-swswp clearfix">
						<span>
							<strong>Offer shift swap</strong>
							<p>May 29, 2016 </p>
							<p>7am-12pm</p>
						</span>
						<span>
							<strong>Location</strong>
							<p>Dallas-Fort Worth Airport (DWF)</p>
						</span>
					</div>
					<form>
						<div class="form-group offertxt clearfix">
							<label for="term">Your comment</label>
							<textarea></textarea>
						</div>
						<div class="form-group search clearfix">
							<button type="submit" class="accept">Accept</button>
						</div>
					</form>
				</div>
				<a class="john-close" data-popup-close="find-offer" href="#">x</a>
			</div>
		</div>
				<!-- ------------email-blast popup-------------- -->
		<div class="invention offer" data-popup="email-blast">
			<div class="popup-strutre">
				<div class="blasstt" clearfix">
					<h3>Email Blast</h3>
					<p>Lorem ipsum dolor sit amet, est ei doming perfecto iudicabit. Ius an probo debitis admodum, mazim omittantur sea ne, ei his eros dicit altera.
						Viris decore cu eum, mea id modus petentium voluptatum. Amet abhorreant mei ad, eum</p>

					<div class="sub-hom">
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
							<li>
								<span class="straw">
									<input type="checkbox">
									<h5>May,2016</h5>
								</span>
								<span class="straw">
									<h5>7am-12am</h5>
								</span>
								<span class="straw">
									<h5>Shift Type</h5>
								</span>
							</li>
							<li>
								<span class="straw">
									<input type="checkbox">
									<h5>May,2016</h5>
								</span>
								<span class="straw">
									<h5>7am-12am</h5>
								</span>
								<span class="straw">
									<h5>Shift Type</h5>
								</span>
							</li>
							<li>
								<span class="straw">
									<input type="checkbox">
									<h5>May,2016</h5>
								</span>
								<span class="straw">
									<h5>7am-12am</h5>
								</span>
								<span class="straw">
									<h5>Shift Type</h5>
								</span>
							</li>
							<li>
								<span class="straw">
									<input type="checkbox">
									<h5>May,2016</h5>
								</span>
								<span class="straw">
									<h5>7am-12am</h5>
								</span>
								<span class="straw">
									<h5>Shift Type</h5>
								</span>
							</li>
						</ul>

                    </div>
					<a href="#" class="buy-pop">Buy and Send</a>

				</div>
				<a class="john-close" data-popup-close="email-blast" href="#">x</a>
			</div>
		</div>
		<!-- ----profle-popup-- -->
		<div class="popup" data-popup="sign-popup">
			<div class="popup-inner">
				<div class="dash-pop clearfix">
					<div class="pop-aprt">
						<!-- create-form -->
						<div class="create-form joingroup">
							<div class="profile-detal">
								<h3>My Profile</h3>
								<div class="file-upload">
									<div class="file-select textfield pass">
										<div class="file-select-button" id="fileName"><i class="fa fa-camera"></i></div>
										<div class="file-select-name" id="noFile">No file chosen...</div>
											<input type="file" name="chooseFile" id="chooseFile">
									</div>
								</div>
							</div>
							<form name="htmlform" method="post" action="toyousender.php">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="name">First Name</label>
											<input type="text" id="First-name" required />
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="Last-name">Last Name</label>
											<input type="text" id="last-name" required />
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="email">Email</label> <input type="text" id="email" required />
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="telphone">Phone Number</label>
											<input type="tel" id="telphone" required />
										</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label for="Position">Position</label>
											<select>
												<option>Here is the unstyled select box</option>
												<option>The second option</option>
												<option>The third option</option>
											</select>
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="Position">Location</label>
											<select>
												<option>Here is the unstyled select box</option>
												<option>The second option</option>
												<option>The third option</option>
											</select>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="Identification">Employee Identification Number</label>
											<input type="text" id="Identification" required />
										</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label for="message">Short job Description</label>
											<textarea name="comments" id="message"></textarea>
										</div>
									</div>
								</div>
								<div class="form-group">
								<button type="button" class="submit save">Save</button>
								<button type="button" class="submit">Cancel</button>
								</div>
							</form>
						</div>
					</div>
					<div class="retun-step">
						<div class="form-fild third profle ">
							<h4>Change Password</h4>
							<form name="htmlform" method="post" action="toyousender.php">
								<div class="profl-cret">
									<label for="current">Current Passsword</label>
									<input type="text" id="current" required="">
								</div>
								<div class="profl-cret">
									<label for="password">Password</label>
									<input type="password" id="password" required="">
								</div>
								<div class="profl-cret">
									<button type="button" class="submit ">Change</button>
								</div>

							</form>
						</div>
					</div>
				</div>
				<a class="popup-close" data-popup-close="sign-popup" href="#">x</a>
			</div>
		</div>
	<!-- ----FAQ-popup-- -->
		<div class="faq-popup" data-popup="faq-popup">
			<div class="faq-inner">
				<div class="bg-blufaq">
						<div class="faq-question">
							<h4>FAQ</h4>
								<ul class="dashboardlist" id="style-3">
                                    <li><a href="#window1" class="tbntabs">How do I find my Windows product key?</a></li>
                                    <li><a href="#window2" class="tbntabs">My Windows 7 product key won't verify. What's the problem? </a></li>
                                    <li><a href="#window3" class="tbntabs">I bought Windows 7 through a website. After talking to the merchant, I was told I had a "system builder" product key. Why doesn't that work?</a></li>
                                    <li><a href="#window4" class="tbntabs">I purchased my copy of Windows > through a university. Can I download it here?</a></li>
									<li><a href="#window5" class="tbntabs">I'm running a Mac and get an error message when I click Download Tool Now. What's wrong?</a></li>
                                    <li><a href="#window6" class="tbntabs">Windows came pre-installed on my device, can I use media from this site to download and install? </a></li>
									<li><a href="#window7" class="tbntabs">I bought Windows 7 through a website. After talking to the merchant, I was told I had a "system builder" product key. Why doesn't that work?</a></li>
                                    <li><a href="#window8" class="tbntabs">I purchased my copy of Windows > through a university. Can I download it here?</a></li>
									<li><a href="#window9" class="tbntabs">My Windows 7 product key won't verify. What's the problem? </a></li>
                                    <li><a href="#window10" class="tbntabs">I bought Windows 7 through a website. After talking to the merchant, I was told I had a "system builder" product key. Why doesn't that work?</a></li>
                                    <li><a href="#window11" class="tbntabs">I purchased my copy of Windows > through a university. Can I download it here?</a></li>
									<li><a href="#window12" class="tbntabs">I'm running a Mac and get an error message when I click Download Tool Now. What's wrong?</a></li>
                                    <li><a href="#window13" class="tbntabs">Windows came pre-installed on my device, can I use media from this site to download and install? </a></li>
									<li><a href="#window14" class="tbntabs">I bought Windows 7 through a website. After talking to the merchant, I was told I had a "system builder" product key. Why doesn't that work?</a></li>
                                    <li><a href="#window15" class="tbntabs">I purchased my copy of Windows > through a university. Can I download it here?</a></li>

								</ul>

						</div>
					</div>
				<div class="whirt-abnser clearfix">
					<div class="dashboard-content">
                        <div class="hidden-div">
                            <div class="faq_div" id="window1">
								<div class="location-detail-sec">
                                    <h4>How do I find my Windows product key?</h4>
									<aside>Windows 8.1 and Windows 10 </aside>
									<p>The product key is located inside the product packaging, on the receipt or confirrnation page for a digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content. </p>
									<aside>Windows 7 </aside>
									<p>The product key is located inside the box that the Windows DVD carne in, on the DVD, on the receipt or confirrnation page two digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.</p>
									<aside>Academic Products </aside>
									<p>Your product key is located on the receipt page when you purchase or in the Order History section of the WebStore from which you ordered the software</p>
									<p>Devices Pre-Installed with Windows </p>
									<p>Before using operating system copies from this site for install,</p>
                                </div>
                            </div>
                             <div class="faq_div" id="window2">
								<div class="location-detail-sec">
                                    <h4>My Windows 7 product key won't verify. What's the problem? </h4>
									<aside>Windows 8.1 and Windows 10 </aside>
									<p>The product key is located inside the product packaging, on the receipt or confirrnation page for a digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content. </p>
									<aside>Windows 7 </aside>
									<p>The product key is located inside the box that the Windows DVD carne in, on the DVD, on the receipt or confirrnation page two digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.</p>
									<aside>Academic Products </aside>
									<p>Your product key is located on the receipt page when you purchase or in the Order History section of the WebStore from which you ordered the software</p>
									<p>Devices Pre-Installed with Windows </p>
									<p>Before using operating system copies from this site for install,</p>
                                </div>
                            </div>
                             <div class="faq_div" id="window3">
								<div class="location-detail-sec">
                                    <h4>I bought Windows 7 through a website. After talking to the merchant, I was told I had a "system builder" product key. Why doesn't that work?</h4>
									<aside>Windows 8.1 and Windows 10 </aside>
									<p>The product key is located inside the product packaging, on the receipt or confirrnation page for a digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content. </p>
									<aside>Windows 7 </aside>
									<p>The product key is located inside the box that the Windows DVD carne in, on the DVD, on the receipt or confirrnation page two digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.</p>
									<aside>Academic Products </aside>
									<p>Your product key is located on the receipt page when you purchase or in the Order History section of the WebStore from which you ordered the software</p>
									<p>Devices Pre-Installed with Windows </p>
									<p>Before using operating system copies from this site for install,</p>
                                </div>
                            </div>
                            <div class="faq_div" id="window4">
								<div class="location-detail-sec">
                                    <h4>How do I find my Windows product key?</h4>
									<aside>Windows 8.1 and Windows 10 </aside>
									<p>The product key is located inside the product packaging, on the receipt or confirrnation page for a digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content. </p>
									<aside>Windows 7 </aside>
									<p>The product key is located inside the box that the Windows DVD carne in, on the DVD, on the receipt or confirrnation page two digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.</p>
									<aside>Academic Products </aside>
									<p>Your product key is located on the receipt page when you purchase or in the Order History section of the WebStore from which you ordered the software</p>
									<p>Devices Pre-Installed with Windows </p>
									<p>Before using operating system copies from this site for install,</p>
                                </div>
                            </div>
							 <div class="faq_div" id="window5">
								<div class="location-detail-sec">
                                    <h4>How do I find my Windows product key?</h4>
									<aside>Windows 8.1 and Windows 10 </aside>
									<p>The product key is located inside the product packaging, on the receipt or confirrnation page for a digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content. </p>
									<aside>Windows 7 </aside>
									<p>The product key is located inside the box that the Windows DVD carne in, on the DVD, on the receipt or confirrnation page two digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.</p>
									<aside>Academic Products </aside>
									<p>Your product key is located on the receipt page when you purchase or in the Order History section of the WebStore from which you ordered the software</p>
									<p>Devices Pre-Installed with Windows </p>
									<p>Before using operating system copies from this site for install,</p>
                                </div>
                            </div>
                            <div class="faq_div" id="window6">
								<div class="location-detail-sec">
                                    <h4>How do I find my Windows product key?</h4>
									<aside>Windows 8.1 and Windows 10 </aside>
									<p>The product key is located inside the product packaging, on the receipt or confirrnation page for a digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content. </p>
									<aside>Windows 7 </aside>
									<p>The product key is located inside the box that the Windows DVD carne in, on the DVD, on the receipt or confirrnation page two digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.</p>
									<aside>Academic Products </aside>
									<p>Your product key is located on the receipt page when you purchase or in the Order History section of the WebStore from which you ordered the software</p>
									<p>Devices Pre-Installed with Windows </p>
									<p>Before using operating system copies from this site for install,</p>
                                </div>
                            </div>
							 <div class="faq_div" id="window7">
								<div class="location-detail-sec">
                                    <h4>How do I find my Windows product key?</h4>
									<aside>Windows 8.1 and Windows 10 </aside>
									<p>The product key is located inside the product packaging, on the receipt or confirrnation page for a digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content. </p>
									<aside>Windows 7 </aside>
									<p>The product key is located inside the box that the Windows DVD carne in, on the DVD, on the receipt or confirrnation page two digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.</p>
									<aside>Academic Products </aside>
									<p>Your product key is located on the receipt page when you purchase or in the Order History section of the WebStore from which you ordered the software</p>
									<p>Devices Pre-Installed with Windows </p>
									<p>Before using operating system copies from this site for install,</p>
                                </div>
                            </div>
							 <div class="faq_div" id="window8">
								<div class="location-detail-sec">
                                    <h4>How do I find my Windows product key?</h4>
									<aside>Windows 8.1 and Windows 10 </aside>
									<p>The product key is located inside the product packaging, on the receipt or confirrnation page for a digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content. </p>
									<aside>Windows 7 </aside>
									<p>The product key is located inside the box that the Windows DVD carne in, on the DVD, on the receipt or confirrnation page two digital purchase or in a confirmation e-rnail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.</p>
									<aside>Academic Products </aside>
									<p>Your product key is located on the receipt page when you purchase or in the Order History section of the WebStore from which you ordered the software</p>
									<p>Devices Pre-Installed with Windows </p>
									<p>Before using operating system copies from this site for install,</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				</div>
				<a class="popup-close" data-popup-close="faq-popup" href="#">x</a>
			</div>
		</div>

		<footer class="help-suprt dashbrd">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="proble">
							<div class="pro-size" >
								<p>Any probelms? <a href="#"> We can help</a></p>
							</div>
							<div class="emal-part tabs_div">
								<a href="#term-use">Terms of Use</a>
							</div>
							<div class="emal-part">
								<p>Developed by <a href="#"> WhatAsoft</a></p>
							</div>
							<div class="social-icons">
								<a href="javascript:void(0)" title="Facebook" class="fa fa-facebook"></a>
								<a href="javascript:void(0)" title="Twitter" class="fa fa-twitter"></a>
								<a href="javascript:void(0)" title="youtube" class="fa fa-youtube-play"></a>
							</div>
						</div>
					</div>

				</div>

			</div>

		</footer>
		<?php sboardCoreAssets('js', ['bootstrap.min.js', 'wow.min.css', 'app.js']); ?>
		<?php wp_footer(); ?>
	</body>
</html>
