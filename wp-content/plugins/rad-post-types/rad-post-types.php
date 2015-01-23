<?php
/*
Plugin Name: Custom Post Types - Products
Description: Adds Products to the site
Plugin URI: http://wordpress.melissacabral.com
Author: Valerie Sundman
Author URI: http://valeriesundman.com
Version: 0.1
License: GPLv3
*/

/**
 * Create "products" post type
 */
add_action('init','rad_setup_products' );
function rad_setup_products(){
	register_post_type('product', array(
			'public' 		=> true,
			'menu_icon' 	=> 'dashicons-cart',
			'has_archive'	=> true,
			'supports'		=> array( 'title', 'editor', 'thumbnail', 
									  'custom-fields', 'excerpt', 
									  'comments', 'revisions' ),
			'labels'		 => array(
				'name' 			=> 'Products',
				'singular_name' => 'Product',
				'add_new'		=> 'Add New Product',
				'edit_item' 	=> 'Edit Products',
				'view_item'		=> 'View Products',
				'new_item'		=> 'New Product',
				'search_items'	=> 'Search Products',
				'not_found'		=> 'No Products Found',),
	 	)/*end array*/ 
	 );//end register_post_type
}//end function rad_setup_products






//no close PHP