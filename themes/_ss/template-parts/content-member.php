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
	
    <a href="<?php echo esc_url(get_permalink()); ?>">
    
        <div class="wrap-img">
            <?php the_post_thumbnail(); ?>
        </div>
        
        <header class="entry-header">
            <h3>
            <?php 
            $copy = get_post_meta(get_the_ID(), 'catch_copy', true);
            echo "<span>" .$copy."</span>". get_the_title();
            ?>
            </h3>
        </header>

    </a>
</article>
