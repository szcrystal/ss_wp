<?php
/**
 * Template Name: Top
 *
 */

get_header(); ?>

<div class="load">
<p class="ent"><img src="<?php thisUrl('images/symbol.png'); ?>"></p>
</div>

<div class="wrap-cal" data-speed="2.5" data-y="60">
    <div class="cal">

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
                'inaki',
                '001112', /*動画更新部分 ここの''の中にファイル名を記載 */
                '00096',
                '00107',
                //'item_2',
                
                /* 動画更新部分 ここまで *************************************** */
            
            );

            //$selectV = $v[rand(0, count($v)-1)];
            $selectV = $v[2];
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

        	<!-- <img src="<?php thisUrl($loader); ?>" class="agif"> -->
        <?php } ?>

    </div>
</div>

<div id="content" class="site-content">

	<div class="ctr">
	<img src="<?php thisUrl('images/logo-w.png'); ?>">
    <i class="fa fa-play-circle" aria-hidden="true"></i>
    </div>

<?php
//get_sidebar();
get_footer();
