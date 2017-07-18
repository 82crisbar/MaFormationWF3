<?php get_header(); 
the_posts_pagination(array
( 'prev_text' => 'Page précédente',
 'next_text' => 'Page suivante' )); 
?>

	<div class="grid grid-2-1 grid-top">
		<div id="contenu">
			<section>
				<header>
					<h1><?php single_cat_title(); ?></h1>
				</header> 
		
				<?php 
						if(have_posts())
						{
							while(have_posts())
							{
								the_post();	
				?>
							<article class="bloc-lien crearfix">
								<header>
									<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								</header>
								
								<div class="grid grid-2 grid-top">
									<?php the_post_thumbnail();?>
									<?php the_excerpt(); ?>
								</div>
								
							</article>	
							
			<?php 
							}
						}
			?>			
				</section>
		</div>	
		<?php 
			get_sidebar(); 
		?> 
	</div> 
	<?php get_footer(); ?>