<?php 

	$CGItier2 = get_employees('bob-bartosiewicz'); //finds all employees supervised by barto

	

		foreach($CGItier2 as $employee){
			// this loop gets data for CGItier2 employee, finds all supervisees, and creates arrays to store their supervisees
			$meta = get_metadata('post', $employee->ID); 
			$job_title = $meta['employee_title_title'][0]; 
		    $slug=$employee->post_name; 
		    $supervisees = get_employees($slug); 
			$tier3 = array();
			$tier4 = array();

			foreach ($supervisees as $key) {
				// this loop gets data for all of CGItier2's supervisees and determines if they belong in tier3 or tier4
				$meta = get_metadata('post', $key->ID);
				$job = $meta['employee_title_title'][0];
				if ($job == "Human Resources" || $job == "Director of Personnel" || $job == "Admin Manager"){
					array_push($tier3, $key);
				} else {
					array_push($tier4, $key);
				}
			}
		    
			?>
			<div class="row branch flex">

		   <?php if(empty($supervisees)): 
		    	// if CGItier2 employee has no supervisees, add no-children class to tier-2 column?>
				<div class="col-sm-4 col-xs-4 tier-2 flex flex-col no-children">

			<?php else : 
				// else create tier-2 column without no-children class?>

				<div class="col-sm-4 col-xs-4 tier-2 flex flex-col">

			<?php endif; ?>
	    
					<h3><?php echo get_the_title($employee);?> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h3>
					<h4 class="heading"><?php echo $job_title ?></h4>
				</div>
				<div class="tier-3-4 col-xs-8">

			
			<?php 

				 if(!empty($tier3)){ 

					foreach ($tier3 as $employee) {
						// loops through and gets all data for each tier3 supervisee
						$meta = get_metadata('post', $employee->ID);
						$position_title = $meta['employee_title_title'][0];
						$slug=$employee->post_name;
					    $supervisees = get_employees($slug); ?>


						<div class="flex tier-3-4-row">
						<?php if(!empty($supervisees)) { 
							//if tier3 employee has its own supervise?>
							<div class="col-xs-6 tier-3">
						<?php } else { 
							//if they don't?>
							<div class="col-xs-6 tier-3 no-children">
						<?php } ?>

								<h4> <?php echo get_the_title($employee);?> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a></h4>
								<h5 class="heading"><?php echo $position_title ?></h5>
							</div>


						<?php if (!empty($supervisees)) { 
							//if tier3 employee has its own supervise?>
							<div class="col-xs-6 tier-4">
							<?php if ($position_title == "Director of Personnel") :?>
								<h5 class="heading group-heading">Talent &amp; Recruitment</h5> 
							<?php elseif ($position_title == "Admin Manager") :?>
								<h5 class="heading group-heading">Admin &amp; Accounting</h5> 
							<?php endif; ?>
								<ul>
									<?php get_name($supervisees); 
									//generate list of supervisees?>
								</ul>

							</div>
						<?php } else { 
							//if they don't, empty div?>
							<div class="col-xs-6"></div>
						<?php } ?>
							
						</div>


				<?php }; }; //ends tier3 foreach loop }; //ends tier3 if statement?>

				<?php if (!empty($tier4)){  ?>
 						<div class="flex tier-3-4-row">
 							<div class="col-xs-6 tier-3 empty"></div>
							<div class="col-xs-6 tier-4">	
								<ul>
 									<?php 
	 									$meta = get_metadata('post', $tier4[0]->ID);
 										$position = $meta['employee_title_title'][0];
 									if (count($tier4) == 1) {
 						
 										echo '<h5 class="heading group-heading">' . $position . '</h5>';
 									} elseif (strpos($position, 'Developer') !== false) {
 										
 										echo '<h5 class="heading group-heading">Web Developers</h5>';
 									}
 									get_name($tier4);
 									?>
 
 								</ul>
 							</div>
 						</div>
 						<?php }?>

				</div><?php // end tier-3-4 ?>
			</div>	<?php // end row ?>
		<?php }; ?>

			

	







