<?php get_header(); ?>	
	
	<div id="content">
	
	    <?php if (have_posts()) : ?>
       
        <?php while (have_posts()) : the_post(); ?>
	
	<article>
		
		<p class="cat"><?php the_category(', ') ?> / <span class="por">por</span> <?php the_author(); ?></p>
		<h1><?php the_title(); ?></h1>
		
		<div class="entry">
			<?php if ( has_post_thumbnail() ) {
				japiblog_post_thumbnail(); 
			} ?>
			
			<?php the_content('Lee el resto de la entrada &raquo;'); ?>
		</div> 
	
	<div class="join">
		<div class="comentarios">
			 <?php the_time('d - m - Y') ?>
		</div>
		
		<?php include('inc/share-social.php'); ?>
	</div>
	
	</article>
	
	<?php comments_template(); ?>

	
	 <?php endwhile; else : endif; ?>

	
	<div class="one">
		<?php include('inc/select-aside.php'); ?>	
	</div>
	
</div>
	
<?php get_sidebar(); ?>	

<?php get_footer(); ?>