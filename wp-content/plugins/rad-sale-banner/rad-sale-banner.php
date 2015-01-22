<?php 
/*
Plugin Name: Corner Ribbon
Description: A basic plugin that adds a sale ribbon to the page
Author: Valerie Sundman
Plugin URI: http://wordpress.melissacabral.com
Author URI: http://valeriesundman.com
Version: 0.1
License: GPLv3
*/

/**
 * HTML Output
 * @since 0.1
 */
add_action('wp_footer', 'rad_ribbon_html' );
function rad_ribbon_html(){
	// !!!! if is condition statement!!!!
	if (is_front_page() ) {
	
	// image path
	$img = plugins_url( 'images/corner-ribbon.png', __FILE__ );
	?>
		<!-- Rad Corner Ribbon Output by Valerie Sundman -->
		<a href="#" id="rad-ribbon">
			<img src="<?php echo $img; ?>" alt="Check out the stuff on sale!">
		</a>
		<!-- End Corner Ribbon Output -->
	<?php 
	}//end if front page condition
}
/**
 * Add CSS stylesheet
 * @since  0.1
 */
add_action('wp_enqueue_scripts', 'rad_ribbon_style' );
function rad_ribbon_style(){
	if(is_front_page()){
	// get the filepath
	$file = plugins_url( 'css/style.css', __FILE__ );
	// register
	wp_register_style( 'rad-banner-css', $file );
	// put it on the page
	wp_enqueue_style('rad-banner-css' ); //puts the stylesheet on everysingle page of the website (if you only need the functionality on certain pages of the website then you need to tell wordpress to only load the style if you are on that page, you would need an if is_front_page condition. SEE ABOVE!)
	}//end if is front page
}




//no close PHP