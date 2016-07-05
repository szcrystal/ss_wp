<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>




<div id="content" class="site-content">
	<div id="primary" class="content-area clear">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
            	<h1 class="entry-title">ソラシードの愉快な仲間たちのご紹介</h1>
				<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					//the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>
            
            <?php
            $typeArr = array(
            	'エンジニア',
                '営業',
                '事務',
            );
            
            foreach($typeArr as $key => $val) {
            
            $wp_query = new WP_Query(
                array(
                    'post_type'=>'member',
                    'meta_key' => 'job_type',
                    'meta_value' => $val,
                    'orderby'=>'date ID',
                    'order'=>'ASC',
                )
            );         


			if($wp_query->have_posts()) { ?>
            <div class="clear">
            <h2><i class="fa fa-circle"></i><?php echo $val; ?></h2>
            
			<?php 
            while ( $wp_query->have_posts() ) : $wp_query->the_post();

				get_template_part( 'template-parts/content', 'member' );

			endwhile;

			//the_posts_navigation();

			wp_reset_query(); ?>
            
            </div>
            
            <?php } 
            
            }


endif;
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
