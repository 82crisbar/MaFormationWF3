<?php get_header(); ?>
			
			<div class="grid grid-2-1 grid-top">
					<div id="contenu">
					<section>
						<h3>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</h3>
					</section>
			<?php 
						$args = array( 'posts_per_page' => 1,
						'category_name'  => 'agenda',
						'orderby' => 'date',
						'order' => 'desc' 
						);

						$loop1 = new WP_Query($args);


						if ($loop1->have_posts())
						{ 
							while ($loop1->have_posts() ) 
							{ $loop->the_post(); 
			?>
							
								<article class="block-lien"> 
									<header>
										<h2><?php the_category(); ?></h2>
										<h3>
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										</h3> 
									</header> 
									<figure>
									<div class="excerpt">
									
									<?php the_excerpt(); ?> 
									</div>
								</article> 
			<?php 
							}
							wp_reset_post_data();
						} 			
			?>
					</div>
			
			<?php 
						$args = array( 'posts_per_page' => 1,
						'category_name'  => 'agenda',
						'orderby' => 'date',
						'order' => 'desc' 
						);

						$loop1 = new WP_Query($args);


						if ($loop2->have_posts())
						{ 
							while ($loop2->have_posts() ) 
							{ $loop2->the_post(); 
			?>
							
								<article class="block-lien"> 
									<header>
										<h2><?php the_category(); ?></h2>
										<h3>
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										</h3> 
									</header> 
									<figure>
									<div class="excerpt">
									
									<?php the_excerpt(); ?> 
									</div>
								</article> 
			<?php 
							}
							wp_reset_post_data();
					get_sidebar(); 
			?>
			</div>
<?php get_footer(); ?>