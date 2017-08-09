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

			<div class="bob col-md-12"><h1>Bob Forys : President</h1></div>
				<div class="tree col-md-12">
					<ul id="tree">


			<?php
			/* Start the Loop */


			while ( have_posts() ) : the_post();

				$department = get_field('department');
				$position = get_field('position');
				$sales_execs = get_field('sales_executives');
				$sales_mgr = get_field('sales_manager');
				$acct_execs = get_field('account_executives');	
				
				if( $department == 'eLocalLink' ): ?>

				<div class="row branch">
					<div class="col-xs-4 tier-2">
						<h2><?php echo the_title(); ?></h2>
						<h3><?php echo $position ?></h3>
					</div>
					<div class="col-xs-8 tier-3-4">
						<div class="col-xs-6 tier-3 empty"></div>
						<div class="col-xs-6 tier-4">
							<h4>Sales Executives</h4>
							<ul>
								<?php echo $sales_execs ?>
							</ul>
						</div>
						<div class="col-xs-6 tier-3">
							<h4><?php echo $sales_mgr ?> </h4>
							<h4>Sales Manager</h4>
						</div>
						<div class="col-xs-6 tier-4">
							<h4>Account Executives</h4>
							<ul>
								<?php echo $acct_execs ?>
							</ul>
						</div>
					</div>
				</div>

				<?php endif; 

			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
