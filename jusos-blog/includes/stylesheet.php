<?php
	global $style_path;
	
	$stylesheet = get_option('woo_alt_stylesheet');
	
	if ( $stylesheet == 'default.css' ) { $style_path = 'default'; }
	elseif ( $stylesheet == 'lightblue.css' ) { $style_path = 'lightblue'; }
	elseif ( $stylesheet == 'darkblue.css' ) { $style_path = 'darkblue'; }	
	elseif ( $stylesheet == 'red.css' ) { $style_path = 'red'; }
	elseif ( $stylesheet == 'green.css' ) { $style_path = 'green'; }
	elseif ( $stylesheet == 'purple.css' ) { $style_path = 'purple'; }
	elseif ( $stylesheet == 'pink.css' ) { $style_path = 'pink'; }
	elseif ( $stylesheet == 'lime.css' ) { $style_path = 'lime'; }	
	elseif ( $stylesheet == 'grey.css' ) { $style_path = 'grey'; }	
	else { $style_path = 'default'; }
?>

