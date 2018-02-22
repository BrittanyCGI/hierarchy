<?php 

	$NXTtier2 = get_employees('nxt-pres');

		$vp = array();
		$media  = array();
		$others = array();

		$mediaTeam = get_employees('media'); // different slug b/c team has 2 mgrs

		foreach($NXTtier2 as $employee){
			// loops through NXTtier2 and gets data for each employee
			$meta = get_metadata('post', $employee->ID); // gets all employee data
			$job_title = $meta['employee_title_title'][0]; // gets job title
		    $slug=$employee->post_name; // gets employee slug
		    $supervisees = get_employees($slug); // gets employee supervisees


		    	if (strpos($job_title, 'Vice President') !== false){
		    		array_push($vp, $employee);
		    	} elseif ($job_title == "Digital Media &amp; Creative Design Team Leader") {
		    		array_push($media, $employee);
		    	} else {
		    		array_push($others, $employee);
		    	}
		    } // assign tier2 employees to arrays


////// VP ROW /////
		    foreach($vp as $employee) : 
		    	//loops through VPs
		    $meta = get_metadata('post', $employee->ID);
			$job_title = $meta['employee_title_title'][0];
		    $slug=$employee->post_name;
		    $supervisees = get_employees($slug); ?>

			<div class="row branch flex">
				<div class="col-sm-4 col-xs-4 tier-2 flex flex-col">
					<h3><?php echo get_the_title($employee);?> <a href="../#<?php echo $slug ?>"><i class="fa fa-info-circle"></i></a></h3>
					<h4 class="heading"><?php echo $job_title ?></h4>
				</div>
				<div class="col-xs-1 tier-3 empty"></div>


			<?php if(strpos($job_title, 'Community Operations')) : 
			// brandon bartz row
			?>
				<div class="col-xs-7 tier-3-4">
					<div class="tier-3-4-row flex">
						<div class="col-xs-6 col-sm-7 tier-3 empty"></div>
						<div class="col-xs-6 col-sm-5 tier-4">
							<h5 class="heading group-heading">Community Progams</h5> 
							<ul>
								<?php get_name($supervisees) ?>
							</ul>
						</div>
					</div>
				</div> <?php //closing tag for tier-3-4 ?>


			<?php elseif (strpos($job_title, 'Client')) : 
			// Tom Doran's row - VP of Client Experience
			?>
				<div class="col-xs-7 tier-3-4">
					<?php if (!empty($supervisees)) {

					foreach ($supervisees as $employee) : 
						// gets employee data for all of Tom's supervisees
							$meta = get_metadata('post', $employee->ID);
							$job_title = $meta['employee_title_title'][0];
						    $slug=$employee->post_name;
						    $tier4 = get_employees($slug); 
						    // checks title, just in case he supervises roles other than Acct Mngr in the future
						    $acct_mgr_check = strpos($job_title, 'Account Manager');

						    if ($acct_mgr_check !== false) {
						    	$group_title = 'Account Managers';
						    } else {
						    	$group_title = NULL;
						    } 

						?>
					<div class="flex tier-3-4-row">
					<?php if(empty($tier4)) : ?>
						<div class="col-xs-6 col-sm-7 tier-3 no-children">
					<?php else : ?>
						<div class="col-xs-6 col-sm-7 tier-3">
							<h4><?php echo get_the_title($employee); echo " <a href=\"../#" . $slug . "\"><i class=\"fa fa-info-circle\"></i></a></h4>" ?>
							<h5><?php echo $job_title ?></h5>
					<?php endif; ?>
							
						</div>

					<?php 
				    if (!empty($tier4)) : 
				    	// if Tom's supervisees have their own supervisees (tier4 employees)
				    	?>
					    <div class="col-xs-6 col-sm-5 tier-4">
					    	<?php if ($group_title){
					    		echo "<h5 class=\"heading group-heading\"> $group_title </h5>";
				    		} ?>
					    	<?php foreach ($tier4 as $employee) {
					    		// gets data for each tier4 employee, outputs info below
					    		$meta = get_metadata('post', $employee->ID);
								$position = $meta['employee_title_title'][0];
							    $slug=$employee->post_name;
							    $tier5 = get_employees($slug); 
					    	?>
								<h4> <?php echo get_the_title($employee) ?> <a href="../#<?php echo $slug ?>"><i class="fa fa-info-circle"></i></a></h4>
							<?php } ?>

					    </div>

					<?php else : ?>
						<div class="col-xs-6 col-sm-5 empty"></div>
					<?php endif; ?>
					</div>
					<?php endforeach; ?>

					<?php }; ?>

				</div> <?php //closing tag for tier-3-4 ?> 
				

			<?php endif; ?>

			</div><?php // closing tag for row branch ?>
		<?php endforeach; ?>

			

		


				
		<?php foreach ($others as $employee) :
		//non VPs and non digital media
			    $meta = get_metadata('post', $employee->ID);
				$job_title = $meta['employee_title_title'][0];
			    $slug=$employee->post_name;
			    $supervisees = get_employees($slug); ?> 

			<div class="row branch flex">
				<div class="col-xs-1 tier-2 flex flex-col empty"></div> <?php // empty column so that non VPs aren't in line with VPs ?>
				<div class="col-xs-4 tier-2 ">
					<h3> <?php echo get_the_title($employee);?> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h3>
					<h4 class="heading"><?php echo $job_title ?></h4>
				</div>
				<div class="col-xs-7 tier-3-4">

				<?php if (!empty($supervisees)) {

					foreach ($supervisees as $employee) : 
							$meta = get_metadata('post', $employee->ID);
							$job_title = $meta['employee_title_title'][0];
						    $slug=$employee->post_name;
						    $tier4 = get_employees($slug); 
						    $acct_mgr_check = strpos($job_title, 'Account Manager');

						    // find group title for tier 4 employees 
						    if ($job_title == 'Head Writer'){
						    	$group_title = "Scriptwriters";
						    } elseif ($job_title == 'Managing Videographer'){
						    	$group_title = 'Videographers';
						    } elseif ($job_title == 'Managing Producer') {
						    	$group_title = 'Producers';
						    } elseif ($job_title == 'Managing Editor') {
						    	$group_title = 'Editors';
						    } elseif ($job_title == 'Senior Client Development Manager') {
						    	$group_title = 'Client Development Managers';
						    } elseif ($acct_mgr_check !== false) {
						    	$group_title = 'Account Managers';
						    } elseif ($job_title == 'Account Associate Team Leader') {
						    	$group_title = 'Account Associates';
						    } else {
						    	$group_title = NULL;
						    } 

						?>
					<div class="flex tier-3-4-row">
					<?php if(empty($tier4)) : ?>
						<div class="col-xs-6 col-sm-7 tier-3 no-children">
					<?php elseif($job_title == 'Account Associate Team Leader' ) : ?>
						<div class="col-xs-6 col-sm-7 tier-3 empty"> <?php // empty line, so acct assct team leaders go on top of tier 4 ?>
					<?php else : ?>
						<div class="col-xs-6 col-sm-7 tier-3">
							<h4><?php echo get_the_title($employee); echo " <a href=\"../#" . $slug . "\"><i class=\"fa fa-info-circle\"></i></a></h4>" ?>
							<h5><?php echo $job_title ?></h5>
					<?php endif; ?>
							
						</div>

					<?php 
				    if (!empty($tier4)) : ?>
					    <div class="col-xs-6 col-sm-5 tier-4">

					    	<?php if ($job_title == 'Account Associate Team Leader') : ?>
					    		<h4> <?php echo get_the_title($employee);?> : <span class="sub-heading"><?php echo $job_title ?></span>  <a href="../#<?php echo $slug ?>"><i class="fa fa-info-circle"></i></a></h4>
					    	<?php endif; ?>

					    	<?php if ($group_title){
					    		echo "<h5 class=\"heading group-heading\"> $group_title </h5>";
				    		} ?>
					    	<?php foreach ($tier4 as $employee) {
					    		$meta = get_metadata('post', $employee->ID);
								$position = $meta['employee_title_title'][0];
							    $slug=$employee->post_name; ?>

								<h4> <?php echo get_the_title($employee) ?> <a href="../#<?php echo $slug ?>"><i class="fa fa-info-circle"></i></a></h4>
							<?php } ?>

					    </div>

					<?php else : //if no tier4?>
						<div class="col-xs-6 col-sm-5 empty"></div>
					<?php endif; ?>
					</div>
						<?php endforeach; ?>

					<?php }; ?>

				</div> <?php //closing tag for tier-3-4 ?>
			</div><?php //closing tag for row branch ?>
			
		<?php endforeach; ?>




		<?php //// MEDIA bc there are 2 mgrs, DMCD is generated differently -- looping through DMCD leaders, and then looping through team separately ?>
		<div class="row branch flex">
			<div class="col-xs-2 tier-2 flex flex-col empty"></div>
			<div class="col-xs-4 tier-2 ">
				<?php foreach ($media as $employee) { // outputs info for each DMCD team leader (rachel and pauline)
					$slug=$employee->post_name;
					echo '<h3>' . get_the_title($employee) . " <a href=\"../#$slug\"><i class=\"fa fa-info-circle\"></i></a></h3>";
				} ?>
					<h4 class="heading">Digital Media &amp; Creative Design Team Leaders</h4>
			</div>
			<div class="col-xs-6 tier-3-4">



			<?php 

				$designers = array();
				$writers = array();
				$coordinators = array();
				$google = array();
				$social = array();
				$specialists = array();

				foreach ($mediaTeam as $employee) {
					$meta = get_metadata('post', $employee->ID);
					$job_title = $meta['employee_title_title'][0];

					// loops through digital media team and adds to corresponding group array
					if (strpos($job_title, 'Design') !== false){
			    		array_push($designers, $employee);
					} elseif (strpos($job_title, 'Writer') !== false) {
						array_push($writers, $employee);
					} elseif (strpos($job_title, 'Website Coordinator') !== false) {
						array_push($coordinators, $employee);
					} elseif (strpos($job_title, 'Google') !==false) {
						array_push($google, $employee);
					} elseif (strpos($job_title, 'Social') !== false) {
						array_push($social, $employee);
					} elseif (strpos($job_title, 'Specialist') !== false) {
						array_push($specialists, $employee);
					}
				}

				// creates row for each team, see functions.php for custom functions
				media_with_leader($designers, 'Designers');
				media($writers, 'Web/SEO Writers');
				media_with_leader($coordinators, 'Website Coordinators');
				media($google, 'Google AdWords');
				media($social, 'Social Media');
				media($specialists, 'Web & SEO Specialists');
					  ?>	

			</div>
		</div>







