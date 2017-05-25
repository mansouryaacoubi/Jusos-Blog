<?php 
// reasons to get out
if(is_admin() || !current_user_can('manage_options') || isset($_GET['preview'])){
    return;
}

/* EDIT THESE **********************************************************************************************************/
define('ICLT_PL_DEP_DEBUG', false);
define('ICLT_CLEAR_PREVIOUSLY_INSTALLED_FLAGS', false); // when set the plugins will be installed/updated and/or activated 
                                                        // regardless of them being previously installed and de-activated
/* EDIT THESE **********************************************************************************************************/


// get the plugins fodler
if ( ! defined( 'WP_CONTENT_DIR' ) ) define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' ); // some backwards compatibility
if ( ! defined( 'WP_PLUGIN_DIR' ) ) define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' ); // some backwards compatibility

$iclt_plugin_zip_folder = dirname(__FILE__) . '/iclt-plugins';
$iclt_plugins_list_file = $iclt_plugin_zip_folder . '/iclt-plugins.txt';

if(ICLT_CLEAR_PREVIOUSLY_INSTALLED_FLAGS === true){
    update_option('_iclt_auto_install',array());
}

//get the plugins list
if(!file_exists($iclt_plugins_list_file)) return;
$iclt_tmp = file($iclt_plugins_list_file);
foreach($iclt_tmp as $k=>$v){
    $exp = explode('>',$v);
    $iclt_plugins_list[] = trim($exp[1]);    
    $iclt_plugins_zip[trim($exp[1])] = trim($exp[0]);
}

//check for plugins that are already activated installed
$iclt_active_plugins = get_option('active_plugins');
if($iclt_active_plugins){
    $iclt_plugins_list = array_diff($iclt_plugins_list,$iclt_active_plugins);
    if(empty($iclt_plugins_list)){ //all plugins already activated
        iclt_debug('all plugins already activated. exiting');
        return;    
    }
}
iclt_debug('we have plugins in the list that are not activated. continuing');


$iclt_auto_installed = (array) get_option('_iclt_auto_install');

$iclt_plugins_list = array_diff($iclt_plugins_list, $iclt_auto_installed);
if(empty($iclt_plugins_list)){ //all plugins already activated at some point
    iclt_debug('all plugins flagged as previously installed. exiting');
    return;    
}

iclt_debug('we have plugins in the list that have not been previously installed. continuing');

//check for plugins that are already installed but not activated
$installed_an_not_activated = array();
foreach($iclt_plugins_list as $k=>$v){
    if(file_exists(WP_PLUGIN_DIR . '/' . $v)){
        iclt_debug(sprintf('the plugin %s is already installed but not activated',$v));
        unset($iclt_plugins_list[$k]);
        $installed_an_not_activated[] = $v;        
    }
}
if(!empty($installed_an_not_activated)){
    add_action('wp_footer','iclt_auto_warning_message');    
}

if(!is_writable(WP_PLUGIN_DIR)){
    add_action('wp_footer','iclt_auto_error_message');
    iclt_debug('plugins folder not writable');
}else{
    if($iclt_plugins_list){
        $zip = new ZipArchive;                            
        foreach($iclt_plugins_list as $iclt_plugin){
            iclt_debug(sprintf('reading archive: %s',$iclt_plugins_zip[$iclt_plugin]));
            if ($zip->open($iclt_plugin_zip_folder . '/' . $iclt_plugins_zip[$iclt_plugin]) === TRUE) {
                $exp = explode('/',$iclt_plugin);
                $ret = $zip->extractTo(WP_PLUGIN_DIR);        
                iclt_debug(sprintf('plugin %s extracted [%d]',$exp[0], $ret));
                @include(WP_PLUGIN_DIR . '/' . $iclt_plugin); 
                $iclt_active_plugins[] = $iclt_plugin;        
                iclt_debug(sprintf('added %s to active plugins',$iclt_plugin));
                do_action('activate_' . $iclt_plugin);                  
                $iclt_auto_installed[] = $iclt_plugin;
                iclt_debug(sprintf('added %s to flagged plugins',$iclt_plugin));
            }else{
              iclt_debug(sprintf('failed reading archive: %s',$iclt_plugins_zip[$iclt_plugins_list]));
            }
        }
        $zip->close();
        update_option('_iclt_auto_install',$iclt_auto_installed,'',1);
        iclt_debug('saved flagged plugins');
        sort($iclt_active_plugins);
        update_option('active_plugins', $iclt_active_plugins);            
        iclt_debug('saved active plugins');
        //@unlink($iclt_plugin_zip_file);
    }
}    


function iclt_error_wrap($message){    
    ?>    
    <style>code{font-weight: bold;}</style>
    <div style="position:absolute;top:0;left:0;width:100%;background-color:rgba(255,211,211,0.9);text-align-center;">
        <p><?php echo $message ?></p>
    </div>
    <?php    
}
function iclt_warning_wrap($message){    
    ?>    
    <style>code{font-weight: bold;}</style>
    <div style="position:absolute;top:0;left:0;width:100%;background-color:rgba(171,208,188,0.9);text-align-center;">
        <p><?php echo $message ?></p>
    </div>
    <?php    
}
function iclt_auto_error_message(){
        global $iclt_plugins_list;
        foreach($iclt_plugins_list as $p){
            $exp = explode('/',$p);
            if(count($exp) > 0){
                $folders[] = '<code>' . $exp[0] . '</code>';
            }else{
                $files[] = '<code>' . $exp[0] . '</code>';
            }            
        }
        if($folders){
            $mess = '<br />Create these folders in <code>'.WP_PLUGIN_DIR.'</code> and make them readable by the web server: ' . join(', ',$folders);
        }
        if($files){
            $mess .= '<br />Create these files in <code>'.WP_PLUGIN_DIR.'</code> and make them readable by the web server: ' . join(', ',$files);
        }        
       iclt_error_wrap('ERROR: Failed to deploy the bundled plugins. <br />Please make sure that <code>'.WP_PLUGIN_DIR.'</code> has writing permissions for the web server. <br /> Alternatively you can: ' . $mess);
}

function iclt_auto_warning_message(){
    global $installed_an_not_activated;
    $mess = 'Warning - the following plugins are already installed but not activated: <br />';
    foreach($installed_an_not_activated as $k=>$v){
        $mess .= $v . ' - <a href="'.get_option('home').'/wp-admin/plugins.php?action=activate&plugin='.$v.'&amp;_wpnonce='.wp_create_nonce('activate-plugin_'.$v).'">activate</a><br />';
    }
    iclt_warning_wrap($mess);
}


$iclt_debug = 0;
function iclt_debug($message){
    if(ICLT_PL_DEP_DEBUG !== true) return;
    global $iclt_debug;
    if(!$iclt_debug){
        $iclt_debug = fopen(dirname(__FILE__) . '/debug.txt','w') or die('Debugging is enabled but I can\'t write to ' . dirname(__FILE__) . '/debug.txt');
        fwrite($iclt_debug, 'Start debug: ' . date('Y-m-d H:i:s') . "\n");
    }
    fwrite($iclt_debug, $message . "\n");
}


?>