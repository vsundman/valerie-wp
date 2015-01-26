<aside id="sidebar">

	<?php 
	//show a "back to shop" button if filtered by taxonomy 
	if(is_tax()):	?>
	<section class="widget products-view-all">
		<a href="<?php echo get_post_type_archive_link('product'); ?>" class="button">View All Products</a>
	</section>
	<?php endif; ?>

	<section class="widget">
		<h3 class="widget-title">Filter by Brand:</h3>
		<ul>
			<?php wp_list_categories(array(
				'taxonomy' => 'brand',
				'orderby' => 'count',
				'title_li' => '',
				'show_count' => true,
				'show_option_none' => 'No Brands',

			) ); ?>
		</ul>

	</section>
	<section class="widget">
		<h3 class="widget-title">Filter by Feature:</h3>
		<ul>
			<?php wp_list_categories(array(
				'taxonomy' => 'feature',
				'orderby' => 'count',
				'title_li' => '',
				'show_count' => true,
				'show_option_none' => 'No Features',

			) ); ?>
		</ul>

	</section>



</aside>