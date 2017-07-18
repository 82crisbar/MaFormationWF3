<?php get_header(); ?>
			
			<div class="grid grid-2-1 grid-top">
				<div id="contenu">
					<div class="grid grid-2 grid-stretch">
							
							
						<section class="rubrique bord-rubrique">
						
				<?php 
							$args = array( 'posts_per_page' => 1,
							'category_name'  => 'agenda',
							'orderby' => 'date',
							'order' => 'desc' 
							);

							$loop = new WP_Query($args);


							if ($loop->have_posts())
							{ 
								while ($loop->have_posts() ) 
								{ 
									$loop->the_post(); 
									get_template_part( 'content', 'accueil' ); 
								}
								wp_reset_postdata();
							} 			
				?>
						</section>
						<section class="rubrique bord-rubrique">
						
				<?php 
							$args = array( 'posts_per_page' => 1,
							'category_name'  => 'actualites',
							'orderby' => 'date',
							'order' => 'desc' 
							);

							$loop = new WP_Query($args);


							if ($loop->have_posts())
							{ 
								while ($loop->have_posts() ) 
								{ 
									$loop->the_post(); 
									get_template_part( 'content', 'accueil' );
								}
								wp_reset_postdata();
							} 			
				?>
						</section>
						
				
					</div> <!-- /.grid-2 -->
				</div> <!-- /.contenu -->
				<?php
					get_sidebar(); 
				?>
			</div> <!-- /.grid-2-1 -->
<?php get_footer(); ?>