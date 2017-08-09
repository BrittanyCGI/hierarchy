<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cgidirectory
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			<?php while ( have_posts() ) : the_post();

						$position = get_field('position');
						
						$sales_execs = get_field('sales_executives');
						
						$sales_mgr = get_field('sales_manager');
						$acct_execs = get_field('acct_executives');
						
						?>

						<li class="li-A">
						<h2>
							<?php echo the_title(); ?>
							</h2>
							<ul class="tier-3">
								<li class="li-B">
									<h5>Sales Executives</h5>
										<ul class="tier-4">
										    <li class="li-B list">
										    	<?php echo $sales_execs ?>
										    </li>
										</ul>
								</li>
								<li class="li-B">
								<h5><?php echo $sales_mgr ?> <br> Sales Manager</h5>
									<ul class="tier-4">
									    <li class="li-B list">
									    	<?php echo $acct_execs ?>
									    </li>
									</ul>
								</li>
							</ul>
						</li>

					<?php 

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
