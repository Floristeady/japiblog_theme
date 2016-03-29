<?php get_header(); ?>	
	
	<div id="content">
	
	    <?php if (have_posts()) : ?>
       
        <?php while (have_posts()) : the_post(); ?>
	
	<article>
		
		<p class="cat">Estás en:</p>
		<h1><?php the_title(); ?></h1>
		
		<div class="entry">
			<?php the_content(); ?>
		</div> 
		
	</article>
	
	
	 <?php endwhile; ?>
               
    <?php else : ?>
        
    <?php endif; ?>
	
</div>
	
<?php get_sidebar(); ?>	

<?php get_footer(); ?>