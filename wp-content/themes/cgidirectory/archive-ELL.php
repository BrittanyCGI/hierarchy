<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cgidirectory
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main hierarchy" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title col-md-4 hierarchy-button current">eLocalLink / Sales</h1>
				<h1 class="page-title col-md-4 hierarchy-button">Next!</h1>
				<h1 class="page-title col-md-4 hierarchy-button">CGI</h1>
				<?php
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="bob col-md-6 col-md-offset-3"><h1>Bob Forys : President</h1></div>
				<div class="tree col-md-6 col-md-offset-3">
					<ul id="tree">


			<?php
			/* Start the Loop */


			while ( have_posts() ) : the_post();

				$position = get_field('position');
				$sales_execs = get_field('sales_executives');
				$sales_mgr = get_field('sales_manager');
				$acct_execs = get_field('account_executives');	
				?>

					<li class="li-A">
						<h2>
							<?php echo the_title(); ?>
						</h2>
						<h3>
							<?php echo $position ?>
						</h3>

						<ul class="tier-3">
							<li class="li-B">
								<h5>Sales Executives</h5>
								<ul class="tier-4">
								    <li class="li-B list">
								    	<?php echo $sales_execs ?>
								    </li>
								</ul>
							<!--</li>-->
							<li class="li-B">
								<h5><?php echo $sales_mgr ?> <br> Sales Manager</h5>
								<ul class="tier-4">
								    <li class="li-B list">
								    	<?php echo $acct_execs ?>
								    </li>
								</ul>
							<!--</li>-->
						</ul>
					</li>


			<?php
			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
