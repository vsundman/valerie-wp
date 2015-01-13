<?php get_header(); //include header.php ?>
 
	<main id="content">

	<?php //THE LOOP
		if( have_posts() ){
			while( have_posts() ){
					the_post(); //iterates- this moves the 'picker' to the next post in the list. If you dont do this you will end up with an infinite loop.
	 ?>

		<article id="post-ID" class="post">
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?>
				</a>
			</h2>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<div class="postmeta"> 
				<span class="author"> Posted by: <?php the_author(); ?> </span>
				<span class="date"> <?php the_date(); ?> </span>
				<span class="num-comments"> <?php comments_number(); ?> </span>
				<span class="categories"> 
					<?php the_category(); ?>
				</span>
				<span class="tags"><?php the_tags(); ?></span> 
			</div><!-- end postmeta -->			
		</article><!-- end post -->

		<?php 
			} //end while
		}else{ ?>

		<h1>Sorry, no posts found</h1>
		<p>put stuff here like, popular posts, search, a funny 404 animation... whatever</p>

		<?php } ?>
  
	</main><!-- end #content -->
 
	<?php get_sidebar(); //get sidebar.php ?>

	<?php get_footer(); //get footer.php ?>
 
	