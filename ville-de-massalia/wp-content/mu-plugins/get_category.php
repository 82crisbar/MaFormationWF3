<?php
/*
Plugin name:Generation de la categorie
Description: fonction pour l'appell du logo cliquable sur toutes les pages du site sauf la page d'accueil
Version: 11 07 2017
*/
function get_cat(){
	$categories = get_the_category();
	
	if (! empty($categories)){
		$cat = esc_html($categories[0]->name );
	}
	return $cat;
	
}	
?>