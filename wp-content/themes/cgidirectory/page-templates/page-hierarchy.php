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
						
						
							<h1 class="">Bob Bartosiewicz <a href="../#bob-bartosiewicz"><i class="fa fa-info-circle"></i></a></h1>
						<div class="hierarchy-button cgi" id="CGI">
							<h3>CEO & Chairman of the Board</h3>
						</div>
						
					</div>
				</div>
				<div class="row ell-nxt">
					<div class="page-title col-xs-6 col-md-5 col-md-offset-1 ell">

						<h2>Bob Forys <a href="../#bob-forys"><i class="fa fa-info-circle"></i></a></h2>	
						<div class="hierarchy-button" id="ELL">
							<h3>President | eLocalLink</h3>
						</div>

						
					</div>



					<div class="page-title col-xs-6 col-md-5 nxt frank">
						<h2>Frank Buono <a href="../#frank-buono"><i class="fa fa-info-circle"></i></a></h2>

						<div class="hierarchy-button col-sm-9 col-xs-7" id="NXT">
							<h3>President | Next! Ad Agency</h3>
						</div>
						<div class="hierarchy-button col-sm-3 col-xs-5" id="SNP">
							<h3>Snap<br class="snap-br">Nation</h3>
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


			<div class="tree col-md-12 hidden" id="SNP-tree">
				<ul class="tree-ul">

					<?php get_template_part( 'template-parts/content-snp' ); ?>

				</ul><!-- closing tag for #tree -->
			</div><!-- closing tag for .tree -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
