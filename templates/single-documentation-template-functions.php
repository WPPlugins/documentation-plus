<?php
/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


add_action( 'documentation_plus_action_single_documentation_main', 'documentation_plus_template_single_documentation_sidebar', 20 );
add_action( 'documentation_plus_action_single_documentation_main', 'documentation_plus_template_single_documentation_title', 10 );
add_action( 'documentation_plus_action_single_documentation_main', 'documentation_plus_template_single_documentation_breadcrumb', 10 );
add_action( 'documentation_plus_action_single_documentation_main', 'documentation_plus_template_single_documentation_meta', 10 );
add_action( 'documentation_plus_action_single_documentation_main', 'documentation_plus_template_single_documentation_content', 20 );

//add_action( 'documentation_plus_action_single_documentation_main', 'documentation_plus_template_single_documentation_images', 20 );

//add_action( 'documentation_plus_action_single_documentation_main', 'documentation_plus_template_single_documentation_meta_cat', 20 );	
	

//add_action( 'documentation_plus_action_single_documentation_main', 'documentation_plus_template_single_documentation_css', 20 );









if ( ! function_exists( 'documentation_plus_template_single_documentation_title' ) ) {

	
	function documentation_plus_template_single_documentation_title() {
				
		require_once( documentation_plus_plugin_dir. 'templates/single-documentation-title.php');
	}
}


if ( ! function_exists( 'documentation_plus_template_single_documentation_breadcrumb' ) ) {

	
	function documentation_plus_template_single_documentation_breadcrumb() {
				
		require_once( documentation_plus_plugin_dir. 'templates/single-documentation-breadcrumb.php');
	}
}





if ( ! function_exists( 'documentation_plus_template_single_documentation_content' ) ) {

	
	function documentation_plus_template_single_documentation_content() {
				
		require_once( documentation_plus_plugin_dir. 'templates/single-documentation-content.php');
	}
}


if ( ! function_exists( 'documentation_plus_template_single_documentation_meta' ) ) {

	
	function documentation_plus_template_single_documentation_meta() {
				
		require_once( documentation_plus_plugin_dir. 'templates/single-documentation-meta.php');
	}
}





if ( ! function_exists( 'documentation_plus_template_single_documentation_sidebar' ) ) {

	
	function documentation_plus_template_single_documentation_sidebar() {
				
		require_once( documentation_plus_plugin_dir. 'templates/single-documentation-sidebar.php');
	}
}



