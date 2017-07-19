<?php
/*
Plugin Name: Documentation Plus
Plugin URI: http://pickplugins.com
Description: Fully responsive and mobile ready accordion grid for wordpress.
Version: 1.0.5
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


define('documentation_plus_plugin_url', plugins_url('/', __FILE__)  );
define('documentation_plus_plugin_dir', plugin_dir_path( __FILE__ ) );
define('documentation_plus_wp_url', 'https://wordpress.org/plugins/documentation-plus/' );
define('documentation_plus_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/documentation-plus' );
define('documentation_plus_pro_url','https://pickplugins.com/' );
define('documentation_plus_demo_url', 'https://pickplugins.com' );
define('documentation_plus_conatct_url', 'https://pickplugins.com/contact' );
define('documentation_plus_qa_url', 'https://pickplugins.com/question/' );
define('documentation_plus_plugin_name', 'Documentation Plus' );
define('documentation_plus_share_url', 'https://wordpress.org/plugins/documentation-plus/' );
define('documentation_plus_tutorial_video_url', '//www.youtube.com/embed/h2wNFJaaY8s?rel=0' );

define('documentation_plus_textdomain', 'documentation-plus' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');
require_once( plugin_dir_path( __FILE__ ) . 'templates/single-documentation-template-functions.php');





function documentation_plus_paratheme_init_scripts(){

		//wp_enqueue_script( 'jquery' );
		//wp_enqueue_script( 'jquery-ui-core' );
	//	wp_enqueue_script('jquery-ui-accordion');		
		//wp_enqueue_script('documentation_plus_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		//wp_localize_script('documentation_plus_js', 'documentation_plus_ajax', array( 'documentation_plus_ajaxurl' => admin_url( 'admin-ajax.php')));
		
		//wp_enqueue_script('jquery.tablednd.js', plugins_url( '/js/jquery.tablednd.js' , __FILE__ ) , array( 'jquery' ));
		//wp_enqueue_style('jquery-ui', documentation_plus_plugin_url.'css/jquery-ui.css');	
		wp_enqueue_style('documentation_plus_style', documentation_plus_plugin_url.'css/style.css');		
		wp_enqueue_style('font-awesome', documentation_plus_plugin_url.'css/font-awesome.css');
		wp_enqueue_style('single-documentation', documentation_plus_plugin_url.'css/single-documentation.css');			
		

		if(!is_admin()){
			wp_enqueue_style('bootstrap.min', documentation_plus_plugin_url.'css/bootstrap.min.css');
			}
		
		
		
		//wp_enqueue_style( 'wp-color-picker' );
		//wp_enqueue_script( 'documentation_plus_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );



		//ParaAdmin
		wp_enqueue_style('ParaAdmin', documentation_plus_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		//wp_enqueue_style('ParaIcons', documentation_plus_plugin_url.'ParaAdmin/css/ParaIcons.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));


	}
add_action("init","documentation_plus_paratheme_init_scripts");


register_activation_hook(__FILE__, 'documentation_plus_paratheme_activation');


function documentation_plus_paratheme_activation()
	{
		
		documentation_posttype_register();
		flush_rewrite_rules();
		

		//update_option('documentation_plus','done');
		
		
	}




add_action('admin_menu', 'documentation_plus_paratheme_menu_init');


	
function documentation_plus_paratheme_menu_help(){
	include('documentation-plus-help.php');	
}


function documentation_plus_paratheme_menu_init()
	{
			
		add_submenu_page('edit.php?post_type=documentation', __('Help & Contact','documentation_plus'), __('Help & Contact','documentation_plus'), 'manage_options', 'documentation_plus_paratheme_menu_help', 'documentation_plus_paratheme_menu_help');
	
		

	}





?>