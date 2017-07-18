
		<header>
			<h2><?php echo get_cat(); ?></h2>
		</header>
			
		
		
		<article class="bloc-lien">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>	 
			<figure>
				<?php the_post_thumbnail(); ?>
			</figure>
			<div class="excerpt">
				<?php the_excerpt(); ?> 
			</div>
		</article>
	