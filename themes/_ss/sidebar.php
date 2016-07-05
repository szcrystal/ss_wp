<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php if(is_single()) { ?>
		<div class="author-single row">
        	<h3>この記事を書いた人</h3>
            <?php
                
                $q = new WP_Query(array(
                    'post_type'=> 'member',
                    'meta_key' => 'author_name',
                    'meta_value' => get_the_author(),
                    'posts_per_page'=> -1,
                ));
                
                if($q->have_posts()) {
                	while ( $q->have_posts() ) : $q->the_post();
                 		 $author_name = get_the_title();  
                    endwhile;
                }
                else {
                	$author_name = get_the_author();
                }
                
                wp_reset_query();
                
                $author_bio_avatar_size = apply_filters( 'twentysixteen_author_bio_avatar_size', 150 );
                echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
                echo '<div class="fright">'. '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="bookmark">' . $author_name . '</a></div>';
            ?>
        
        </div><!-- .author-avatar-single -->
		
	<?php } ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
