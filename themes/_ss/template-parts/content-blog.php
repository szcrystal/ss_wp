<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
    	$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id, true);
    	
    ?>
	<div class="wrap-thumb">
    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image:url(<?php echo $image_url[0]; ?>)">
    	<?php //the_post_thumbnail(); ?>
        </a>
    </div>

	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
        	<a href="<?php the_permalink(); ?>"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo ''. get_the_date(); ?></a>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
        	//the_post_thumbnail();
            
            sz_content(87);
			
//            the_content( sprintf(
//				/* translators: %s: Name of current post. */
//				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', '_s' ), array( 'span' => array( 'class' => array() ) ) ),
//				the_title( '<span class="screen-reader-text">"', '"</span>', false )
//			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
