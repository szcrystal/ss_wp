<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php thisUrl('images/favicon.ico'); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" <?php addMainClass(); ?>>

	<header id="masthead" class="site-header" role="banner">
    	
    	<div class="wrap-head clear">
            <div class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php thisUrl('images/logo-bbb.png'); ?>" alt="株式会社ソラシード" /></a></h1>
            </div><!-- .site-branding -->
            
            <i class="fa fa-bars tgl" aria-hidden="true"></i>
		</div>
        
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php 
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary', 
                        'menu_id' => 'primary-menu', 
                        'link_before'=>'<i class="fa fa-arrow-right" aria-hidden="true"></i>',
                        //'link_after'=> get_the_title(),
                    )
                );
            ?>

        </nav>
	</header><!-- #masthead -->

	<div id="all">

