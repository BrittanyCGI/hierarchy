<?php
/**
 * Template Name: Hierarchy Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cgidirectory
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main hierarchy container-fluid" role="main">

			<header class="page-header">

				<div class="row">
					<div class="page-title col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 ceo">
						
						<div class="hierarchy-button cgi" id="CGI">
							<h1 class="">Bob Bartosiewicz</h1>
							<h3>CEO & Chairman of the Board</h3>
						</div>
						
					</div>
				</div>
				<div class="row ell-nxt">
					<div class="page-title col-xs-6 col-md-5 col-md-offset-1 ">
						
						<div class="hierarchy-button ell" id="ELL">
							<h2>Bob Forys</h2>
							<h3>President | eLocalLink</h3>
						</div>
						
					</div>



					<div class="page-title col-xs-6 col-md-5">
					
						<div class="nxt hierarchy-button" id="NXT">
							<h2>Frank Buono</h2>
							<h3>President | Next! Ad Agency</h3>
						</div>
					
					</div>
			</header><!-- .page-header -->

			<div class="tree col-md-12 hidden" id="CGI-tree">
				<ul class="tree-ul">

					<?php get_template_part( 'template-parts/content-cgi' ); ?>

				</ul><!-- closing tag for #tree -->
			</div><!-- closing tag for .tree -->






			<div class="tree col-md-12 hidden" id="ELL-tree">
				<ul class="tree-ul">

					<?php get_template_part( 'template-parts/content-ell' ); ?>

				</ul><!-- closing tag for #tree -->
			</div><!-- closing tag for .tree -->


			<div class="tree col-md-12 hidden" id="NXT-tree">
				<ul class="tree-ul">

					<?php get_template_part( 'template-parts/content-nxt' ); ?>

				</ul><!-- closing tag for #tree -->
			</div><!-- closing tag for .tree -->


	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
