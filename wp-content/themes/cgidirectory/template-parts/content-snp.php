<?php 

	$SNPteam = 	
			get_posts( 
				array(
				 'post_type' => 'employee',
				 'department' => "SNAP",
				 'posts_per_page'=>-1,
				 'orderby'=> 'date',
				 'order'=> 'ASC',
			));


			$snp = array(); // under Frank
			$recruit = array(); // under Paul
			$community = array(); // under Amy
			$talent = array(); // under Don

/*
			$recruit = array();
			$community = array();
			$sales = array();
			$training = array();
			$clientDev = array();
			$webGraphic = array();
			$misc = array();
*/

		foreach($SNPteam as $post){
			
			$meta = get_metadata('post', $post->ID);
			$job_title = $meta['employee_title_title'][0];
		    $slug=$post->post_name;

			$SNPposition = get_field('snapnation_job_title');
			$supField = get_field_object('supervisor');
			$SNPsup = $supField['value'];


			if ($SNPsup == 'Frank Buono') {
				array_push($snp, $post);
			} elseif ($SNPsup == 'Paul Linton') {
				array_push($recruit, $post);
			} elseif ($SNPsup == 'Don Hill') {
				array_push($talent, $post);
			} elseif ($SNPsup == 'Amy Curran') {
				array_push($community, $post);
			} else {
				array_push($misc, $post);
			} 
}

	foreach ($snp as $post) {
		$name = get_the_title($post);
		$meta = get_metadata('post', $post->ID);
		$job_title = $meta['employee_title_title'][0];
	    $slug=$post->post_name;
	    $SNPdept = get_field('department');
		$job_title = $meta['employee_title_title'][0];
		$SNPposition = $meta['snapnation_job_title'][0];
		if ($SNPposition) {
			$title = $SNPposition;
		} else {
			$title = $job_title;
		}
	    $supervisees = array();

	    foreach ($SNPteam as $post) {
			$supField = get_field_object('supervisor');
			$SNPsup = $supField['value'];

	    	if ($SNPsup == $name) {
	    		array_push($supervisees, $post);
	    	}
	    } // find supervisees under tier 2 employee

		if ($SNPdept == 'Vice Presidents') { ?>

			<div class="row branch flex">
				<?php // TIER 2 //

					
				if (empty($supervisees)) { ?>
					<div class="col-sm-4 tier-2 flex flex-col no-children">
				<?php } else { ?>
					<div class="col-sm-4 tier-2 flex flex-col ">
				<?php } ?>
						<h4><?php echo $name;?> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h4>
						<?php if($job_title): ?><h5><?php endif; ?> <span class="sub-heading-2"><?php echo $title ?></span> </h5>
					</div>



					<?php // TIER 3 //

					if (empty($supervisees)) { ?>
						<div class="col-xs-8 tier-3-4 empty"></div>

					<?php } else { ?>
						<div class="col-xs-8 tier-3-4">

						<?php foreach ($supervisees as $post) { 
							$tier04 = array();
							$meta = get_metadata('post', $post->ID);
							$name = get_the_title($post);
							$slug=$post->post_name;
							$job_title = $meta['employee_title_title'][0];
							$SNPposition = $meta['snapnation_job_title'][0];
							if ($SNPposition) {
								$title = $SNPposition;
							} else {
								$title = $job_title;
							}
								    foreach ($SNPteam as $post) {
										$supField = get_field_object('supervisor');
										$SNPsup = $supField['value'];

								    	if ($SNPsup == $name) {
								    		array_push($tier04, $post);
								    	}
								    } // find supervisees under tier 3 employee
						    
							?>


							<div class="flex tier-3-4-row">

								<?php if(!empty($tier04)) { ?>
									<div class="col-xs-6 tier-3">
								<?php } else { ?>
									<div class="col-xs-6 tier-3 no-children">
								<?php }
									
									echo '<h4>' . $name . ' <a href="../#' . $slug .'"><i class="fa fa-info-circle"></i></a></h4>';
									 ?>
									 <h5><span class="sub-heading-2"><?php echo $title ?></span> </h5>
									</div>


									<?php // TIER 4 //

									if(!empty($tier04)) { ?>
									<div class="col-xs-6 tier-4">
									<h5 class="heading group-heading">Talent Screeners/Recruiters</h5>
										<?php 
											get_name($tier04);
										 ?>
									</div>
									<?php } else { ?>
									<div class="col-xs-6 empty">
									</div>
									<?php } ?>
							</div>
						<?php } ?>
						</div>
					<?php } ?>
			</div>





		<?php } elseif ($SNPdept == 'Community Ambassadors') { ?>

			<div class="row branch flex">
				<?php // TIER 2 // ?>

					

					<div class="col-sm-4 tier-2 flex flex-col empty"></div>

						<?php // TIER 3 // ?>
						<div class="col-xs-8 tier-3-4">
							<div class="flex tier-3-4-row">
								<?php if(!empty($supervisees)) { ?>
									<div class="col-xs-6 tier-3">
								<?php } else { ?>
									<div class="col-xs-6 tier-3 no-children">
								<?php } ?>
										<h4><?php echo $name;?> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h4>
										<?php if($job_title): ?><h5><?php endif; ?> <span class="sub-heading-2"><?php echo $title ?></span> </h5>
									</div>


									<?php // TIER 4 //

									if(!empty($supervisees)) { ?>
									<div class="col-xs-6 tier-4">
									<h5 class="heading group-heading">Community Ambassadors</h5>
										<?php 
											get_name($supervisees);
										 ?>
									</div>
									<?php } else { ?>
									<div class="col-xs-6 empty">
									</div>
									<?php } ?>
							</div>
						</div>
			</div>

 		<?php } elseif ($SNPdept == 'Sales') { ?>

			<div class="row branch flex">
				<?php // TIER 2 // ?>

					

					<div class="col-sm-4 tier-2 flex flex-col empty"></div>

						<?php // TIER 3 // ?>
						<div class="col-xs-8 tier-3-4">
							<div class="flex tier-3-4-row">
								<?php if(!empty($supervisees)) { ?>
									<div class="col-xs-6 tier-3">
								<?php } else { ?>
									<div class="col-xs-6 tier-3 no-children">
								<?php } ?>
										<h4><?php echo $name;?> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h4>
										<?php if($job_title): ?><h5><?php endif; ?> <span class="sub-heading-2"><?php echo $title ?></span> </h5>
									</div>


									<?php // TIER 4 //

									if(!empty($supervisees)) { ?>
									<div class="col-xs-6 tier-4">
									<h5 class="heading group-heading">Sales Executives</h5>
										<?php 
											get_name($supervisees);
										 ?>
									</div>
									<?php } else { ?>
									<div class="col-xs-6 empty">
									</div>
									<?php } ?>
							</div>
						</div>
			</div>








		<?php } elseif ($SNPdept == 'Training Seminar') { ?>
					<div class="row branch flex">
				<?php // TIER 2 //

				if (empty($supervisees)) { ?>
					<div class="col-sm-4 tier-2 flex flex-col no-children">
				<?php } else { ?>
					<div class="col-sm-4 tier-2 flex flex-col ">
				<?php } ?>
						<h4><?php echo $name;?> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h4>
						<?php if($job_title): ?><h5><?php endif; ?> <span class="sub-heading-2"><?php echo $title ?></span> </h5>
					</div>



					<?php // TIER 3 //

					if (empty($supervisees)) { ?>
						<div class="col-xs-8 tier-3-4 empty"></div>

					<?php } else { ?>
						<div class="col-xs-8 tier-3-4">

						<?php foreach ($supervisees as $post) { 
							$tier04 = array();
							$name = get_the_title($post);
								    foreach ($SNPteam as $post) {
										$supField = get_field_object('supervisor');
										$SNPsup = $supField['value'];

								    	if ($SNPsup == $name) {
								    		array_push($tier04, $post);
								    	}
								    } // find supervisees under tier 3 employee
						    
							?>


							<div class="flex tier-3-4-row">

								<?php if(!empty($tier04)) { ?>
									<div class="col-xs-6 tier-3">
								<?php } else { ?>
									<div class="col-xs-6 tier-3 no-children">
								<?php }
									$slug=$post->post_name;
									echo '<h4>' . $name . ' <a href="../#' . $slug .'"><i class="fa fa-info-circle"></i></a></h4>';
									 ?>

									<h5><span class="sub-heading-2"><?php echo $title ?></span> </h5>
									</div>


									<?php // TIER 4 //

									if(!empty($tier04)) { ?>
									<div class="col-xs-6 tier-4">
										<?php 
											get_name($tier04);
										 ?>
									</div>
									<?php } else { ?>
									<div class="col-xs-6 empty">
									</div>
									<?php } ?>
							</div>
						<?php } ?>
						</div>
					<?php } ?>

			</div>

		<?php }
	}
	
?>










			

	







