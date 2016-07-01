<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>


<div class="wrap-cal" data-speed="2.5" data-y="0">
    <div class="cal">
    
    <img src="<?php thisUrl('images/0461.jpg'); ?>">
    
    </div>
</div>

<h1 class="entry-t" data-speed="2.8" data-y="370">メンバー一覧</h1>
<?php //the_title( '', '</h1>' ); ?>


<div id="content" class="site-content">
	<div id="primary" class="content-area clear">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
            	<h1 class="entry-title"><i class="fa fa-circle"></i>エンジニア</h1>
				<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					//the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>
            
            <?php
            $wp_query = new WP_Query(
                array(
                    'post_type'=>'member',
                    //'posts_per_page' => 5,
                    'orderby'=>'date ID',
                    'order'=>'ASC',
                )
            );         


			/* Start the Loop */
			while ( $wp_query->have_posts() ) : $wp_query->the_post();

				get_template_part( 'template-parts/content', 'member' );

			endwhile;

			//the_posts_navigation();

			wp_reset_query();


endif;
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
