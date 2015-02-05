<?php 
//Child theme's functions file runs before the parent theme's functions.php
//
////Add another widget area for the footer
//twentyfifteen already has a widget area in the sidebar
add_action('widgets_init', 'child_widget_area' );
function child_widget_area(){
	register_sidebar( array(
		'name' 	=> 'Footer Widget Area',
		'id'	=> 'footer-widgets',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',

	 ) );

}




//no close PHP
