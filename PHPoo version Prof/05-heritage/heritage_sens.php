<?php
//05-heritage/heritage_sens.php

// transitivité : SI B hérite de A et que C hérite de B, alors C hérite de A. 

class A
{
	public function test(){
		return 'test';
	}
}

class B extends A
{
	public function test2(){
		return 'test2';
	}
}

class C extends B
{
	public function test3(){
		return 'test3';
	}
}
//--------------------
$c = new C; 
echo $c -> test();   // Méthode de A accessible par C (héritage indirect)
echo $c -> test2();  // Méthode de B accessible par C (héritage)
echo $c -> test3();  // Méthode de C accessible par C
echo '<hr/>';
var_dump(get_class_methods($c)); // Nous retourne test, test2, test3...

/*
Commentaires : 
	Transitivité : 	
		Si B hérite de A...
			Et que C hérite de B...
				Alors C hérite de A (indirectement)
	---> Les méthodes protected de A sont également accessibles dans C (pourtant l'héritage est indirecte). 


	L'héritage n'est pas  :	
		-> Reflexif : Class D extends D : Ce n'est pas possible, une classe ne peut pas hériter d'elle même. 
		-> Symétrique (réciproque) : Ce n'est pas parce que Class E extends F, que F extends E automatiquement. 
		-> Cyclique : Si X extends Y, alors il est impossible que Y extends X
		-> Multiple : Class N extends O, M : En PHP ce n'est pas possible. pas d'héritage multiple en PHP, mais cela existe dans d'autres langages. 

	Une classe peut avoir un nombre infini d'héritiers. 

*/


























