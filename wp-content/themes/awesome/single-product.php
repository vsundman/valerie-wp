<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class();//this adds extra classes to the post ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<?php the_post_thumbnail('large', array( 'class' => 'product-image' )); ?>

			<div class="entry-content">
			<?php the_meta(); //will output a loop of ALL the custom fields in that post ?>



			<?php the_terms( $post->ID, 'brand', 'Brand: '); //shows the terms for the taxonomy(brands) you need to tell it which post and which term, and the third one is if you want it to say brand or whatever before the term ?>

			


			<?php the_content(); ?>
			</div>

		
		</article><!-- end post -->

		<?php endwhile; ?>

		<div class="pagination">
			<?php 
			next_post_link( '%link', '&larr; Newer Post: %title' );
			previous_post_link( '%link', 'Older Post: %title &rarr;') ; 
 			?>

		</div>
		

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>