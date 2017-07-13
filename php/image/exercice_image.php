<?php 
// recuperer 5 images sur le web et le renommer de cette facon
// image1.jpg
// image2.jpg
// image3.jpg
// image4.jpg
// image5.jpg
// pixabay.com

// Afficher une image avec une balise <img />
// afficher une image 5 fois roujours en ecrivant 1 seule balise <img />
// Afficher les 5 images differentes toujours en ecrivant une seule balise <img />

/*$image[1] = '<img src="image1.jpg" />';
$image[2] = '<img src="image2.jpg" />';
$image[3] = '<img src="image3.jpg" />';
$image[4] = '<img src="image4.jpg" />';
$image[5] = '<img src="image5.jpg" />';

echo $image[1] . '<br />';
echo '<hr />';
echo $image[1] .$image[1].$image[1].$image[1].$image[1] . '<br />';
echo '<hr />';
echo $image[1] .$image[2].$image[3].$image[4].$image[5] . '<br />';*/

// Avec une concatenation

//or avec une function for
echo "<img src='image1.jpg' />";

echo '<hr />';

for($i =1; $i <= 5; $i++)
{
	echo "<img src='image1.jpg' />";
}
echo '<hr />';

for($i =1; $i <= 5; $i++)
{
	echo "<img src='image".$i.".jpg' />";
}