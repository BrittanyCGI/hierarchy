<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cgidirectory
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">



<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

<!-- jQuery datatables addon -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css"/>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cgidirectory' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="site-branding">
					
						<!-- if they have a logo -->
						<?php if( get_header_image() != '' ) : ?>
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
							</div><!-- end of #logo -->
						<?php endif; // header image was removed ?>


						<!-- if they don't have a logo -->
						<?php if( !get_header_image() ) : ?>
							<div class="logo">
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							</div><!-- end of #logo -->
						<?php endif; // header image was removed ?>

					</div><!-- .site-branding -->
				</div><!-- .col-md-6 -->
				<div class="col-md-6">
					<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
				</div>
			</div><!-- .row -->
		</div><!-- .container-flex -->
	</header>

	<div id="content" class="site-content">
