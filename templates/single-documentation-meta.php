<?php
/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

	$documentation_plus = get_post_meta( get_the_ID(), 'documentation_plus', true );	
	$view_count = get_post_meta(get_the_ID(),'view_count', true);


	if(!empty($documentation_plus['buy_link'])){
		$buy_link = $documentation_plus['buy_link'];
		}
	else{
		$buy_link = '';
		}


	if(!empty($documentation_plus['is_deprecated'])){
		$is_deprecated = $documentation_plus['is_deprecated'];
		}
	else{
		$is_deprecated = 'no';
		}

	if(!empty($documentation_plus['version'])){
		$version = $documentation_plus['version'];
		}
	else{
		$version = '';
		}

	if(!empty($documentation_plus['update_id'])){
		$update_id = $documentation_plus['update_id'];
		
		$update_doc_url = get_permalink($update_id);
		$update_doc_title = get_the_title($update_id);		
		
		}
	else{
		$update_id = '';
		}



	echo '<div class="doc-sections meta">';
	
	
	if(!empty($version)){
		
		echo '<span class="version"><i class="fa fa-bolt" aria-hidden="true"></i> '.__('Version:',documentation_plus_textdomain).' '.$version.'</span>';
		
		}	
	
	
	
	
	if($is_deprecated=='yes'){
		
		echo '<span class="deprecated"><i class="fa fa-ban" aria-hidden="true"></i> '.__('This documentation deprecated',documentation_plus_textdomain).'</span>';
		
		}


	if(!empty($update_id)){
		
		echo '<span class="update-doc"><i class="fa fa-flask" aria-hidden="true"></i> '.__('Update documentation:',documentation_plus_textdomain).' <a href="'.$update_doc_url.'">'.$update_doc_title.'</a></span>';
		
		}

	if(!empty($buy_link)){
		
		echo '<span class="update-doc"><i class="fa fa-external-link-square"></i> <a href="'.$buy_link.'">'.__('Vew product',documentation_plus_textdomain).'</a></span>';
		
		}


	if(!empty($view_count)){
		
		echo '<span title="'.__('Vew count',documentation_plus_textdomain).'" class="update-doc"><i class="fa fa-eye"></i> '.__('Vew count:',documentation_plus_textdomain).' '.$view_count.'</span>';
		
		}


	echo '</div>';