<?php get_header(); 
$pagination = get_the_posts_pagination(array(
						'prev_text' => 'Pageprécedente',
						'next_text' => 'Page suivante',
						'before_page_number' => '<span class="screen-reader-text">Page</span>'));
						
?>			
			<div class="grid grid-2-1 grid-top">
				<div id="contenu">
					<section>
						<h1>Article de <?php the_author(); ?></h1>
					
			<?php 
					echo $pagination;	
					while(have_posts())
					{
						the_post();
					
			?>				
								<header> 
 
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</header> 
								<article class="block-lien clearfix"> 
								<div class="grid grid-2 grid-top">
									<?php the_post_thumbnail(); ?>
									<?php the_excerpt(); ?>
								</div>
								
								</article> 
			<?php 
							
					}			
			?>
					</section>
				</div>
			
			<?php 
					get_sidebar(); 
			?>
			</div>
<?php get_footer(); ?>