<?php 

	$NXTtier2 = get_employees('nxt-pres');

		$vp = array();
		$media  = array();
		$others = array();

		$mediaTeam = get_employees('media');

		foreach($NXTtier2 as $employee){
			
			$meta = get_metadata('post', $employee->ID);
			$job_title = $meta['employee_title_title'][0];
		    $slug=$employee->post_name;
		    $supervisees = get_employees($slug);


		    	if ($job_title == "Vice President"){
		    		array_push($vp, $employee);
		    	} elseif ($job_title == "Digital Media &amp; Creative Design Team Leader") {
		    		array_push($media, $employee);
		    	} else {
		    		array_push($others, $employee);
		    	}
		    } ?>

	    <?php foreach($vp as $employee) : 
		    $meta = get_metadata('post', $employee->ID);
			$job_title = $meta['employee_title_title'][0];
		    $slug=$employee->post_name;
		    $supervisees = get_employees($slug); ?>

			<div class="row branch flex">
				<div class="col-sm-4 col-xs-4 tier-2 flex flex-col">
					<h3><?php echo get_the_title($employee);?></h3>
					<h4 class="heading"><?php echo $job_title ?></h4>
				</div>
				<div class="col-xs-1 tier-3 empty"></div>
				<div class="col-xs-7 tier-3-4">
					<div class="tier-3-4-row flex">
						<div class="col-xs-6 col-sm-7 tier-3 empty"></div>
						<div class="col-xs-6 col-sm-5 tier-4">
							<h5 class="heading group-heading">Community</h5>
							<ul>
								<?php get_name($supervisees) ?>
							</ul>
						</div>
					</div>
				</div> <!-- closing tag for tier-3-4 -->

			</div><!-- closing tag for row branch -->
		<?php endforeach; ?>

			


		<div class="row branch flex">
			<div class="col-xs-1 tier-2 flex flex-col empty"></div>
			<div class="col-xs-4 tier-2 ">
				<?php foreach ($media as $employee) {
					echo '<h3>' . get_the_title($employee) . '</h3>';
				} ?>
					<h4 class="heading">Digital Media &amp; Creative Design Team Leaders</h4>
			</div>
			<div class="col-xs-7 tier-3-4">
				<div class="tier-3-4-row flex">
					<div class="col-xs-6 col-sm-7 tier-3 empty"></div>
					<div class="col-xs-6 col-sm-5 tier-4">
						<h5 class="heading group-heading">Digital Media &amp; Creative Design</h5>
						<ul>
							<?php get_name($mediaTeam); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

				
		<?php foreach ($others as $employee) :
			    $meta = get_metadata('post', $employee->ID);
				$job_title = $meta['employee_title_title'][0];
			    $slug=$employee->post_name;
			    $supervisees = get_employees($slug); ?>
			<div class="row branch flex">
				<div class="col-xs-1 tier-2 flex flex-col empty"></div>
				<div class="col-xs-4 tier-2 ">
					<h3> <?php echo get_the_title($employee);?></h3>
					<h4 class="heading"><?php echo $job_title ?></h4>
				</div>
				<div class="col-xs-7 tier-3-4">

				<?php if (!empty($supervisees)) {

					foreach ($supervisees as $employee) : 
							$meta = get_metadata('post', $employee->ID);
							$job_title = $meta['employee_title_title'][0];
						    $slug=$employee->post_name;
						    $tier4 = get_employees($slug); 
						?>
					<div class="flex tier-3-4-row">
						<div class="col-xs-6 col-sm-7 tier-3">
							<h4><?php echo get_the_title($employee); ?></h4>
							<h5><?php echo $job_title ?></h5>
						</div>

					<?php 
				    if (!empty($tier4)) : 
				

				    	?>
					    <div class="col-xs-6 col-sm-5 tier-4">
					    	<?php foreach ($tier4 as $employee) {
					    		$meta = get_metadata('post', $employee->ID);
								$position = $meta['employee_title_title'][0];
							    $slug=$employee->post_name;
							    $tier5 = get_employees($slug); 
					    	if (!empty($tier5)): ?>
					    	<div class="flex tier-3-4-row">
					    		<div class="col-xs-1 empty tier-3"></div>
					    		<div class="col-xs-11 tier-4">
					    		<h4> <?php echo get_the_title($employee);?> : <span class="sub-heading"><?php echo $position ?></span></h4> 
									<h5 class="heading group-heading">Account Associates</h5>
									<ul>
										<?php foreach ($tier5 as $key) {
											echo '<h4>' . get_the_title($key) . '</h4>';
										} ?>
									</ul>
									</div></div>
							<?php else : ?>
								<h4> <?php echo get_the_title($employee) ?> </h4>
							<?php endif; } ?>

					    </div>

					<?php else : ?>
						<div class="col-xs-6 col-sm-5 empty"></div>
					<?php endif; ?>
					</div>
						<?php endforeach; ?>

					<?php }; ?>

				</div> <!-- closing tag for tier-3-4 -->
			</div><!-- closing tag for row branch -->
			
		<?php endforeach; ?>







