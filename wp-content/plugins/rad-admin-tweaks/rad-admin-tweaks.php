<?php
/*
Plugin Name: Admin Panel Customization
Description: Alters admin panel and login screens
Plugin URI: http://wordpress.melissacabral.com
Author: Valerie Sundman
Author URI: http://valeriesundman.com
Version: 0.1
License: GPLv3
*/


/**
 * Attach stylesheet for login and register (styling one styles the other!)
 */
add_action('login_enqueue_scripts', 'rad_login_style' );
function rad_login_style(){
	//get the url of the file
	$login_css = plugins_url('css/login-style.css', __FILE__ );
	//register it and put it on the page
	wp_enqueue_style('login_stylesheet', $login_css );
}
/**
 * Change the link and tooltip on the login logo
 */
add_filter('login_headerurl', 'rad_login_title_url' );
function rad_login_title_url(){
	return home_url(); /*replace with whatever absolute URL you want*/

}
add_filter('login_headertitle', 'rad_login_tooltip');
function rad_login_tooltip(){
	return get_bloginfo('name');
	// or
	// return 'Customize this tooltip!';
}
/**
 * Adming and login favicons
 */
add_action('admin_head','rad_admin_favi');
add_action('login_head','rad_admin_favi');
function rad_admin_favi(){
	$favicon_path = plugins_url('images/admin-favicon.ico', __FILE__ );
	?>
	<link rel="icon" type="image/x-icon" href="<?php echo $favicon_path; ?>">
	<?php  
}
/**
 * remove the wordpress menu from the toolbar (the one on top in the left corner)
 */
add_action('admin_bar_menu', 'rad_remove_wp_menu', 999 );
function rad_remove_wp_menu( $wp_admin_bar ){
	$wp_admin_bar->remove_node('wp-logo');

}
/**
 * Dashboard Widgets - Hide the ones you don't need
 */
add_action( 'wp_dashboard_setup', 'rad_remove_dash_widgets' );
function rad_remove_dash_widgets(){
	remove_meta_box('dashboard_primary', 'dashboard', 'side' ); //wordpress news(blog)
 	remove_meta_box( 'dashboard_quick_press',   'dashboard', 'side' ); //Quick Press widget
 	remove_meta_box( 'dashboard_activity',   'dashboard', 'normal' ); //recent activity
}
/**
 * Add out own custom Dashboard widgets
 */
add_action('wp_dashboard_setup', 'rad_custom_dash_widget' );
function rad_custom_dash_widget(){
							//ID  						title 			callback function
	wp_add_dashboard_widget( 'dashboard_rad_widget', 'Put Title Here', 'rad_dash_widget_content' );
}
//callback for content
function rad_dash_widget_content(){
	// echo 'this is the widget content';
	wp_widget_rss_output(array( 
 		'url' => 'http://smashingmagazine.com/feed',
 		'items' => 5,
 		'show_summary' => true,
 		'show_date' => true,
 		'show_author' => true,
	 ) );
}




