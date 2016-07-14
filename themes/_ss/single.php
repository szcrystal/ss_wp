<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>

<div id="content" class="site-content">

<div class="wrap-blog clear">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation(
            	array(
            		'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i> 前の記事',
                    'next_text' => '次の記事 <i class="fa fa-angle-double-right" aria-hidden="true"></i>'
                )
            );

			// If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
        
        
        <?php
        $q = new WP_Query(array(
        	'post_type'=> 'post',
            'author' => get_the_author_meta( 'ID' ),
            'post__not_in' => array(get_the_ID()),
           	'posts_per_page'=> 3,
           	'post_status' => 'publish',
            'orderby'=>'date ID',
            'order'=>'DESC',
        ));
        
        if ( $q -> have_posts() ) : ?>
        
        <div class="author-post clear">
        	<h3>このブログの作者が書いた他の記事</h3>
        	<?php while ( $q->have_posts() ) : $q->the_post(); ?>
            <article class="index">
            	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="wrap-thumb">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    
                    <div class="fright">
                        <h4 class="entry-title"><?php the_title(); ?></h4>
                    </div>
                </a>
            </article>
            
            <?php
            endwhile; ?>
		</div>

		<?php endif;
        
        
        ?>
	</div><!-- #primary -->

<?php
get_sidebar(); ?>

</div>

<?php
get_footer();

