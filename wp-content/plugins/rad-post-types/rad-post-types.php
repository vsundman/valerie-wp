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


	//Add the "Brand" taxonomy to products
	register_taxonomy('brand', 'product', array(
			'hierarchical' => true, //had parent/child relationships
			'labels' => array(
				'name' => 'Brands',
				'singular_name' => 'Brand',
				'add_new_item' => 'Add new brand',
				'search_items' => 'Search Brands',
				'update_item' => 'Update Brand',

				),

		) );

//Add the "Feature" taxonomy to products
	register_taxonomy('feature', 'product', array(

			'labels' => array(
				'name' => 'Features',
				'singular_name' => 'Feature',
				'add_new_item' => 'Add new feature',
				'search_items' => 'Search Features',
				'update_item' => 'Update Features',

				),

		) );







}//end function rad_setup_products

/**
 * Fix 404 errors when this plugin is activated
 * (when you add a plugin you need to flush
 * 	because if you dont you will get a 404)
 * 	@since  0.1
 */

function rad_rewrite_flush() {
	//setup CPTs and taxonomies first (run the function)
     rad_setup_products();
     //then fix the .htaccess file
     flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'rad_rewrite_flush' );

//if yo uare working on the plugin you need to disable and reinable it, otherwise you just activate it once and it will work.

//no close PHP