<?php
/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

	global $post;
	
	$breadcrumb_separator = '&rarr;';
	$breadcrumb_word_char = 4;
	$breadcrumb_word_char_count = 5;
	$breadcrumb_word_char_end= '...';
	$home = get_page(get_option('page_on_front'));


	echo '<ul class="doc-breadcrumb">';
	
	for ($i = count($post->ancestors)-1; $i >= 0; $i--) {
		if (($home->ID) != ($post->ancestors[$i]))
			{
				echo '<li>';
				echo '<a href="';
				echo get_permalink($post->ancestors[$i]); 
				echo '">';
				echo get_the_title($post->ancestors[$i]);
				echo '</a></li>';
				
				// <span  class="separator">'.$breadcrumb_separator.'</span> 
				
			}
			
			
	}
	
	echo '<li><a title="'.get_the_title().'" href="#">'.get_the_title().'</a></li>';


	echo '</ul>';





?>

