<?php if ( get_option('woo_show_ads_bottom') ) { ?>

<div class="box2">

    <div class="top"></div>

    <div class="spacer">
        
        <div class="ads"> 
            
			<a <?php do_action('woo_external_ad_link'); ?> href="<?php echo "$dest_url[3]"; ?>"><img src="<?php echo "$img_url[3]"; ?>" alt="" /></a>

			<a <?php do_action('woo_external_ad_link'); ?> href="<?php echo "$dest_url[4]"; ?>"><img src="<?php echo "$img_url[4]"; ?>" alt="" /></a>

			<a <?php do_action('woo_internal_ad_link'); ?> href="<?php echo "$ad_page"; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ad-here.gif" alt="Advertise Here" class="last" /></a>
            
        </div>
            
    </div>	
    <!--/spacer -->
    
    <div class="bot"></div>

</div>
<!--/box2 -->

<?php } ?>
