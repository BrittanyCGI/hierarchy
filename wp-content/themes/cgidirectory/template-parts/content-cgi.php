<?php 

	$CGItier2 = get_employees('bob-bartosiewicz');

	

		foreach($CGItier2 as $employee){
			
			$meta = get_metadata('post', $employee->ID);
			$job_title = $meta['employee_title_title'][0];
		    $slug=$employee->post_name;
		    $supervisees = get_employees($slug); 

			$tier3 = array();
			$tier4 = array();

			foreach ($supervisees as $key) {
				$meta = get_metadata('post', $key->ID);
				$job = $meta['employee_title_title'][0];
				if ($job == "Human Resources" || $job == "Director of Personnel"){
					array_push($tier3, $key);
				} else {
					array_push($tier4, $key);
				}
			}
		    ?>

			<div class="row branch flex">
				<div class="col-sm-4 col-xs-4 tier-2 flex flex-col">
					<h3><?php echo get_the_title($employee);?></h3>
					<h4 class="heading"><?php echo $job_title ?></h4>
				</div>
				<div class="tier-3-4 col-xs-8">



				<?php if(!empty($tier3)){ 

					foreach ($tier3 as $employee) {
						$meta = get_metadata('post', $key->ID);
						$job_title = $meta['employee_title_title'][0];
						$slug=$employee->post_name;
					    $supervisees = get_employees($slug); 
					
					?>
						<div class="flex tier-3-4-row">
						<?php if(!empty($supervisees)) { ?>
							<div class="col-xs-6 tier-3">
							<?php } else { ?>
							<div class="col-xs-6 tier-3 no-children">
							<?php } ?>
								<h4> <?php echo get_the_title($employee);?></h4>
								<h5 class="heading"><?php echo $job_title ?></h5>
							</div>
							<?php if (!empty($supervisees)) { ?>
								<div class="col-xs-6 tier-4">
									<ul>
										<?php get_name($supervisees); ?>
									</ul>

								</div>
							<?php } else { ?>
								<div class="col-xs-6"></div>
							<?php } ?>
							
						</div>


				<?php }; }; ?>


				<?php if (!empty($tier4)){  ?>
						<div class="flex tier-3-4-row">
							<div class="col-xs-6 tier-3 empty"></div>
							<div class="col-xs-6 tier-4">	
								<ul>
									<?php get_name($tier4);?>
								</ul>
							</div>
						</div>
						<?php }?>

				</div> <!-- tier-3-4 -->
			</div>	<!-- row -->





		


					
						

		<?php }; ?>

			

	







