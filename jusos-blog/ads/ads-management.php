<?php
$ad_page = get_option('woo_ad_page') . '/';

$counter = 0;

if (get_option('woo_show_ads_bottom') && get_option('woo_show_ads_top')) 
	$numbers = range(1,4); 
elseif (!get_option('woo_show_ads_bottom'))
	$numbers = range(1,2); 
elseif (get_option('woo_show_ads_bottom') && !get_option('woo_show_ads_top')) {
	$numbers = range(3,4); 
	$counter = 2;
}
	


$img_url = array();
$dest_url = array();

shuffle($numbers);

foreach ($numbers as $number) {
	
	$counter++;
	
	$img_url[$counter] = get_option('woo_ad_image_'.$number);
	$dest_url[$counter] = get_option('woo_ad_url_'.$number);
	
}

?> 