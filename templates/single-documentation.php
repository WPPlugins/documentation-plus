<?php
/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



		$cookie_name = 'documentation_plus_view';
		$job_id = get_the_ID();
		$view_count = get_post_meta(get_the_ID(),'view_count', true);
		
		
		
		if(isset($_COOKIE[$cookie_name.'_'.$job_id])){
			
				//var_dump($_COOKIE[$cookie_name.'_'.$q_id]);
				//var_dump($view_count);		
				
			}
		else{
				//var_dump('No');
			
				setcookie( $cookie_name.'_'.$job_id, $job_id, time() + (86400 * 30)); // 86400 = 1 day
				
				update_post_meta(get_the_ID(), 'view_count', ($view_count+1));
			}






		get_header();

		do_action('documentation_plus_action_before_single_documentation');

		while ( have_posts() ) : the_post(); 
		?>
        <div id="docs-<?php the_ID(); ?>" <?php post_class('single-documentation entry-content'); ?>>
        
        
        <?php
			do_action('documentation_plus_action_single_documentation_main');
		?>
        
        </div>
		<?php
		endwhile;
		
        do_action('documentation_plus_action_after_single_documentation');

		//get_sidebar();
		

		get_footer();
		
