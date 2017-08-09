<?php
/**
 * Template part for displaying custom post type 'employee' in table
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cgidirectory
 */

?>


<div class="container">
<div class="row">
<div class="col-xs-12">


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title">', '</h2>' );
		endif;

		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cgidirectory' ),
				'after'  => '</div>',
			) );
		?>

	<div class="">
	<table id="table-people" class="table" width="100%" cellspacing="0">

  	<caption>Employees</caption>
	<thead class="hidden-xs">
		<tr>
			<th>Name</th>
			<th>Department</th>
			<th>Floor</th>
			<th>Extension</th>
		</tr>
	</thead>
	<tbody>
		
<?php
	$args = array( 'post_type' => 'employee','numberposts' => -1 );
	$myposts = get_posts( $args );
	foreach ( $myposts as $post ) : setup_postdata( $post ); 
?>
	<tr>
		<td>
			<?php

				$slug = get_post_field( 'post_name', get_post() );

				$src = $action = (has_post_thumbnail()) ? wp_get_attachment_url( get_post_thumbnail_id($post->ID)) : get_template_directory_uri().'/img/user-default.png';
			?>

			<div class="thumb" id="<?php echo $slug ?>" style="background-image:url('<?php echo $src ?>');">

			</div>
			<div class="title">
				<h4 class="employee-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<em><?php echo employee_title_get_meta( 'employee_title_title' ); ?></em>

				<p>
					<?php
						$email = contact_information_get_meta( 'contact_information_email' );


						if (!($email == "")){

							$a1 = explode("@", $email);
							$emailName = strval($a1[0]);
							$emailHost = strval($a1[1]);
							$emailShow = $emailName . ($emailHost == "cgicommunications.com" ? "@" : ("@" . $emailHost));

							//echo "<a class='btn btn-default email-link' href='mailto:".$email."'><span>".$email."</span><span>Send Email</span></a>";

							echo '<script type="text/javascript"> obvs("'.$emailName.'", "' . $emailHost . '", 1, "' . $emailShow . '"); </script>';
							 
						}
					?>

				</p>
			</div>
		</td>
		<td>
			<?php 
				$dept = get_the_term_list( $post->ID, 'department', '<span class="department">', ', ', '</span>' ); 
				$dept == strip_tags(htmlentities($dept));

				echo "<span class='prefix'>Department: </span>" . $dept;
			?> 
		</td>
		<td>
			<?php 
				$floor = get_the_term_list( $post->ID, 'floor', '<span class="floor">', ', ', '</span>' ); 
				$floor == strip_tags( $floor );

				echo ("<span class='prefix'>Floor: </span>");
				echo $floor;
			?> 
		</td>
		<td>
			<?php
				$ext = "<span class='prefix'>Ext: </span>" . contact_information_get_meta( 'contact_information_phone_extention' );
				echo $ext;
			?>
		</td>
	</tr>

<?php endforeach; 
wp_reset_postdata();


			?>


	</tbody>
	</table>
	</div>

	


	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php cgidirectory_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

</div>
</div>
</div>