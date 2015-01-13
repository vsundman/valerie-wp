<!DOCTYPE html>
<html lang="en-US"> <!-- you can also use bloginfo('language'); -->
<head>
	<meta charset="utf-8" /> <!-- you can also use bloginfo('charset'); -->
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/reset.css" media="screen" />

	<?php wp_head(); //HOOK. needed for plugins and admin bar to work ?>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
 
<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
 
<body class="home">
	<header role="banner">
		<h1 class="site-name"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		<h2><?php bloginfo('description'); ?></h2>
	
		<!-- nav function goes here -->
		<?php wp_page_menu( array( 

			'show_home' => true, //this shows a home link *default is set to false
			'menu_class'  => 'menu clearfix', //add clearfix to the default menu
			'depth'       => 1,

		 ) ); //list of all pages with a link home ?>

	
		<?php get_search_form(); ?>	
	</header>