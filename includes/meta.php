<?php


function documentation_posttype_register() {
 
        $labels = array(
                'name' => _x('Documentation', 'documentation'),
                'singular_name' => _x('Documentation', 'documentation'),
                'add_new' => _x('New Documentation', 'documentation'),
                'add_new_item' => __('New Documentation'),
                'edit_item' => __('Edit Documentation'),
                'new_item' => __('New Documentation'),
                'view_item' => __('View Documentation'),
                'search_items' => __('Search Documentation'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => true,
                'menu_position' => null,
                'supports' => array('editor','title','thumbnail','page-attributes'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'documentation' , $args );

}

add_action('init', 'documentation_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_documentation()
	{
		$screens = array( 'documentation' );
		foreach ( $screens as $screen )
			{
				add_meta_box('documentation_metabox',__( 'Documentation Options','documentation' ),'meta_boxes_documentation_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_documentation' );


function meta_boxes_documentation_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_documentation_input', 'meta_boxes_documentation_input_nonce' );
	
	$documentation_plus = get_post_meta( $post->ID, 'documentation_plus', true );	


	if(!empty($documentation_plus['buy_link'])){
		$buy_link = $documentation_plus['buy_link'];
		}
	else{
		$buy_link = '';
		}


	if(!empty($documentation_plus['version'])){
		$version = $documentation_plus['version'];
		}
	else{
		$version = '';
		}



	if(!empty($documentation_plus['is_deprecated'])){
		$is_deprecated = $documentation_plus['is_deprecated'];
		}
	else{
		$is_deprecated = 'no';
		}
	

	if(!empty($documentation_plus['update_id'])){
		$update_id = $documentation_plus['update_id'];
		}
	else{
		$update_id = '';
		}
?>




    <div class="para-settings">


        
        <ul class="tab-nav">
      
            <li nav="1" class="nav1 active">Options</li>     

            
        </ul> <!-- tab-nav end -->
        
		<ul class="box">

			<li style="display: block;" class="box1 tab-box active ">
            
				<div class="option-box">
                    <p class="option-title">Product Link(Buy Link)</p>
                    <p class="option-info">URL to your orginal prduct link(buy link)</p>
                    
                    <input  type="text" placeholder="url" name="documentation_plus[buy_link]" value="<?php if(!empty($documentation_plus['buy_link'])) echo $documentation_plus['buy_link']; ?>"  />
                    
               	</div>
                
                
				<div class="option-box">
                    <p class="option-title">Version</p>
                    <p class="option-info">Version of this documentation</p>
                    
                    <input  type="text" placeholder="1.0.0" name="documentation_plus[version]" value="<?php if(!empty($documentation_plus['version'])) echo $documentation_plus['version']; ?>"  />
                    
               	</div>                
                
                
				<div class="option-box">
                    <p class="option-title">Deprecated</p>
                    <p class="option-info">is this docs deprecated ?</p>
                    <select name="documentation_plus[is_deprecated]" > 
                        <option <?php if($is_deprecated == 'no') echo 'selected'; ?>  value="no" >No</option >                  
                        <option <?php if($is_deprecated == 'yes') echo 'selected'; ?> value="yes" >Yes</option>
                    </select>
               	</div>                
                
                
				<div class="option-box">
                    <p class="option-title">Update Documentation ID</p>
                    <p class="option-info">if depreated , new documentation id</p>
                    
                    <input  type="text" placeholder="23" name="documentation_plus[update_id]" value="<?php if(!empty($documentation_plus['update_id'])) echo $documentation_plus['update_id']; ?>"  />
                    
               	</div>                  
                
                
                

            
            </li>

        
        </ul>
        


    </div> <!-- para-settings -->



<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_documentation_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_documentation_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_documentation_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_documentation_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	   
	  
 	
	
	$documentation_plus = stripslashes_deep( $_POST['documentation_plus'] );	

  // Update the meta field in the database.


	
	update_post_meta( $post_id, 'documentation_plus', $documentation_plus );




}
add_action( 'save_post', 'meta_boxes_documentation_save' );


























?>