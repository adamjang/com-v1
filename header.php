<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package adamjang
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<script type="text/javascript" src="//use.typekit.net/bon6twa.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site fixed-header">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header container" role="banner">
		<div class="content wrapper">
			<a class="site-name" href="<?php bloginfo( 'url' ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
			<nav class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>
			</nav><!-- #site-navigation -->					
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
