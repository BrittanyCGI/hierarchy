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

			$recruit = array();
			$community = array();
			$sales = array();
			$training = array();
			$clientDev = array();
			$webGraphic = array();
			$snpMagic = array();
			$misc = array();
	

		foreach($SNPteam as $post){
			
			$meta = get_metadata('post', $post->ID);
			$job_title = $meta['employee_title_title'][0];
		    $slug=$post->post_name;
		    $SNPdept = get_field('department');
			$SNPposition = get_field('snapnation_job_title');

			if ($SNPdept == 'Recruiting') {
				array_push($recruit, $post);
			} elseif ($SNPdept == 'Community Ambassadors') {
				array_push($community, $post);
			} elseif ($SNPdept == 'Sales') {
				array_push($sales, $post);
			} elseif ($SNPdept == 'Training Seminar') {
				array_push($training, $post);
			} elseif ($SNPdept == 'Client Development') {
				array_push($clientDev, $post);
			} elseif ($SNPdept == 'Website and Graphic Design') {
				array_push($webGraphic, $post);
			} elseif ($SNPdept == 'SnapMagic Team Building') {
				array_push($snpMagic, $post);
			} else {
				array_push($misc, $post);
			}  


		    
}





snap($snpMagic, 'SnapMagic Team Building');
snap($recruit, 'Recruiting');
snap($community, 'Community Ambassadors');
snap($sales, 'Sales');
snap($training, 'Training');
snap($clientDev, 'Client Development');
snap($webGraphic, 'Website and Graphic Design');
?>




			

	







