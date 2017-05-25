<div id="rightcol">

	<?php 
		  include(TEMPLATEPATH . '/includes/stylesheet.php'); 
   		  include(TEMPLATEPATH . '/includes/version.php');	
	?>

	<?php include('ads/ads-management.php'); ?>

	<?php include('ads/ads-top.php'); ?>
  
        <?php include('ads/ads-bottom.php'); ?>

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : endif ?>
    		
</div><!--/rightcol-->

<div class="fix"></div>
