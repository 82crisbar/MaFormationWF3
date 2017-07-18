<?php get_header(); ?>
			
			<div class="grid grid-2-1 grid-top">
					<div id="contenu">
						<h1>Page non trouvé.<br />Continuez votre navigation sur:</h1>
						<ul>
							<li>Aller a la <?php echo "<a href='" . esc_url(home_url("/")) ."'>page d'accueil</a>" ?> </li>
							<li>Consulter le <?php echo "<a href='" . esc_url(home_url("/")) . "plan du site'>Plan du site</a>" ?></li>
							<li>Utiliser le formulaire de recherche</li>
						</ul>	
						<p>En cas d'erreur persistant, n'esitez pas a nous contacter.Vous trouverez nos cordonnes sur la page <?php echo "<a href='" . esc_url(home_url("/")) ."contact'>Contact</a>" ?></p>
						
						
					</div>
			
			<?php 
					get_sidebar(); 
			?>
			</div>
<?php get_footer(); ?>