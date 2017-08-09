<?php
/**
 * Template Name: Table Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Next_Organic
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content-table' ); ?> 

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>