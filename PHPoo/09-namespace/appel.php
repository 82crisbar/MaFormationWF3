<?php

//09-namespace/appel.php
namespace General;

require('espace1.php');
require('espace2.php');

use Espace1;
use Espace2;
use PDO;
// use use Espace1, Espace2, PDO; // same as line above!

$c = new Espace1\A;
echo $c -> test1();

$c = new Espace2\A;
echo $c -> test2(); 

$pdo = new PDO('mysql:host=localhost;dbname=wf3_entreprise', 'root','');

/*
COMMENTAIRES: 
    -Déclarer un namespace permet de déclarer un espace virtuel dans lequel on peut "ranger" des classes. 
    -Grace aux namespace, plusieurs clesses peuvent avoir le même nom à partir du moment qu'elles sont "rangées" dans des namespaces differents. 
    -Lorsqu'on utilise les namespaces:
        --> On appelle une classe via son namespace
            => $a = new A devient $a = nev Espace1\A
        -->Pour recuperer des classes qqui sont declarees dans une autre namespace on doit importer le namespace en avant :
            - Use Espace1;
            - Use PDO (on peut egalement importer une classe)    
    -Toutes les classes existantes (PDO, Mysql, Exception, PDOStatement etc... ) appartiennent à l'espace global de PHP , il faut donc les importer en avant.$_COOKIE

    -Dans une application bien conceptualisée, les namespaces deviennent des noms de dossiers physiques afin que l'autoload (cf chapitre 10) puisse s'orienter.             
*/