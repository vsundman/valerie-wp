<?php 
//turn on some sleeping features
add_theme_support('post-thumbnails');

//make forms follow new HTML5 guidelines
add_theme_support('html5', array('search-form', 'comment-list', 'comment-form',
								  'gallery', 'caption') );
//adds <link> elements on all archives for RSS feeds
add_theme_support('automatic-feed-links' );

add_theme_support('custom-background' );

add_theme_support('post-formats', array('gallery', 'quote', 'audio', 'video', 'image') );

//make additional image sizes
add_image_size( 'big-banner', '1300', '300', true );
//adds ability to have editor-style.css for the edit content area (in the edit post panel)
add_editor_style();

/**
 *  Make Excerpts Better
 *	@since 0.1
 */
//you can name the function whatever you want but make sure its original ((so you can use initals, name of theme, whateva))
function awesome_ex_length(){
	if(is_search()){ //for the search results
		return 25; //words
	}else{
	return 85; //this returns 85 words. default is 55
	}
}
add_filter('excerpt_length', 'awesome_ex_length' );

//change the [...]
function awesome_readmore(){
	return ' <a href="' . get_permalink() . '" class="readmore">Keep Reading &hellip;</a>';
	//you can also go $link = get_permalink();
	//					return "<a href='$link' class='readmore'> Keep Reading &hellip; </a>";
}
add_filter('excerpt_more', 'awesome_readmore');

/**
 *  Activate Menu Areas
 * @since 0.1
 */
function awesome_menu_areas(){
	register_nav_menus( array( 
		'main_menu' => 'Main Menu at the top of every page',
		'utilities' => 'Utility Bar',
		) );
}
add_action('init', 'awesome_menu_areas' ); //without this line, our custom function doesnt do anything. init stands for initialize.

/**
 * Add Widget Areas (dynamic sidebars)
 * @since 0.1
 */
function awesome_widget_areas(){
		register_sidebar ( array(
			'name'          => 'Blog Sidebar',
			'id'            => 'blog-sidebar',
			'description'   => 'These widgets will appear next to the blog and archive views',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
}
add_action('widgets_init', 'awesome_widget_areas' );

//more widget sidebars to add

register_sidebar ( array(
			'name'          => 'Home Widgets',
			'id'            => 'home-widgets',
			'description'   => 'These widgets will appear on the front page',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
register_sidebar ( array(
			'name'          => 'Page Sidebar',
			'id'            => 'page-sidebar',
			'description'   => 'These widgets will appear next to most pages',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
register_sidebar ( array(
			'name'          => 'Footer Widgets',
			'id'            => 'footer-widgets',
			'description'   => 'These widgets will appear at the bottom of everything',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
	

function awesome_recent_products( $number = 6 ){

	//custom query to get most recent products
	$products_query = new WP_Query( array(
					  'post_type' 	   => 'product',
					  'posts_per_page' => $number,
	) );
	//custom loop
	if ($products_query->have_posts()):

	 ?>
	<section class="latest-products">
		<h2>Newest Products in the shop:</h2>
		<ul>
		<?php while ($products_query->have_posts()):
			$products_query->the_post(); ?>
			<li>
				<a href="LINK">
					<?php the_post_thumbnail('thumbnail' ); ?>
					<div class="product-info">
						<h3><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
					</div>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; 
	wp_reset_postdata(); //this prevents clashing with other loops 

}//end function of awesome recent products


/**
 * Customization API
 */
add_action( 'customize_register', 'awesome_theme_customizer' );
//
function awesome_theme_customizer( $wp_customize ) {
//Link color
	//create the setting and its defaults
	$wp_customize->add_setting(	'awesome_link_color', array( 'default'    => '#6bcbca'	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'      => 'Link Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'awesome_link_color', //the setting from above that this control controls!
		)
	));
//Text Color
	$wp_customize->add_setting(	'awesome_text_color', array(
		'default'     => '#ffffff',
	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label'      => 'Body Text Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'awesome_text_color', //the setting from above that this control controls!
		)
	));
//Radio Option - Right or left hand sidebar?
	$wp_customize->add_section( 'awesome_layout_section' , array(
    'title'      => 'Layout',
    'priority'   => 30,) );
	$wp_customize->add_setting( 'awesome_layout', array( 'default' => 'right' ) );
	$wp_customize->add_control(
    	new WP_Customize_Control( $wp_customize, 'sidebar_layout', array(
            'label'          => 'Sidebar Position',
            'section'        => 'awesome_layout_section',
            'settings'       => 'awesome_layout',
            'type'           => 'radio',
            'choices'        => array(
                'left'   => 'Left',
                'right'  => 'Right',
            )
        )
    ));
}	
function awesome_customizer_css() {
	?>
	<style type="text/css">
	a { color: <?php echo get_theme_mod( 'awesome_link_color' ); ?>;  }
	body{color: <?php echo get_theme_mod( 'awesome_text_color' ); ?>; }
	<?php if(get_theme_mod('awesome_layout') == 'right'): ?>
		#sidebar{float:right;}
		#content{float:left;}
	<?php else: ?>
		#sidebar{float:left;}
		#content{float:right;}
	<?php endif; ?>
	</style>
	<?php
}
add_action( 'wp_head', 'awesome_customizer_css' );


//no close PHP