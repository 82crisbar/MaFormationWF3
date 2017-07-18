<?php get_header(); ?>
			
			<div class="grid grid-2-1 grid-top">
					<div id="contenu">
			<?php 
						
						if (have_posts()){ 
							while ( have_posts() ) 
							{ the_post(); 
			?>
							
							<article> 
								<header> 
									<h1><?php the_title(); ?></h1> 
								</header> 
								<?php the_content(); ?> 
							</article> 
			<?php 
							};
						}; 			
			?>
					</div>
			
			<?php 
					get_sidebar(); 
			?>
			</div>
<?php get_footer(); ?>