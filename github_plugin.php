<?php
/*
*Plugin Name:github_plugin
*Plugin URI:
*Author: github.pk
*Description:github repostries checking plugin.
*Version: 1.0.0
*License: GPLv2 or later
*Text Domain: github
*License: GPL v2 or later
*License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/
//if this file is called directly, abort.  
if(!defined('WPINC'))
{
die;
}  

if(!defined('WPAC_PLUGIN_VERSION')){
define('WPAC_PLUGIN_VERSION','1.0.0');
}

if(!defined('WPAC_PLUGIN_DIR')){
define('WPAC_PLUGIN_DIR',plugin_dir_url( __FILE__ ));
}

if(!function_exists('wpac_plugin_scripts')){
  
function wpac_plugin_scripts(){
wp_enqueue_style('wpac-css',WPAC_PLUGIN_DIR.'assets/css/style.css '); 
wp_enqueue_script('wpac-js',WPAC_PLUGIN_DIR.'assets/js/main.js','jQuery','1.0.0',true); 

wp_enqueue_script('wpac-ajax',WPAC_PLUGIN_DIR.'assets/js/ajax.js','jQuery','1.0.0',true); 


wp_localize_script('wpac-ajax','wpac_ajax_url',array('ajax_url'=>admin_url('admin-ajax.php')));

}
add_action('wp_enqueue_scripts','wpac_plugin_scripts');
}     

require plugin_dir_path(__FILE__).'inc/settings.php';

//creating table
require plugin_dir_path(__FILE__).'inc/dp.php';

//two btns
require plugin_dir_path(__FILE__).'inc/btns.php';

function first_btn_ajax_action(){

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "github_register";

//if(isset([$_POST['pid']]) && isset($_POST['uid']))
//{

$wpdb->insert( 
	''.$table_name.'', 
	array( 
		'user_id' => 23, 
                'post_id' => 23, 
		'user_Name' =>'d',
               'pass' =>'sds'
	), 
	array( '%d',
               '%d',
		'%s', 
                '%s'
		 
	) 
);
if($wpdb->insert_id)
{
echo 'insallah ab ho ga';
}
else
{
echo 'ni hoga';
}
//}


echo 'ajax success';
wp_die();
}
//add_action('init','first_btn_ajax_action');

add_action('wp_ajax_first_btn_ajax_action','first_btn_ajax_action');
//add_action('wp_ajax_nopriv_first_btn_ajax_action','first_btn_ajax_action');
 
?>







?>
