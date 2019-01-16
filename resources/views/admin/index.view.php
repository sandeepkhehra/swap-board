<?php
global $user_ID;

$title = $this->template->title;
$companyData = $this->template->model->withOne('sboard_companies', 'userID', $user_ID);
! empty( ( array ) $companyData ) ?: wp_redirect( get_site_url() ); /** Rare case */

$positions = isset( $companyData->positions ) ? unserialize($companyData->positions) : [];
$locations = isset( $companyData->positions ) ? unserialize($companyData->locations) : [];
$offers = $this->template->model->with('sboard_offers', 'userID', $user_ID)->sboard_offers;
$membersData = (object) $this->template->model->with('sboard_members', 'companyID', $companyData->id)->sboard_members;

sboardInclude('admin._header', compact('title', 'companyData', 'user_ID')); ?>
    <section class="sb-user-admin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="sidebar">
							<div class="specier-name">
								<h5><?php echo get_userdata( $user_ID )->display_name; ?></h5>
							</div>
							<div class="close-btn sidebarCollapse"></div>

							<?php sboardInclude('admin._menus'); ?>
                        </div>

                        <div id="content">
							<?php sboardInclude('admin._companyProfile', compact('companyData')); ?>

							<?php sboardInclude('admin._membersList', compact('membersData')); ?>

							<?php sboardInclude('admin._inviteMembers', compact('companyData')); ?>

							<?php sboardInclude('admin._findOffer', compact('companyData', 'positions', 'locations', 'user_ID')); ?>

							<?php sboardInclude('admin._makeOffer', compact('companyData', 'user_ID')); ?>

							<?php sboardInclude('admin._myOffers', compact('companyData', 'offers')); ?>

							<!-- <div class="show-div hidden" id="private-mesage">
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
                     		</div> -->

							<?php sboardInclude('admin._archiveOffers', compact('offers')); ?>

							<?php sboardInclude('admin._plansPrice'); ?>

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
				<!-- ------------Find-offer popup-------------- -->
		<div class="invitation offer" data-popup="find-offer">
			<div class="popup-structure">
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
		<div class="invitation offer" data-popup="email-blast">
			<div class="popup-structure">
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

<?php sboardInclude('admin._footer'); ?>
