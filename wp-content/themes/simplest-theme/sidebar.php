<aside id="sidebar"> 
		<section id="categories" class="widget">
			<h3 class="widget-title"> Categories </h3>
			<ul>
				<?php 
					//show the 10 most popular cats with post counts
					wp_list_categories(
						array( 
						'show_count'         => 1,
						'orderby'            => 'count',
						'order'              => 'DESC',
						'number'             => 10,
						'title_li'           => '', //hide the extra 'Categories:' title
					)	); 

				?>                
			</ul>
		</section>
		<section id="archives" class="widget">
			<h3 class="widget-title"> Archives </h3>
			<ul>
				<?php wp_get_archives( array(
						'limit'           => 5,

					)); ?>
			</ul>
		</section>
		<section id="tags" class="widget">
			<h3 class="widget-title"> Tags </h3>
			<?php wp_tag_cloud(); ?>
		</section>
		<section id="meta" class="widget">
			<h3 class="widget-title"> Meta </h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
			</ul>
		</section>
	</aside><!-- end #sidebar -->