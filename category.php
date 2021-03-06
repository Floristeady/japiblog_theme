<?php get_header(); ?>	
	
<div id="content">

	  <?php if (have_posts()) : ?>
      <h2 class="sub-title"><?php single_cat_title(); ?> en Japi Blog</h2>
        
      <div class="blog-content">
      
        <?php while (have_posts()) : the_post(); ?>

		<article>
			
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace a <?php the_title(); ?>"><?php the_title(); ?></a></h1>
			
				<div class="entry">
					<?php the_content(); ?>
				</div> 
		
		<div class="join">
			<div class="comentarios">
				 <?php comments_popup_link('Comenta', '1 Comentario', '% Comentarios'); ?> | <?php the_time('d - m - Y') ?>
			</div>
			
			<?php include('inc/share-social.php'); ?>
		</div>
		
		</article>
	
		<?php endwhile; ?>
	</div>
	
	
	    <?php japi_pagination($pages = '', $range = 1); ?> 
	       
	    <?php else : ?>
	        <h2 class="center">No encontrado</h2>
	        <p class="center">No hay nada por aquí.</p>
	        <?php include (TEMPLATEPATH . "/searchform.php"); ?>
	    <?php endif; ?>
	
</div>
	
<?php get_sidebar(); ?>	

<?php get_footer(); ?>