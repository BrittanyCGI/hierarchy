<?php 
	$ELLtier2 = get_employees('ell-pres'); // finds all employees supervised by forys
		foreach($ELLtier2 as $employee){
			// this loop gets data for ELLtier2 employee, finds all supervisees, and creates arrays to store their supervisees
			$meta = get_metadata('post', $employee->ID);
			$job_title = $meta['employee_title_title'][0];
		    $slug=$employee->post_name;
		    $supervisees = get_employees($slug); // gets all supervisees

		    // empty arrays to store specific groups later on, these are going to be refreshed and will contain different data for each tier2 employee
			$sales_execs = array();
			$acct_execs = array();
			$sales_mgr = array();
			$sales_team_leaders = array();
			$mrkt_execs = array();
			$mrkt_assc = array();
			$misc_tier3 = array();
			$resrch = array();

			foreach ($supervisees as $post ) {
				// gets job title for each supervisee and determines which array they belong in
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
			} // end foreach supervisees loop 

			?>
			<div class="row branch flex">

				<?php if ($job_title == 'Researcher') : 
				// unique role kind of on its own, researchers are lined up at the very bottom tier, so empty div is xs-7
				?> 
					<div class="col-xs-7 col-sm-8 tier-2 flex flex-col empty"></div>
					<div class="col-xs-5 col-sm-4 tier-3-4">
						<div class="flex tier-3-4-row">
							<div class="col-xs-12 tier-4 sales-execs">
								<?php get_name3($employee, $slug, $job_title); ?>
							</div>
							<div class="col-xs-0 blank"></div>
						</div>

				<?php elseif ($job_title == 'Special Projects') : 
				// another unique role, lined up with third tier so empty div is xs-4
				?> 
					
					<div class="col-xs-4 col-sm-3 tier-2 flex flex-col empty"></div>
					<div class="col-sm-9 col-xs-8 tier-3-4">
						<div class="flex tier-3-4-row">
							<div class="col-xs-6 col-sm-4 tier-4">
								<?php get_name3($employee, $slug, $job_title); ?>
							</div>
							<div class="col-xs-6 col-sm-8 blank"></div>
						</div>				

				<?php elseif (get_the_title($employee) == 'Marcello Piergrossi') : 
				// unique role, lined up with 4th tier all on its own
				?> 
					
					<div class="col-xs-4 col-sm-3 tier-2 flex flex-col empty"></div>
					<div class="col-xs-8 col-sm-9 tier-3-4">
						<div class="flex tier-3-4-row">
							<div class="col-xs-4 tier-3 empty"></div>
							<div class="col-xs-6 col-sm-4 tier-4 execs">
								<?php get_name3($employee, $slug, $job_title); ?>
							</div>
							<div class="col-xs-2 col-sm-4 blank"></div>
						</div>


				<?php elseif (empty($sales_mgr) && empty($sales_execs) && empty($acct_execs) && empty($sales_team_leaders) && empty($mrkt_assc) && empty($mrkt_execs)): 
				// if tier 2 employee has no supervisees, needs class no-children to remove :after line, adds empty div to fill space after
				?>
					
					<div class="col-sm-3 col-xs-5 tier-2 flex flex-col no-children">
						<?php get_name2($employee, $slug, $job_title); ?>
					</div>
					<div class="col-sm-9 col-xs-7 tier-3-4">


				<?php elseif ($job_title == "ELL Sales Associate Manager") : 
				// unique layout for sales associates
				// manager is in line with tier 3, not VPs, so first div is empty
				?>

					
					<div class="col-xs-1 col-sm-3 tier-2 flex flex-col empty"></div>
					<div class="col-xs-4 tier-2 ell-manager">
						<?php get_name3($employee, $slug, $job_title); ?>
					</div>
					<div class="col-xs-7 col-sm-6 tier-3-4">
						<?php if (!empty($sales_team_leaders)) {
							// finds all supervisees (sales associates) for each sales associate team leader
							foreach($sales_team_leaders as $employee): 
								    $slug=$employee->post_name;
								    $sales_assc_slug=$slug;
								    $sales_assc = get_employees($sales_assc_slug);
								?>
								<div class="flex tier-3-4-row">
									<div class="col-sm-3 col-xs-3 tier-3 empty"></div>
									<div class="col-sm-9 col-xs-9 tier-4 sales-execs">
										<h4> <?php echo get_the_title($employee);?> : <span class="sub-heading">Sales Associate Team Leader</span> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h4> 
										<?php name_and_position($sales_assc, "Sales Associates"); ?>
										
									</div>
								</div>
							
								<?php endforeach;} //  endif sales team leaders + sales assc. section ?>
								
				
						

				<?php else : 
				// all other tier 2 employees who belong in 1st column (VPs)
				?>
					
						<div class="col-sm-3 col-xs-4 tier-2 flex flex-col">
							<?php get_name2($employee, $slug, $job_title); ?>
						</div>
						<div class="col-sm-9 col-xs-8 tier-3-4">
				<?php endif; 
				// below creates new tier-3-4-row and outputs corresponding employees
				// most VPs will only have 1 or 2 of the below groups of supervisees
				// see functions.php file for functions
				?>

				

					<?php //SALES EXECUTIVES
					execs($sales_execs, 'Sales Executives') ?>


					<?php //ACCT EXECUTIVES
					execs($acct_execs, 'Account Executives') ?>


					<?php //MRKT EXECUTIVES
					execs($mrkt_execs, 'Marketing Executives') ?>


					<?php //MRKT ASSOCIATES
					assc($mrkt_assc, 'Marketing Associates') ?>
					

					<?php //MISC TIER 3
					misc($misc_tier3) ?>

					<?php //SALES MANAGER + ACCOUNT EXECUTIVES
					if (!empty($sales_mgr)) { 
						// for each sales manager, finds their supervisees (sales execs) and creates new row
						foreach($sales_mgr as $employee): 
							    $slug=$employee->post_name;
							    $acct_execs_slug=$slug;
							    $acct_execs = get_employees($acct_execs_slug);
							?>
							<div class="flex tier-3-4-row">
								<div class="col-xs-4 tier-3 sales-mgr">
										<?php get_name3($employee, $slug, "Sales Manager"); ?>	
								</div>
								<div class="col-xs-6 col-sm-4 tier-4 acct-execs">
									<?php name_and_position($acct_execs, "Sales Executives"); ?>
								</div>
								<div class="col-xs-2 col-sm-4 blank"></div>
							</div>
					<?php endforeach;} //endif sales manager + account execs section?>


					
					


				</div> <?php // closing tag for tier-3-4 ?>
			</div><?php //closing tag for row branch 
		 }	//end foreach ELLtier2 employee (outermost loop); ?> 