<?php
spl_autoload_register(function($class){
	require_once 'class/'.$class.'.php';
});


$cat_1 = new Chat('Milù', 7, 'Blanc', 'male', 'Maine coon');
echo '<strong>Chat 1</strong>';
echo '<ul>';
foreach($cat_1->getInfos() as $info){
	echo '<li>'.$info.'</li>';
}
echo '</ul>';


$cat_2 = new Chat('Nirvana', 1, 'Noire', 'femelle', 'Sacrée de Birmanie');
echo '<strong>Chat 2</strong>';
echo '<ul>';
foreach($cat_2->getInfos() as $info){
	echo '<li>'.$info.'</li>';
}
echo '</ul>';



$cat_3 = new Chat('Gatto', 4, 'Gris', 'male' ,'Abyssin');
echo '<strong>Chat 3</strong>';
echo '<ul>';
foreach($cat_3->getInfos() as $info){
	echo '<li>'.$info.'</li>';
}
echo '</ul>';

