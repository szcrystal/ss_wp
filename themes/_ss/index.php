<?php
/**
 * Template Name: Top
 *
 */

get_header(); ?>

<div class="load">
<p class="ent"><img src="<?php thisUrl('images/symbol.png'); ?>"></p>
</div>

<div class="wrap-cal">
    <div class="cal">
    
    	<?php if(isAgent('all')) { ?>
        
        	<div id="mainMv" style="background-image:url(<?php thisUrl('images/top-sp-v.png'); ?>);"></div>
        
        <?php } else { ?>

    	<?php
            $v = array(
                
                /* 動画更新部分 ここから *************************************** */
                '00096', /*動画更新部分 ここの''の中にファイル名を記載 */
                '00102',
                '00107',
                
                /* 動画更新部分 ここまで *************************************** */
            );

            //$selectV = $v[rand(0, count($v)-1)];
            $selectV = $v[0];
            $video = 'images/mv/'. $selectV .'.mp4';
            $image = 'images/mv/'. $selectV .'.png';
            //$loader = 'images/mv/loader.gif';
        ?>

        
    	<video id="mainMv" autoplay loop muted="1" width="1024" height="576" poster="<?php thisUrl($image); ?>">
        	<?php /* autoplay loop tabindex="0" */ ?>
            <source src="<?php thisUrl($video); ?>" type='video/mp4' />
            <?php /* video/mp4; codecs="avc1.42E01E, mp4a.40.2" */ ?>
            
        </video>

        <?php } ?>

    </div>
</div>

<div id="content" class="site-content">

	<div class="ctr">
		<img src="<?php thisUrl('images/logo-w.png'); ?>">
    	<i class="fa fa-play-circle" aria-hidden="true"></i>
    </div>

<?php
get_footer();

