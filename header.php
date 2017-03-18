<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Namaskar_News
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nmnews' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<nav>
			<div class="nav-wrapper">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<a class="brand-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php else : ?>
				<a class="brand-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php
			endif;
			?>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'right hide-on-med-and-down' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'mobile-demo', 'menu_class' => 'side-nav' ) ); ?>
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
