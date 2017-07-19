<?php
/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



$ancestors = array_reverse(get_post_ancestors(get_the_id()));

if(!empty($ancestors[0])){
	$parent_id = $ancestors[0];
	}
else{
	$parent_id = get_the_ID();
	}


$current_doc_id = get_the_id();


//var_dump($ancestors);


	







	echo '<div class="doc-sidebar">';
	

	echo '<ul>';
			$wp_query = new WP_Query(
				array (
					'post_type' => 'documentation',
					'post_status' => 'publish',
					'post_parent' => $parent_id,
					'orderby' => 'date',									
					'order' => 'ASC',
					'posts_per_page' => -1,
					//'paged' => $paged,
					
					) );



			if ( $wp_query->have_posts() ) :
			
		
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
			
				if(get_the_ID()== $current_doc_id){
					$current_doc_class = 'current';
					}
				else{
					$current_doc_class = '';
					}
			
			
				echo '<li class="'.$current_doc_class.'"><a id="doc-title-'.get_the_ID().'" href="'.get_permalink().'" class="side-title">'.get_the_title().'</a></li>';
			
				$wp_query_child = new WP_Query(
					array (
						'post_type' => 'documentation',
						'post_status' => 'publish',
						'post_parent' => get_the_ID(),	
						'orderby' => 'date',			
						'order' => 'ASC',
						'posts_per_page' => -1,
						//'paged' => $paged,
						
						) );
			
			
				if ( $wp_query_child->have_posts() ) :
				
			
				while ( $wp_query_child->have_posts() ) : $wp_query_child->the_post();
				
				
				if(get_the_ID()== $current_doc_id){
					$current_doc_class = 'current';
					}
				else{
					$current_doc_class = '';
					}
				
				
				
				
				echo '<li class="child '.$current_doc_class.'"><a id="doc-title-'.get_the_ID().'"  href="'.get_permalink().'" class="side-title">'.get_the_title().'</a></li>';
				endwhile;
				
				endif;
			
			
			
				

			endwhile;
			
			wp_reset_query();
			else:
			
			//$html .= __('No ads found','classified_maker');	
			
			endif;
	
	echo '</ul>';
	
	

	echo '</div>';	


?>



