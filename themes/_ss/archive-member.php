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
            	<h1 class="entry-title">ソラシードの<br>愉快な仲間たちのご紹介</h1>
			</header>
            
            <?php
            
            /* 新規職種がある場合はここに追加 ******** */
            $typeArr = array(
            	'エンジニア',
                '営業',
                '事務',
            );
            /* 職種END --------------------******** */
            
            foreach($typeArr as $val) {
            
                $wp_query = new WP_Query(
                    array(
                        'post_type'=>'member',
                        'meta_key' => 'job_type',
                        'meta_value' => $val,
                        'post_status' => 'publish',
                        'orderby'=>'date ID',
                        'order'=>'ASC',
                    )
                );         


                if($wp_query->have_posts()) { ?>
                    <div class="wrap-type clear">
                    <h2><i class="fa fa-bolt"></i><?php echo $val; ?></h2>
                    
                    <?php 
                    while ( $wp_query->have_posts() ) : $wp_query->the_post();

                        get_template_part( 'template-parts/content', 'member' );

                    endwhile;

                    wp_reset_query();
            ?>
            
            </div>
            
            <?php } 
            }

endif;
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();


