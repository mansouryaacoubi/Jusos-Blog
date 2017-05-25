<?php
		$version = get_bloginfo('version');

		if ($version > "2.3") { 
		
			$featuredcat = get_option('woo_featured_category'); // ID of the Featured Category
			$ex_feat = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$featuredcat'");
	
			$vidcat = get_option('woo_video_category'); // ID of the Video Category
			$ex_vid = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$vidcat'");

			$asidecat = get_option('woo_asides_category'); // ID of the Asides Category
			$ex_aside = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$asidecat'");			
			
			$showposts = get_option('woo_other_entries'); // Number of other entries to be shown
			$show_headlines = get_option('woo_other_headlines'); // Number of headlines to be shown
		
			$disable_ads = get_option('woo_disable_ads'); // Disable sidebar 125x125 ads
			
		} else {
		
			$featuredcat = get_option('woo_featured_category'); // ID of the Featured Category
			$ex_feat = $wpdb->get_var("SELECT cat_ID FROM $wpdb->categories WHERE cat_name='$featuredcat'");

			$vidcat = get_option('woo_video_category'); // ID of the Video Category
			$ex_vid = $wpdb->get_var("SELECT cat_ID FROM $wpdb->categories WHERE cat_name='$vidcat'");

			$asidecat = get_option('woo_asides_category'); // ID of the Asides Category
			$ex_aside = $wpdb->get_var("SELECT cat_ID FROM $wpdb->categories WHERE cat_name='$asidecat'");			
			
			$showposts = get_option('woo_other_entries'); // Number of other entries to be shown
			$show_headlines = get_option('woo_other_headlines'); // Number of headlines to be shown		
		
			$disable_ads = get_option('woo_disable_ads'); // Disable sidebar 125x125 ads
		}
		
		$archives = get_option('woo_archives'); // Name of the archives page
		$GLOBALS['archives_id'] = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$archives'");
		
?>