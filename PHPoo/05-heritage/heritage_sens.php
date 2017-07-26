<?php
//05-heritage/heritage_sens.php

// Transitivité : si B herite de A et que C herite de B , alors C herite de A

class A
{
    public function test(){
        return 'Test';
    }
}

class B extends A
{
    public function test2(){
        return 'Test2';
    }
}
class C extends B
{
    public function test3(){
        return 'Test3';
    }
}
//-----------------------------------------
$c = new C;
echo $c -> test(); // Methode de A accessible par C (Heritage indirect)
echo $c -> test2();// Methode de B accessible par C (Heritage)
echo $c -> test3();// Methode de C accesible par C
echo '<hr />';
var_dump(get_class_methods($c)); // Nous returne test, test2, test3...$_COOKIE

/*
COMMENTAIRES: 
    Transitivité :
        Si B herite de A 
            Et que C herite de B
                Alors C herite de A (Indirectement)
    --->Les methodes protected de A sont également accessibles dans C (pourtant l'heritage est indirecte).

    Lheritage n'est pas :
        -> reflexif : Class D extends D : Ce n'est pas possible , une classe ne peut pas heriter d'elle même. 
        -> symétrique (reciproque) : Ce n'est pas parce que Class E extends F, que F extends E automatiquement. 
        -> cyclique : Si X extends Y , alors il est impossible que Y extends X. 
        -> Multiple : Class N extends O, M : En php ce n'est pas possible.Pas d'heritage multiple en php , mais cela existe dans d'autres langages. 
    
    Une classe peut avoire un nombre infini d'heritiers. 
*/