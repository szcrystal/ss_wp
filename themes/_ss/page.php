<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); 

//print_r($_SERVER);

//if(strpos($_SERVER['REQUEST_URI'], 'about') !== false) {
//	get_header();
//    echo "bbb"; 
//}
//else {
//	echo "aaa";
//	include_once('../../../wp-config.php');
//}
?>




<div class="wrap-cal" data-speed="2.5" data-y="0">
    <div class="cal">
    
    <?php 
	global $post;
	$slug = get_page_slug($post->ID);
	
    if($slug == 'about') {
	
    ?>
    
    <?php
        /* 動画更新の入力方法 ==============================================
            	フォーマット（下記をコピペしてもいいです）---------------
                
                'file-name',
                
                --------------------------------------------------
                １）' '（シングルクォーテーション）の中にファイル名を入力し、末尾に,（カンマ）を付ける
                ２）削除する場合はフォーマットごと削除する。（ファイル名のみを消して『 '', 』と残すのではなく、１行ごと全て丸々削除する）
                ３）新規に増やす場合は、末行を改行して「動画更新部分 ここまで」の上部にフォーマットごと追加する
        
        ================================================================= */
            $v = array(
                
                /* 動画更新部分 ここから *************************************** */
                '001112', /*動画更新部分 ここの''の中にファイル名を記載 */
                '00107',
                //'item_2',
                
                /* 動画更新部分 ここまで *************************************** */
            
            );

            //$selectV = $v[rand(0, count($v)-1)];
            $selectV = $v[0];
            $video = 'images/mv/'. $selectV .'.mp4';
            $image = 'images/mv/'. $selectV .'.png';
            $loader = 'images/mv/loader.gif';
        ?>

		<!-- <div class="filter"></div> -->
        
    	<video id="mainMv" autoplay loop muted="1" width="1024" height="576" poster="<?php thisUrl($image); ?>"<?php if(isAgent('tab')) echo ' controls="controls"'; ?>>
        	<?php /* autoplay loop tabindex="0" */ ?>
            <source src="<?php thisUrl($video); ?>" type='video/mp4' />
            <?php /* video/mp4; codecs="avc1.42E01E, mp4a.40.2" */ ?>
            
        </video>
        <?php if(! isAgent('tab')) { ?>

        <img src="<?php thisUrl($loader); ?>" class="agif">
        <?php } ?>

    <?php } else { ?>
    	<?php the_post_thumbnail(); ?>
    <?php } ?>  
        
    </div>
    
    <?php the_title( '<h1 class="entry-t" data-speed="2.8" data-y="370">', '</h1>' ); ?>
    
</div>





<div id="content" class="site-content">
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
