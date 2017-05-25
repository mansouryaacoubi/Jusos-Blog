<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head profile="http://gmpg.org/xfn/11">

        <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>

        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="MobileOptimized" content="width"/>
        <meta name="HandheldFriendly" content="true" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" id="myViewport"/>
        <meta name="google-site-verification" content="i9ZhI0zPuhJJDZjoeHt-St6FEOZao57p8ZkMEWtZ-eA" />
        <meta name="msvalidate.01" content="F2CB45DF84A34F1170B380900F1DF93F" />
        
        
        <!-- Windows 8 Tile Icon -->
        <meta name="application-name" content="<?php bloginfo('name'); ?>">   
        <meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/images/tile-icon.png">
        <meta name="msapplication-TileColor" content="#e20020">
        <!-- Apple Touch Icon -->
        <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-precomposed.png">
        <meta http-equiv="cleartype" content="on">
        <!--<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-precomposed.png" />-->
        <?php
	    if (has_post_thumbnail( $post->ID ) )
	    {
	    	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	    	echo "<meta property=\"og:image\" content=\"".$image[0]."\" />";
	    }
	    else
	    {
	    	?>
	    	<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-precomposed.png" />
	    	<?php
	    }
    ?>
        
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/jusos_favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" type="text/css"  href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
        <link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet"> <!-- For social icons -->

        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo get_option('home'); ?>/feed" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie7.css" />
        <![endif]-->

<?php if (is_single())
    wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>

        <script type="text/javascript"> 
            var $buoop = {reminder:24} 
            $buoop.ol = window.onload; 
            window.onload=function(){ 
                var e = document.createElement("script"); 
                e.setAttribute("type", "text/javascript"); 
                e.setAttribute("src", "http://browser-update.org/update.js"); 
                document.body.appendChild(e); 
                if ($buoop.ol) $buoop.ol(); 
            } 
        </script> 
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/fontsize.js"></script>	
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/suckerfish.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/scroll.js"></script>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions.   ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/includes/js/html5.js" type="text/javascript"></script>
        <![endif]-->	
    </head>

    <body>
        <?php
        $template_path = get_bloginfo('template_directory');
        $GLOBALS['defaultgravatar'] = $template_path . '/images/gravatar.jpg';
        ?>

<?php
$idObj = get_category_by_slug('category-name');
$id = $idObj->term_id;
?>

        <div id="page">

            <div id="header">

                <div id="header_logo">
                    <a href="<?php echo get_option('home'); ?>/" title="Jusos in der SPD">

                        <?php
                        // If custom logo exists, display it
                        if (get_option('woo_logo')) {
                            echo '<img id="header_logo_pic" src="' . get_option('woo_logo') . '" alt="Jusos in der SPD"/>';
                        }
                        // If no custom logo exists, display the standard Jusos logo
                        else {
                            echo '<img id="header_logo_pic" src="';
                            echo bloginfo('template_directory');
                            echo '/images/logo-jusos.png" alt="Jusos in der SPD"/>';
                        }
                        ?>

                    </a>
                </div>
                <div id="header_links"><a id="header_links_blog" href="<?php echo bloginfo('wpurl'); ?>" title="Startseite">Blog</a></div>

            </div>
            <!--/header -->

<?php include(TEMPLATEPATH . '/includes/version.php'); ?>
<?php #wp_list_categories('orderby=id&title_li=&exclude=8,9' . $ex_aside)   ?>

            <div id="columns-wrap">
                <div id="columns">

                    <div id="header_headline_wrapper">


                        <a href="<?php echo get_option('home'); ?>/">
                            <?php
                            if (get_option('woo_headline1') != "") {
                                echo '<span class="header_line1">' . get_option('woo_headline1') . '</span>';
                            }
                            if (get_option('woo_headline2') != "") {
                                echo ' <span class="header_line2">' . get_option('woo_headline2') . '</span>';
                            }
                            ?>
                        </a>

                        <div id="soc_icons" style="display:inline; float:right;">
                            <a class="soc_icon" style="color:#E2001A; text-decoration: none;" href="<?php echo get_option('home'); ?>/feed" target="_blank" title="RSS"><span class="socicon socicon-rss"></span></a>
                            <a class="soc_icon" style="color:#E2001A; text-decoration: none;" href="https://t.me/jusosag" target="_blank" title="Telegram"><span class="socicon socicon-telegram"></span></a>
                            <a class="soc_icon" style="color:#E2001A; text-decoration: none;" href="https://chat.whatsapp.com/4UQn3LYTXVV4QifKOUiHi1" target="_blank" title="WhatsApp"><span class="socicon socicon-whatsapp"></span></a>
                            <!--<a class="soc_icon" style="color:#E2001A; text-decoration: none;" href="https://www.snapchat.com/add/jusosag" target="_blank" title="Snapchat"><span class="socicon socicon-snapchat"></span></a>
                            <a class="soc_icon" style="color:#E2001A; text-decoration: none;" href="https://www.youtube.com/jusos" target="_blank" title="YouTube"><span class="socicon socicon-youtube"></span></a>
                            <a class="soc_icon" style="color:#E2001A; text-decoration: none;" href="https://twitter.com/jusos" target="_blank" title="Twitter"><span class="socicon socicon-twitter"></span></a>
                            <a class="soc_icon" style="color:#E2001A; text-decoration: none;" href="https://www.instagram.com/jusos/" target="_blank" title="Instagram"><span class="socicon socicon-instagram"></span></a>-->
                            <a class="soc_icon" style="color:#E2001A; text-decoration: none;" href="https://fb.me/jusosag" target="_blank" title="Facebook"><span class="socicon socicon-facebook"></span></a>
                        </div>

                    </div>
                    <!--/header_headline_wrapper -->