<style>
	*{margin: 0 auto; text-align:center; padding:20px;}
	p{color:green; font-size:50px;}
	h1{color:red;font-size:50px;}
	a{color:yellow;font-size:50px;}
</style>
<h1>Exercice 2.1</h1>
<?php

echo    '<ul>';
echo 	'<li><a href="lien.php?pays=France">FRANCE</a></li>';
echo    '<li><a href="lien.php?pays=Espagne">ESPAGNE</a></li>';
echo	'<li><a href="lien.php?pays=Italie">ITALIE</a></li>';
echo	'<li><a href="lien.php?pays=Angleterre">ANGLETERRE</a></li>';
echo    '</ul>';				

echo'<pre>';print_r($_GET);echo '</pre>';


if(isset($_GET["pays"]))

{
	if($_GET["pays"] == "France"){ 

	echo '<p>Votre pays est la ' . $_GET["pays"]. '<br/ ></p>';
	/* echo 'Votre pais est l\'' . $_GET["pays=es"] . '<br/ >';
	echo 'Votre pais est l\''  . $_GET["pays=it"] . '<br/ >'; 
	echo 'Votre pais est l\''  . $_GET["pays=en"] . '<br/ >'; */
	}
	else{ 
		
	echo '<p>Votre pays est l\'' . $_GET["pays"]. '<br/ ></p>';
	}
}


?>