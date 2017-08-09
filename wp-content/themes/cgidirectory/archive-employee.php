<?php
/**
 * The template for displaying Employee archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cgidirectory
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

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

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );





				

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
