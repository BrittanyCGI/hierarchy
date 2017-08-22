<?php 

	$ELLtier2 = get_employees('ell-pres');

		foreach($ELLtier2 as $employee){
			
			$meta = get_metadata('post', $employee->ID);
			$job_title = $meta['employee_title_title'][0];
		    $slug=$employee->post_name;
		    $supervisees = get_employees($slug);


			$sales_execs = array();
			$acct_execs = array();
			$sales_mgr = array();
			$sales_team_leaders = array();
			$mrkt_execs = array();
			$mrkt_assc = array();
			$misc_tier3 = array();
			$resrch = array();


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
				} elseif ($position == 'Marketing Executive') {
					array_push($mrkt_execs, $post);
				} elseif ($position == 'Marketing Associate') {
					array_push($mrkt_assc, $post);
				}  else {
					array_push($misc_tier3, $post);
				}
			} // end foreach supervisees loop - add employees to arrays by job title

				if(strpos($job_title, 'Vice President') !== false) : ?>

					<?php if (empty($sales_mgr) && empty($sales_execs) && empty($acct_execs) && empty($sales_team_leaders) && empty($mrkt_assc) && empty($mrkt_execs)): ?>
					<div class="row branch flex">
						<div class="col-sm-3 col-xs-5 tier-2 flex flex-col no-children">
							<h3><?php echo get_the_title($employee);?> <a href="../#<?php echo $slug ?>"><i class="fa fa-info-circle"></i></a></h3>
							<h4 class="heading"><?php echo $job_title ?></h4>
						</div>
						<div class="col-sm-9 col-xs-7 tier-3-4">
				<!-- if tier 2 has no children, this adds no-children class to remove :after line -->
				
					<?php else : ?>
					<div class="row branch flex">
						<div class="col-sm-3 col-xs-4 tier-2 flex flex-col">
							<h3><?php echo get_the_title($employee);?> <a href="../#<?php echo $slug ?>"><i class="fa fa-info-circle"></i></a></h3>
							<h4 class="heading"><?php echo $job_title ?></h4>
						</div>
						<div class="col-sm-9 col-xs-8 tier-3-4">
					<?php endif; ?>


					<!-- SALES EXECUTIVES -->
					<?php execs($sales_execs, 'Sales Executives') ?>

					<!-- ACCT EXECUTIVES -->
					<?php execs($acct_execs, 'Account Executives') ?>

					<!-- MRKT EXECUTIVES -->
					<?php execs($mrkt_execs, 'Marketing Executives') ?>

					<!-- MRKT ASSOCIATES -->
					<?php assc($mrkt_assc, 'Marketing Associates') ?>
					
					<!-- MISC TIER 3 -->
					<?php misc($misc_tier3) ?>

					<!-- SALES MANAGER + ACCOUNT EXECUTIVES -->
					<?php if (!empty($sales_mgr)) {
						foreach($sales_mgr as $employee): 
							    $slug=$employee->post_name;
							    $acct_execs_slug=$slug;
							    $acct_execs = get_employees($acct_execs_slug);
							?>
							<div class="flex tier-3-4-row">
								<div class="col-xs-4 tier-3 sales-mgr">
										<h4> <?php echo get_the_title($employee);?><a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h4>
										<h5 class="heading">Sales Manager</h5>	
								</div>
								<div class="col-xs-6 col-sm-4 tier-4 acct-execs">
									<h5 class="heading group-heading">Account Executives</h5>
									<ul>
									<?php get_name($acct_execs) ?>
									</ul>
								</div>
								<div class="col-xs-2 col-sm-4 blank"></div>
							</div>
					<?php endforeach;} ?><!-- endif sales manager + account execs section -->













				<?php elseif ($job_title == 'Researcher') : ?> 
					<div class="row branch flex">
						<div class="col-xs-7 col-sm-8 tier-2 flex flex-col empty"></div>
						<div class="col-xs-5 col-sm-4 tier-3-4">
							<div class="flex tier-3-4-row">
								<div class="col-xs-12 tier-4 sales-execs">
									<h4> <?php echo get_the_title($employee);?> <a href="../#<?php echo $slug ?>"><i class="fa fa-info-circle"></i></a></h4>
									<h5 class="heading"><?php echo $job_title ?></h5>
								</div>
							</div>

				<?php elseif (get_the_title($employee) == 'Marcello Piergrossi') : ?> 
					<div class="row branch flex">
						<div class="col-xs-4 col-sm-3 tier-2 flex flex-col empty"></div>
						<div class="col-xs-8 col-sm-9 tier-3-4">
							<div class="flex tier-3-4-row">
								<div class="col-xs-4 tier-3 empty"></div>
								<div class="col-xs-6 col-sm-4 tier-4 execs">
									<h4> <?php echo get_the_title($employee);?> <a href="../#<?php echo $slug ?>"><i class="fa fa-info-circle"></i></a></h4>
									<h5 class="heading"><?php echo $job_title ?></h5>
								</div>
								<div class="col-xs-2 col-sm-4 blank"></div>
							</div>





				<?php elseif ($job_title == "ELL Sales Associate Manager") : ?>

					<div class="row branch flex">
						<div class="col-xs-1 col-sm-3 tier-2 flex flex-col empty"></div>
						<div class="col-xs-4 tier-2 ell-manager">
							<h4> <?php echo get_the_title($employee);?> <a href="../#<?php echo $slug ?>"><i class="fa fa-info-circle"></i></a></h4>
							<h5 class="heading"><?php echo $job_title ?></h5>
						</div>
						<div class="col-xs-7 col-sm-6 tier-3-4">
							<?php if (!empty($sales_team_leaders)) {
								foreach($sales_team_leaders as $employee): 
									    $slug=$employee->post_name;
									    $sales_assc_slug=$slug;
									    $sales_assc = get_employees($sales_assc_slug);
									?>
									<div class="flex tier-3-4-row">
										<div class="col-sm-3 col-xs-3 tier-3 empty"></div>
										<div class="col-sm-9 col-xs-9 tier-4 sales-execs">
											<h4> <?php echo get_the_title($employee);?> : <span class="sub-heading">Sales Associate Team Leader</span> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h4> 
											<h5 class="heading group-heading">Sales Associates</h5>
											<ul>
												<?php get_name($sales_assc) ?>
											</ul>
										</div>
									</div>
							
								<?php endforeach;} ?> <!-- endif sales team leaders + sales assc. section -->
								
				
						

				
				<?php endif; ?>

				



					<!-- SALES ASSC. TEAM LEADERS + SALES ASSOCIATES -->
					


				</div> <!-- closing tag for tier-3-4 -->
			</div><!-- closing tag for row branch -->
		<?php }; 



	?> <!-- end foreach ELLtier2 employee (outermost loop)-->