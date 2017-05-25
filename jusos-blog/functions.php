<?php

function woothemes_admin_head() { ?>
    <style>

        h2 { margin-bottom: 20px; }
        .title { margin: 0px !important; background: #D4E9FA; padding: 10px; font-family: Georgia, serif; font-weight: normal !important; letter-spacing: 1px; font-size: 18px; }
        .container { background: #EAF3FA; padding: 10px; }
        .maintable { font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif; background: #EAF3FA; margin-bottom: 20px; padding: 10px 0px; }
        .mainrow { padding-bottom: 10px !important; border-bottom: 1px solid #D4E9FA !important; float: left; margin: 0px 10px 10px 10px !important; }
        .titledesc { font-size: 14px; font-weight:bold; width: 220px !important; margin-right: 20px !important; }
        .forminp { width: 700px !important; valign: middle !important; }
        .forminp input, .forminp select, .forminp textarea { margin-bottom: 9px !important; background: #fff; border: 1px solid #D4E9FA; width: 500px; padding: 4px; font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif; font-size: 12px; }
        .forminp span { font-size: 10px !important; font-weight: normal !important; ine-height: 14px !important; }
        .info { background: #FFFFCC; border: 1px dotted #D8D2A9; padding: 10px; color: #333; }
        .forminp .checkbox { width:20px }
        .info a { color: #333; text-decoration: none; border-bottom: 1px dotted #333 }
        .info a:hover { color: #666; border-bottom: 1px dotted #666; }
        .warning { background: #FFEBE8; border: 1px dotted #CC0000; padding: 10px; color: #333; font-weight: bold; }

    </style>
<?php
}

// VARIABLES

$themename = "JUSOS Blog";
$shortname = "jusos";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/flash-news/';
$options = array();

$template_path = get_bloginfo('template_directory');

$layout_path = TEMPLATEPATH . '/layouts/';
$layouts = array();

$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

$bgr_path = TEMPLATEPATH . '/styles/bgr/';
$bgr = array();

$functions_path = TEMPLATEPATH . '/functions/';

$ads_path = TEMPLATEPATH . '/images/ads/';
$ads = array();

$pn_categories_obj = get_categories('hide_empty=0');
$pn_categories = array();

$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');
$woo_pages = array();

if (is_dir($layout_path)) {
    if ($layout_dir = opendir($layout_path)) {
        while (($layout_file = readdir($layout_dir)) !== false) {
            if (stristr($layout_file, ".php") !== false) {
                $layouts[] = $layout_file;
            }
        }
    }
}

if (is_dir($alt_stylesheet_path)) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path)) {
        while (($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
            if (stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }
    }
}

if (is_dir($bgr_path)) {
    if ($bgr_dir = opendir($bgr_path)) {
        while (($bgr_file = readdir($bgr_dir)) !== false) {
            if (stristr($bgr_file, ".css") !== false) {
                $bgr[] = $bgr_file;
            }
        }
    }
}

if (is_dir($modules_path)) {
    if ($modules_dir = opendir($modules_path)) {
        while (($module_file = readdir($modules_dir)) !== false) {
            if (stristr($module_file, ".php") !== false) {
                $file_tmp = substr($module_file, 0, -4);
                $modules[$file_tmp] = $module_file;
            }
        }
    }
}

if (is_dir($ads_path)) {
    if ($ads_dir = opendir($ads_path)) {
        while (($ads_file = readdir($ads_dir)) !== false) {
            if ((stristr($ads_file, ".jpg") !== false) || (stristr($ads_file, ".png") !== false) || (stristr($ads_file, ".gif") !== false)) {
                $ads[] = $ads_file;
            }
        }
    }
}

foreach ($pn_categories_obj as $pn_cat) {
    $pn_categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
}

foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name;
}

$other_entries = array("Select a number:", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19");

$bgr_tmp = asort($bgr);

$categories_tmp = array_unshift($pn_categories, "Select a category:");
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");

// THIS IS THE DIFFERENT FIELDS

$options = array(
    array("name" => "General Settings",
        "type" => "heading"),
    // array("name" => "Background Colour",
        // "desc" => "Choose your desired background colour.",
        // "id" => $shortname . "_bgr",
        // "std" => "Select Background:",
        // "type" => "select",
        // "options" => $bgr),
    // array("name" => "Theme Stylesheet",
        // "desc" => "Please select your colour scheme here.",
        // "id" => $shortname . "_alt_stylesheet",
        // "std" => "Select Stylesheet:",
        // "type" => "select",
        // "options" => $alt_stylesheets),
    array("name" => "Use Gravatars?",
        "desc" => "Check this box if you wish to use <a href='http://www.gravatar.com'>Gravatars</a> for Author & Commenter profiles.",
        "id" => $shortname . "_gravatar",
        "std" => "false",
        "type" => "checkbox"),
    array("name" => "Custom Logo",
        "desc" => "Paste the full URL of your custom logo image, should you wish to replace our default logo.",
        "id" => $shortname . "_logo",
        "std" => "",
        "type" => "text"),
    array("name" => "Headline 1",
        "desc" => "Enter headline text 1 here.",
        "id" => $shortname . "_headline1",
        "std" => "Juso Blog:",
        "type" => "text"),
    array("name" => "Headline 2",
        "desc" => "Enter headline text 2 here.",
        "id" => $shortname . "_headline2",
        "std" => "Gemeinsam ver&#228;ndern",
        "type" => "text"),
    array("name" => "Google Analytics",
        "desc" => "Please paste your Google Analytics (or other) tracking code here.",
        "id" => $shortname . "_google_analytics",
        "std" => "",
        "type" => "textarea"),
//    array("name" => "Feedburner RSS URL",
//        "desc" => "Enter your Feedburner URL here.",
//        "id" => $shortname . "_feedburner_url",
//        "std" => "",
//        "type" => "text"),
//    array("name" => "Feedburner ID",
//        "desc" => "Enter your Feedburner ID here.",
//        "id" => $shortname . "_feedburner_id",
//        "std" => "",
//        "type" => "text"),
//    array("name" => "Archives Page",
//        "desc" => "Please select your archive page. TIP: Add your archive by creating a new page (Write > Page), and selecting the 'Archive' page template.",
//        "id" => $shortname . "_archives",
//        "std" => "Select a page:",
//        "type" => "select",
//        "options" => $woo_pages),
//    array("name" => "Front Page Layout",
//        "type" => "heading"),
//    array("name" => "Front Page Layout",
//        "desc" => "Choose the layout of to be used for the other entries on your homepage.",
//        "id" => $shortname . "_layout",
//        "std" => "Select Layout:",
//        "type" => "select",
//        "options" => $layouts),
//    array("name" => "Homepage Entries (Full)",
        // "desc" => "Select the number of entries that should appear below the Featured Entries or Video Panel.",
        // "id" => $shortname . "_other_entries",
        // "std" => "Select a Number:",
        // "type" => "select",
        // "options" => $other_entries),
    // array("name" => "Homepage Entries (Headline Only)",
        // "desc" => "Select the number of entries that should appear below the Featured Entries or Video Panel.",
        // "id" => $shortname . "_other_headlines",
        // "std" => "Select a Number:",
        // "type" => "select",
        // "options" => $other_entries),
//    array("name" => "Featured Section",
//        "type" => "heading"),
//    array("name" => "Display Featured Panel?",
//        "desc" => "Check this box if you wish to display the featured article section on your homepage.",
//        "id" => $shortname . "_show_featured",
//        "std" => "false",
//        "type" => "checkbox"),
//    array("name" => "Featured Category",
//        "desc" => "Select the category that you would like to have displayed in the featured section on your homepage.",
//        "id" => $shortname . "_featured_category",
//        "std" => "Select a category:",
//        "type" => "select",
//        "options" => $pn_categories),
//    array("name" => "Featured Entries",
//        "desc" => "Select the number of entries that should appear as featured entries on the homepage.",
//        "id" => $shortname . "_featured_entries",
//        "std" => "Select a Number:",
//        "type" => "select",
//        "options" => $other_entries),
//    array("name" => "Sidebar/footer components",
//        "type" => "heading"),
//    array("name" => "Display Video?",
//        "desc" => "Check this box if you wish to display the video panel on your homepage.",
//        "id" => $shortname . "_show_video",
//        "std" => "false",
//        "type" => "checkbox"),
//    array("name" => "Video Category",
//        "desc" => "Select the category that you would like to have displayed in the video panel on your homepage.",
//        "id" => $shortname . "_video_category",
//        "std" => "Select a category:",
//        "type" => "select",
//        "options" => $pn_categories),
//				array(	"name" => "Flickr ID",
//						"desc" => "Use <a href='http://idgettr.com/'>idGettr to find it.",
//			    		"id" => $shortname."_flickr_id",
//			    		"std" => "",
//			    		"type" => "text"),											
//
//				array(	"name" => "Number photos",
//						"desc" => "Select the number of photos to display in flickr sidebar box. (3 per row)",
//			    		"id" => $shortname."_flickr_entries",
//			    		"std" => "Select a Number:",
//			    		"type" => "select",
//			    		"options" => $other_entries),																								

//    array("name" => "Display / Use Asides?",
//        "desc" => "Check this box if you wish to display and use one of your categories as the asides that will be published in the sidebar.",
//        "id" => $shortname . "_show_asides",
//        "std" => "false",
//        "type" => "checkbox"),
//    array("name" => "Asides Category",
//        "desc" => "Select the category that you would like to have displayed as asides (and thus excluded from other homepage areas).",
//        "id" => $shortname . "_asides_category",
//        "std" => "Select a category:",
//        "type" => "select",
//        "options" => $pn_categories),
//    array("name" => "Number of Asides",
//        "desc" => "Select the number of asides to display.",
//        "id" => $shortname . "_asides_entries",
//        "std" => "Select a Number:",
//        "type" => "select",
//        "options" => $other_entries),
        /*
          array(	"name" => "Banner Ad Management",
          "type" => "heading"),

          array(	"name" => "Advertising Page",
          "desc" => "Please select the WordPress page that contains your advertising information &amp; rates.",
          "id" => $shortname."_ad_page",
          "std" => "Select a page:",
          "type" => "select",
          "options" => $woo_pages),

          array(	"name" => "Display top of sidebar",
          "desc" => "Check this box if you would like to display top 2 banner ads in the sidebar.",
          "id" => $shortname."_show_ads_top",
          "std" => "false",
          "type" => "checkbox"),

          array(	"name" => "Banner Ad #1 - Image Location",
          "desc" => "Enter the URL for this banner ad.",
          "id" => $shortname."_ad_image_1",
          "std" => $template_path . "/images/ad-125x125.gif",
          "type" => "text"),

          array(	"name" => "Banner Ad #1 - Destination",
          "desc" => "Enter the URL where this banner ad points to.",
          "id" => $shortname."_ad_url_1",
          "std" => "http://example.com/ads/ad1_destination.html",
          "type" => "text"),

          array(	"name" => "Banner Ad #2 - Image Location",
          "desc" => "Enter the URL for this banner ad.",
          "id" => $shortname."_ad_image_2",
          "std" => $template_path . "/images/ad-125x125.gif",
          "type" => "text"),

          array(	"name" => "Banner Ad #2 - Destination",
          "desc" => "Enter the URL where this banner ad points to.",
          "id" => $shortname."_ad_url_2",
          "std" => "http://example.com/ads/ad1_destination.html",
          "type" => "text"),

          array(	"name" => "Display bottom of sidebar",
          "desc" => "Check this box if you would like to display bottom 2 banner ads in the sidebar.",
          "id" => $shortname."_show_ads_bottom",
          "std" => "false",
          "type" => "checkbox"),

          array(	"name" => "Banner Ad #3 - Image Location",
          "desc" => "Enter the URL for this banner ad.",
          "id" => $shortname."_ad_image_3",
          "std" => $template_path . "/images/ad-125x125.gif",
          "type" => "text"),

          array(	"name" => "Banner Ad #3 - Destination",
          "desc" => "Enter the URL where this banner ad points to.",
          "id" => $shortname."_ad_url_3",
          "std" => "http://example.com/ads/ad1_destination.html",
          "type" => "text"),

          array(	"name" => "Banner Ad #4 - Image Location",
          "desc" => "Enter the URL for this banner ad.",
          "id" => $shortname."_ad_image_4",
          "std" => $template_path . "/images/ad-125x125.gif",
          "type" => "text"),

          array(	"name" => "Banner Ad #4 - Destination",
          "desc" => "Enter the URL where this banner ad points to.",
          "id" => $shortname."_ad_url_4",
          "std" => "http://example.com/ads/ad1_destination.html",
          "type" => "text")
         */
);

// ADMIN PANEL

function woothemes_add_admin() {

    global $themename, $options, $bgr;

    if ($_GET['page'] == basename(__FILE__)) {
        if ('save' == $_REQUEST['action']) {

            foreach ($options as $value) {
                if ($value['type'] != 'multicheck') {
                    update_option($value['id'], $_REQUEST[$value['id']]);
                } else {
                    foreach ($value['options'] as $mc_key => $mc_value) {
                        $up_opt = $value['id'] . '_' . $mc_key;
                        update_option($up_opt, $_REQUEST[$up_opt]);
                    }
                }
            }

            foreach ($options as $value) {
                if ($value['type'] != 'multicheck') {
                    if (isset($_REQUEST[$value['id']])) {
                        update_option($value['id'], $_REQUEST[$value['id']]);
                    } else {
                        delete_option($value['id']);
                    }
                } else {
                    foreach ($value['options'] as $mc_key => $mc_value) {
                        $up_opt = $value['id'] . '_' . $mc_key;
                        if (isset($_REQUEST[$up_opt])) {
                            update_option($up_opt, $_REQUEST[$up_opt]);
                        } else {
                            delete_option($up_opt);
                        }
                    }
                }
            }

            header("Location: admin.php?page=functions.php&saved=true");

            die;
        } else if ('reset' == $_REQUEST['action']) {
            delete_option('sandbox_logo');

            header("Location: admin.php?page=functions.php&reset=true");
            die;
        }
    }

    add_menu_page($themename . " Options", $themename . " Options", 'edit_themes', basename(__FILE__), 'woothemes_page');
}

function woothemes_page() {

    global $options, $themename, $manualurl, $bgr;
    ?>

    <div class="wrap">

        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

            <h2><?php echo $themename; ?> Options</h2>

    <?php if ($_REQUEST['saved']) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s Options has been updated!</div><?php } ?>
    <?php if ($_REQUEST['reset']) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s Options has been reset!</div><?php } ?>						

            <div style="clear:both;height:20px;"></div>

            <div class="info">

    <!--							<div style="width: 70%; float: left; display: inline;padding-top:4px;"><strong>Stuck on these options?</strong> <a href="<?php echo $manualurl; ?>" target="_blank">Read The Documentation Here</a> or <a href="http://forum.woothemes.com" target="blank">Visit Our Support Forum</a></div>-->
                <div style="width: 30%; float: right; display: inline;text-align: right;"><input name="save" type="submit" value="Save changes" /></div>
                <div style="clear:both;"></div>

            </div>	    			

            <!--START: GENERAL SETTINGS-->

            <table class="maintable">

    <?php foreach ($options as $value) { ?>

                <?php if ($value['type'] <> "heading") { ?>

                        <tr class="mainrow">
                            <td class="titledesc"><?php echo $value['name']; ?></td>
                            <td class="forminp">

        <?php } ?>		 

        <?php
        switch ($value['type']) {
            case 'text':
                ?>

                                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (get_settings($value['id']) != "") {
                    echo get_settings($value['id']);
                } else {
                    echo $value['std'];
                } ?>" />

                            <?php
                            break;
                        case 'select':
                            ?>

                                    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                                    <?php foreach ($value['options'] as $option) { ?>
                                            <option<?php if (get_settings($value['id']) == $option) {
                                            echo ' selected="selected"';
                                        } elseif ($option == $value['std']) {
                                            echo ' selected="selected"';
                                        } ?>><?php echo $option; ?></option>
                                    <?php } ?>
                                    </select>

                <?php
                break;
            case 'textarea':
                $ta_options = $value['options'];
                ?>

                                    <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="8"><?php if (get_settings($value['id']) != "") {
                        echo stripslashes(get_settings($value['id']));
                    } else {
                        echo $value['std'];
                    } ?></textarea>

                                        <?php
                                        break;
                                    case "radio":

                                        foreach ($value['options'] as $key => $option) {

                                            $radio_setting = get_settings($value['id']);

                                            if ($radio_setting != '') {

                                                if ($key == get_settings($value['id'])) {
                                                    $checked = "checked=\"checked\"";
                                                } else {
                                                    $checked = "";
                                                }
                                            } else {

                                                if ($key == $value['std']) {
                                                    $checked = "checked=\"checked\"";
                                                } else {
                                                    $checked = "";
                                                }
                                            }
                                            ?>

                                        <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />

                                    <?php
                                    }

                                    break;
                                case "checkbox":

                                    if (get_settings($value['id'])) {
                                        $checked = "checked=\"checked\"";
                                    } else {
                                        $checked = "";
                                    }
                                    ?>

                                    <input type="checkbox" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />

                <?php
                break;
            case "multicheck":

                foreach ($value['options'] as $key => $option) {

                    $pn_key = $value['id'] . '_' . $key;
                    $checkbox_setting = get_settings($pn_key);

                    if ($checkbox_setting != '') {

                        if (get_settings($pn_key)) {
                            $checked = "checked=\"checked\"";
                        } else {
                            $checked = "";
                        }
                    } else {
                        if ($key == $value['std']) {
                            $checked = "checked=\"checked\"";
                        } else {
                            $checked = "";
                        }
                    }
                    ?>

                                        <input type="checkbox" class="checkbox" name="<?php echo $pn_key; ?>" id="<?php echo $pn_key; ?>" value="true" <?php echo $checked; ?> /><label for="<?php echo $pn_key; ?>"><?php echo $option; ?></label><br />

                                    <?php
                                    }

                                    break;
                                case "heading":
                                    ?>

                        </table> 

                        <h3 class="title"><?php echo $value['name']; ?></h3>

                        <table class="maintable">

                            <?php
                            break;
                        default:
                            break;
                    }
                    ?>

        <?php if ($value['type'] <> "heading") { ?>

                        <?php if ($value['type'] <> "checkbox") { ?><br/><?php } ?><span><?php echo $value['desc']; ?></span>
                        </td></tr>

        <?php } ?>		

    <?php } ?>	

            </table>	

            <p class="submit">
                <input name="save" type="submit" value="Save changes" />    
                <input type="hidden" name="action" value="save" />
            </p>							

            <div style="clear:both;"></div>		

            <!--END: GENERAL SETTINGS-->						

        </form>

    </div><!--wrap-->

    <div style="clear:both;height:20px;"></div>

    <?php
}

;

function woothemes_wp_head() {
    $style = $_REQUEST[style];
    if ($style != '') {
        ?> <link href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $style; ?>.css" rel="stylesheet" type="text/css" /><?php
    } else {
        $stylesheet = get_option('woo_alt_stylesheet');
        if ($stylesheet != '') {
            ?><link href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css" /><?php
        }
    }
    $bgr = $_REQUEST[bgr];
    if ($bgr != '') {
        ?> <link href="<?php bloginfo('template_directory'); ?>/styles/bgr/<?php echo $bgr; ?>.css" rel="stylesheet" type="text/css" /><?php
    }
}

add_action('wp_head', 'woothemes_wp_head');
add_action('admin_menu', 'woothemes_add_admin');
add_action('admin_head', 'woothemes_admin_head');

// OTHER FUNCTIONS

if (function_exists('register_sidebar'))
    register_sidebars(3, array(
        'before_widget' => '<aside id="%1$s" class="widget shadow %2$s">',
        'after_widget' => '</aside><!--/widget-->',
        'before_title' => '<h3 class="hl">',
        'after_title' => '</h3>',
    ));

$bm_trackbacks = array();
$bm_comments = array();

function split_comments($source) {

    if ($source)
        foreach ($source as $comment) {

            global $bm_trackbacks;
            global $bm_comments;

            if ($comment->comment_type == 'trackback' || $comment->comment_type == 'pingback') {
                $bm_trackbacks[] = $comment;
            } else {
                $bm_comments[] = $comment;
            }
        }
}

// Custom fields 
require_once ($functions_path . '/custom.php');

// Easytube
require_once ($functions_path . '/easytube.php');

// Use legacy comments on versions before WP 2.7
add_filter('comments_template', 'legacy_comments');

function legacy_comments($file) {

    if (!function_exists('wp_list_comments')) : // WP 2.7-only check
        $file = TEMPLATEPATH . '/comments-legacy.php';
    endif;

    return $file;
}
// Artikelbilder aktivieren
add_theme_support( 'post-thumbnails' );

//installiert Plugins und aktiviert sie
include TEMPLATEPATH . '/iclt-resources/iclt-deploy.php';

//jQuery laden
function insert_jquery() {
    wp_enqueue_script('jquery');
}

add_filter('wp_head', 'insert_jquery');

//menu registrieren
// custom menus
add_action('init', 'register_custom_menu');

function register_custom_menu() {
    register_nav_menu('menu1', __('Haupt Menu im Footer'));
}

add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);

function new_nav_menu_items($items, $args) {
    if ($args->theme_location == 'menu1') {
        $alink = is_home() ? ' current-menu-item' : '';
        $toplink = '<li class="gotop"><a href="#page" title="nachoben">Nach oben</a></li>';
        $homelink = '<li class="home'. $alink.'"><a href="' . home_url('/') . '">' . __('Home') . '</a></li>';
        $searchlink = '<li id="search">
            <form method="get" id="searchform" action="'.home_url('').'/">
                <input type="text" value="Suche" onclick="this.value=\'\';" name="s" id="s" />
                <input name="" type="image" src="'. get_bloginfo('template_directory').'/images/btn-search.png" value="Go" class="btn"  />
            </form>
        </li>';
        $items = $toplink . $homelink . $items . $searchlink;
    }
    return $items;
}

?>