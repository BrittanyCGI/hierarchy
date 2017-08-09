<?php 
				$ELLtier2 = get_posts( 
						array(
						 'post_type' => 'employee',
						 'supervisor' => 'ell-pres',
						 'posts_per_page'=>-1,
					));
					foreach($ELLtier2 as $employee){
						
						$meta = get_metadata('post', $employee->ID);
						$job_title = $meta['employee_title_title'][0];
						
						


					    $slug=$employee->post_name;
					    $supervisees = get_posts( 
							array(
							 'post_type' => 'employee',
							 'supervisor' => "$slug",
							 'posts_per_page'=>-1,
						));


						$sales_execs = array();
						$acct_execs = array();
						$sales_mgr = array();
						$sales_team_leaders = array();


						foreach ($supervisees as $post ) {
							$position = employee_title_get_meta( 'employee_title_title');
							if ($position == 'Sales Executive') {
								array_push($sales_execs, $post);
							} elseif ($position == 'Account Executive') {
								array_push($acct_execs, $post);
							} elseif ($position == 'Sales Manager') {
								array_push($sales_mgr, $post);
							} elseif ($position == 'Sales Associate Team Leader') {
								array_push($sales_team_leaders, $post);
							}
						} // end foreach supervisees loop

							if (empty($sales_mgr) && empty($sales_execs) && empty($acct_execs) && empty($sales_team_leaders)) : ?>
								<div class="row branch flex">
									<div class="col-sm-3 col-xs-5 tier-2 flex flex-col no-children">
										<h3><?php echo get_the_title($employee);?></h3>
										<h4 class="heading"><?php echo $job_title ?></h4>
									</div>
									<div class="col-sm-9 col-xs-7 tier-3-4">
							<!-- if tier 2 has no children, this adds no-children class to remove :after line -->

							<?php elseif ($job_title == "ELL Sales Associate Manager") : ?>

								<div class="row branch flex">
									<div class="col-xs-1 col-sm-3 tier-2 flex flex-col empty"></div>
									<div class="col-xs-4 tier-2 ell-manager">
										<h4> <?php echo get_the_title($employee);?></h4>
										<h5 class="heading"><?php echo $job_title ?></h5>
									</div>
									<div class="col-xs-7 col-sm-6 tier-3-4">
								
											
											
												<?php if (!empty($sales_team_leaders)) {
													foreach($sales_team_leaders as $employee): ?>
														<?php 
														    $slug=$employee->post_name;
														    $sales_assc_slug=$slug;
														    $sales_assc = get_posts( 
																array(
																 'post_type' => 'employee',
																 'supervisor' => "$sales_assc_slug",
																 'posts_per_page'=>-1,
															));
														?>
												<div class="flex tier-x">
													<div class="col-sm-3 col-xs-3 tier-3 empty"></div>
													<div class="col-sm-9 col-xs-9 tier-4 sales-execs">
														<h4> <?php echo get_the_title($employee);?> : <span class="sub-heading">Sales Associate Team Leader</span></h4> 
														<h5 class="heading group-heading">Sales Associates</h5>
														<ul>
															<?php foreach($sales_assc as $employee): ?>
																<h4><?php echo get_the_title($employee); ?></h4>
															<?php endforeach; ?>
														</ul>
													</div>
												</div>
												
										<?php endforeach;} ?> <!-- endif sales team leaders + sales assc. section -->
											

							<?php else : ?>
								<div class="row branch flex">
									<div class="col-sm-3 col-xs-4 tier-2 flex flex-col">
										<h3><?php echo get_the_title($employee);?></h3>
										<h4 class="heading"><?php echo $job_title ?></h4>
									</div>
									<div class="col-sm-9 col-xs-8 tier-3-4">
							<?php endif; ?>

							
							<!-- SALES EXECUTIVES -->
							<?php if (!empty($sales_execs)) :?>
								<div class="flex tier-x">
									<div class="col-xs-4 tier-3 empty"></div>
									<div class="col-xs-6 col-sm-4 tier-4 sales-execs">
										<h5 class="heading group-heading">Sales Executives</h5>
										<ul>
											<?php 
												foreach($sales_execs as $employee): ?>
														<h4><?php echo get_the_title($employee);?>	</h4>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="col-xs-2 col-sm-4 blank"></div>
								</div>
							<?php endif; ?><!-- endif sales execs section -->
							
							

							<!-- ACCT EXECUTIVES -->
							<?php if (!empty($acct_execs)) :?>
								<div class="flex tier-x">
									<div class="col-xs-4 tier-3 empty"></div>
									<div class="col-sm-4 col-xs-6 tier-4 acct-execs">
										<h5 class="heading group-heading">Account Executives</h5>
											<ul>
												<?php 
													foreach($acct_execs as $employee): ?>
														<h4> <?php echo get_the_title($employee);?></h4>
												<?php endforeach; ?>
											</ul>
									</div>
									<div class="col-xs-2 col-sm-4 blank"></div>
								</div>
							<?php endif; ?><!-- endif acct execs section -->
							
							

							<!-- SALES MANAGER + ACCOUNT EXECUTIVES -->
							<?php if (!empty($sales_mgr)) {
								foreach($sales_mgr as $employee): ?>
									<?php 
									    $slug=$employee->post_name;
									    $acct_execs_slug=$slug;
									    $acct_execs = get_posts( 
											array(
											 'post_type' => 'employee',
											 'supervisor' => "$acct_execs_slug",
											 'posts_per_page'=>-1,
										));
									?>
									<div class="flex tier-x">
										<div class="col-xs-4 tier-3 sales-mgr">
												<h4> <?php echo get_the_title($employee);?></h4>
												<h5 class="heading">Sales Manager</h5>	
										</div>
										<div class="col-xs-6 col-sm-4 tier-4 acct-execs">
											<h5 class="heading group-heading">Account Executives</h5>
											<ul>
											<?php foreach($acct_execs as $employee): ?>
												<h4><?php echo get_the_title($employee); ?></h4>
											<?php endforeach; ?>
											</ul>
										</div>
										<div class="col-xs-2 col-sm-4 blank"></div>
									</div>
							<?php endforeach;} ?><!-- endif sales manager + account execs section -->


							<!-- SALES ASSC. TEAM LEADERS + SALES ASSOCIATES -->
							


						</div> <!-- closing tag for tier-3-4 -->
					</div><!-- closing tag for row branch -->
				<?php }; ?> <!-- end foreach ELLtier2 employee (outermost loop)-->