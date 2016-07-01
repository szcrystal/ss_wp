<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" <?php addMainClass(); ?>>

	<header id="masthead" class="site-header" role="banner">
    	<div class="wrap-head clear">
            <div class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php thisUrl('images/logo-w-sm.png'); ?>" alt="株式会社ソラシード" /></a></h1>
                
            <?php
                //$description = get_bloginfo( 'description', 'display' );
                //if ( $description || is_customize_preview() ) : ?>
                    <!-- <p class="site-description"> -->
                    	<?php //echo $description; /* WPCS: xss ok. */ ?>
                    <!-- </p>-->
                <?php
                //endif; 
                ?>
            </div><!-- .site-branding -->
		</div>
        
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
                ?>
                
                <ul>
            	<li data-text="mission">
                    <a href="<?php echo outUrl('about'); ?>" class="alk"></a>
                    <div>
                        <span class="st">About</span>
                    	<span class="ft">ソラシードとは？</span>
                    </div>
                </li>
                <li data-text="about">
                	<a href="<?php echo home_url().'/member/'; ?>" class="alk"></a>
                    <div>
	                	<span class="st">Member</span>
    	                <span class="ft">メンバー</span>
                    </div>
                </li>
                
                <li data-text="service">
                    <a href="#" class="alk"></a>
                    <div>
                		<span class="st">Blog</span>
                    	<span class="ft">ブログ</span>
                    </div>
                </li>
                <li data-text="media">
                	<a href="<?php outUrl('company'); ?>" class="alk"></a>
                    <div>
                		<span class="st">Company</span>
                    	<span class="ft">会社概要</span>
                    </div>
                </li>
                <li data-text="contact">
                	<a href="<?php outUrl('outline'); ?>" class="alk"></a>
                    <div>
                		<span class="st">Outline</span>
                    	<span class="ft">事業内容</span>
                    </div>
                </li>
                <li data-text="contact">
                	<a href="<?php outUrl('recruit'); ?>" class="alk"></a>
                    <div>
                		<span class="st">Recruit</span>
                    	<span class="ft">採用情報</span>
                    </div>
                </li>
                <li data-text="contact">
                	<a href="<?php outUrl('greeting'); ?>" class="alk"></a>
                    <div>
                		<span class="st">Hello</span>
                    	<span class="ft">代表挨拶</span>
                    </div>
                </li>
                
            </ul>
            </nav><!-- #site-navigation -->
        
	</header><!-- #masthead -->

	<div id="all">

