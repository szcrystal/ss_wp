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
	<header class="entry-header">
		<?php
//			if ( is_single() ) {
//				the_title( '<h1 class="entry-title">', '</h1>' );
//			} else {
//				//the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
//                the_title( '<h2 class="entry-title">', '</h2>' );
//			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php _s_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
        	//the_post_thumbnail();
			
            the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', '_s' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    
    <?php
        $q = new WP_Query(array(
        	'post_type'=> 'post',
            'author_name' => 'admin'/*get_the_author_meta( 'ID' )*/,
           	'posts_per_page'=> 3,
           	'post_status' => 'publish',
            'orderby'=>'date ID',
            'order'=>'DESC',
        ));
        
        if ( $q -> have_posts() ) : ?>
        
        <div class="author-post clear">
        	<h3>この人が書いたブログ</h3>
        	<?php while ( $q->have_posts() ) : $q->the_post(); ?>
            <article class="index">
            	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            	<div class="wrap-thumb">
                    <?php the_post_thumbnail(); ?>
                </div>
                
                <div class="cover-bl">
                    <div class="fright">
                        <h4 class="entry-title"><?php the_title(); ?></h4>
                    </div>
                </div>
                </a>
            </article>
            
            <?php
            endwhile; ?>
		</div>

    <?php endif; ?>


	<footer class="entry-footer">
		<?php //_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
