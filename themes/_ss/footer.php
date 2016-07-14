<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

	

	<footer id="colophon" class="site-footer" role="contentinfo">
		
        <div class="site-info clear">
			<div class="footer-menu">
				<?php wp_nav_menu( array( 
                	'menu_name' => 'footer-menu', 
                    'menu_id' => 'foot-menu',
                	'link_before' => '<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>',    
                ) ); ?>
            </div>
            <div>
            	<address>
                	<img src="<?php thisUrl('images/logo-white.png'); ?>" />
                    <p>〒150-0031<br>東京都渋谷区桜丘町27-1<br>エグゼクティブ渋谷204<br>
						TEL:03-6452-5812<br>FAX:03-6452-5814</p>
                </address>
            </div>
		</div>
        
        <div>
        	<small><i class="fa fa-copyright" aria-hidden="true"></i> Copyright All Rights Reserved SoraSeed</small>
        </div>
	</footer><!-- #colophon -->
    
    </div><!-- #all -->
    
    </div><!-- #content -->
    
</div><!-- #page -->

<?php wp_footer(); ?>

<span class="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
</body>
</html>

