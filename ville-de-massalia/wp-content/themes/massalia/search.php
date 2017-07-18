<?php get_header();
the_posts_pagination(array
( 'prev_text' => 'Page précédente',
 'next_text' => 'Page suivante' ));
?>

	<div class="grid grid-2-1 grid-top">	
		<div id="contenu">
			<section> 
				<header> 
				<h1>Résultats de recherche pour "<?php echo get_search_query(); ?>"</h1>
			</header>       
				<?php 
						
						if (have_posts()){ 
							while ( have_posts() ) 
							{ the_post(); 
				?>
							
							<article> 
								<header> 
									<h1><?php the_title(); ?></h1> 
								</header> 
								<?php the_excerpt(); ?> 
							</article> 
			<?php 
							};
						}; 			
			?>
					</div>
			
			<?php 
					get_sidebar(); 
			?> 
			</section> 
			</div> 
		<?php get_sidebar(); ?>
</div> <?php get_footer(); ?>