<?php
/*
Plugin name:Generation du logo
Description: fonction pour l'appell du logo cliquable sur toutes les pages du site sauf la page d'accueil
Version: 11 07 2017
*/
function get_logo(){

	if(is_front_page())
	{
		$custom_logo_id = get_theme_mod('custom_logo');
		$image = wp_get_attachment_image($custom_logo_id, 'full');
	    
	}
	else{
		$image = get_custom_logo();
		}
	return $image;	
}	
?>