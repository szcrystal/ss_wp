<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>


<div class="wrap-cal" data-speed="2.5" data-y="0">
    <div class="cal">
    
    <img src="<?php thisUrl('images/IMG_1266.jpg'); ?>">
    
    </div>
</div>

<h1 class="entry-t" data-speed="2.8" data-y="370"><?php the_title(); ?></h1>

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'ms' );

			//the_post_navigation();

			

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
