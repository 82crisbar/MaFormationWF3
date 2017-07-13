<?php 
/*
//-------------------------------------------------------------------------------------------------------------
// PDO => Php Data Object

// EXEC()
	INSERT, UPDATE, DELETE: Exec() est une methode de l'objet PDO qui est utilisée pour la formulation de requete ne retournant pas de resultat.
	Valeur de retour: 
	-----------------
	succes => on obtient un entier (int) correspondant au nombre de lignes affectées.
	echec => on obtient le booleen false
	
// QUERY()
	INSERT , UPDATE, DELETE, SELECT, SHOW,...: Query() est utilisée pour tout tipes de requete.
	Valeur de retour:
	-----------------
	succes => On obtient un nouvel objet issue de la classe PDOStatement.
	echec => On obtient le booleen false
	
// PREPARE() + EXECUTE()
	INSERT , UPDATE, DELETE, SELECT, SHOW,...: Prepare() permet de preparer la requete mais ne l'execoute pas; execute() execute la requete.
	Valeur de retour: 
	-----------------
	prepare() => On obtient un nouvel objet issue de la classe PDOStatement
	execute() => 
		succes => PDOStatement
		echec => false

	// Les requetes préparées sont preconiser pour securiser les donnes.
	// Cela permet également d'eviter le cycle complet d'une requete:
	annalyse/ interpretation / execution
*/

// Connexion a une BDD (BaseDeDonner)
$pdo = new PDO('mysql:host=localhost;dbname=wf3_entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));	
// Arguments: 1 - (serveur+nom_bdd) 2 - identifiant 3 - mot de passe 4 - Options
//echo'<pre>'; var_dump($pdo); echo '</pre>';
//echo'<pre>'; var_dump(get_class_methods($pdo)); echo '</pre>';

// 2 - PDO: exec()
// insert
//$resultat = $pdo->exec("INSERT 	INTO employes (prenom, nom, sexe, service, salaire, date_embauche) VALUES ('prenomtest', 'nomtest' , 'm', 'informatique', 2000, '2017-06-22')");
//echo "Nombre de lignes inserées par la derniere requete: " . $resultat . '<br />';
//echo'<pre>'; var_dump($resultat); echo '</pre>';
//pour recuperer le dernier id inseré:
// echo $pdo->lastInsertId();

// 3 - PDO: QUERY => SELECT + FETCH (pour un seul resultat)
$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes=350");
echo'<pre>'; var_dump($resultat); echo '</pre>';
//echo'<pre>'; var_dump(get_class_methods($resultat)); echo '</pre>';

// en l'etat, $resultat est inexploitable. Nous devons le traiter avec la methode FETCH afin de rendre les informations exploitables

$info_employe =$resultat->fetch(PDO::FETCH_ASSOC); // FETCH_ASSOC pour un tableau array associatif (le nom des colonnes comme indice du tableau)

//$info_employe =$resultat->fetch(PDO::FETCH_NUM);// FETCH_NUM pour un tableau indexe numeriquement
	
//$info_employe =$resultat->fetch();// ou $info_employe

//$info_employe =$resultat->fetch(PDO::FETCH_BOTH);// c'est le mode par default // FETCH_BOTH est un melange de FETCH_ASSOC et FETCH_NUM

//$info_employe =$resultat->fetch(PDO::FETCH_OBJ);// FETCH_OBJ pour obtenir un objet avec les elements disponibles en proprieté publiques.

echo'<pre>'; print_r($info_employe); echo '</pre>';

echo$info_employe['prenom'];// avec FETCH_ASSOC
//echo$info_employe[1];// avec FETCH_NUM
//echo $info_employe->prenom . '<hr />';// avec FETCH_OBJ

/*
-$pdo rapresente un objet[1] issue de la classe predefinie PDO
-Quand on execute une requete avec la methode query sur notre objet PDO:
-On obtien un nouvel objet[2] issue de la classe PDOStatement. Cet objet a donc des preoprietes et methodes differentes.

-$resultat represente la reponse de la BDD et c'est un resultat inexploitable en l'etat.
-$info_employe est la reponse exploitable (grace au fetch())
-//!\\ ATTENTION il faut choisir un des traitements fetch(PDO::...)
-Il n'est pas possible d'appliquer plusieurs traitement fetch sur le meme resultat.

-Le resultat est la reponse de la BDD et est inexploitable car Mysql nous renvoie beaucoup d'informations.Le Fetch permet de les organiser.
*/

// 4 - PDO: QUERY + WHILE + FETCH (plusieurs résultats)
$resultat = $pdo->query("SELECT * FROM employes");

echo "Le nombre d'mployes: " . $resultat->rowCount() .'<br />';// la methode rowCount() de l'objet PDOStatement retourne le nombre de lignes dans notre resultat.

while($info_employe = $resultat->fetch(PDO::FETCH_ASSOC))
{
	// A chaque tour de boucle while on traite avec un fetch la ligne en cours et on passe a la suivante.
	//echo '<pre>';print_r($info_employe);echo '</pre>';echo '<hr/>';
	echo '<div style="box-sizing: border-box; padding: 10px; background:green; color:white; display: inline-block; width:23%; margin:1%;">';
	
	echo 'id_employes: ' . $info_employe['id_employes'] . '<br />';
	echo 'Nom: ' . $info_employe['nom'] . '<br />';
	echo 'Prenom: ' . $info_employe['prenom'] . '<br />';
	echo 'Salaire: ' . $info_employe['salaire'] . '<br />';
	echo 'Sexe: ' . $info_employe['sexe'] . '<br />';
	echo 'Service: ' . $info_employe['service'] . '<br />';
	echo 'Date d\'embauche: ' . $info_employe['date_embauche'] . '<br />';
	
	echo '</div>';
}

// 5 - EXERCICE 

// Recuperer la liste de BDD presentent sur le serveur 
// Le traiter puis les afficher dans une liste ul li
// Attention à l'indice si vous utilisez FETCH_ASSOC (les indices sont sensibles a la casse) Sur cette requete il y a une majuscule dans l'indice récupéré.

$resultat = $pdo->query("SHOW databases");

echo '<ul>';
while($bdd = $resultat->fetch(PDO::FETCH_ASSOC))
{
	echo '<li>' . $bdd['Database'] . '</li>';
	
}
 echo '</ul>';
 
 // 6 - PDO: QUERY + FETCHALL + FETCH_ASSOC (plusieurs resultats)
 
 $resultat = $pdo->query("SELECT * FROM employes");
 // fetchAll
 $liste_employes = $resultat->fetchAll(PDO::FETCH_ASSOC);
 echo '<pre>'; print_r($liste_employes); echo '</pre>';echo'<hr />';
 // fetchAll() traite toutes les lignes dans notre resultat et on obtien un tableau multidimensionnel
 // 1er niveau la ligne en cours , 2eme niveau les infos de la ligne 
 
 foreach($liste_employes AS $valeur)
 {
	 echo $valeur['prenom']. '<br />';
 }

 // 7 - PDO: QUERY + AFFICHAGE EN TABLEAU

 $resultat = $pdo->query("SELECT * FROM employes");
 //Balise ouverture du tableau
 echo '<table border="1" style="width: 80%; margin: 0 auto; border-collapse: collapse; text-align :center;">';
 // premiere ligne du tableau pour le nom des colonnes 
 echo '<tr>';
 // recuperation du nombre des colonnes dans la requete:
 $nb_col = $resultat->columnCount();
 
 for($i = 0; $i < $nb_col; $i++)
 {
	//echo '<pre>';print_r($resultat->getColumnMeta($i)); echo '</pre>'; echo'<hr />';
	$colonne = $resultat->getColumnMeta($i);//On recupere les infos de la colonne en cours afin ensuite de demander le 'name'
	echo '<th style="padding: 10px;">' . $colonne['name'] . '</th>';
 }
 
 echo '</tr>';
  
 while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
 {
	 echo '<tr>';
	 
	 foreach($ligne AS $info)
	 {
		 echo '<td style="padding: 10px;">' . $info . '</td>';
	 }
	 
	 echo '</tr>';
 }
 echo '</table>';
 
 //----------------------------------------------------------------------------------------------------------------
 //			******************************SECURISATION DES DONNES*****************************************		   |
 //----------------------------------------------------------------------------------------------------------------

// 8 - PDO: PREPARE + BINDPARAM + EXECUTE

$nom = "Laborde";
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");// :nom est un marquer nominatif

// nous pouvons maintenant fournir la valeur de marquer :nom
$resultat->bindParam(":nom", $nom, PDO::PARAM_STR);// bindParam(nom_du_marquer, valeur_du_marquer, type_attendu)
$resultat->execute();
$donnes = $resultat->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($donnes); echo '</pre>';

//BINDPARAM n'accepte que des valeurs sous forme de variable!!!!!!!!

//implode() and explode() (fonctions predefinies)
// implode() permet d'afficher tous les elements d'un tableau array separéespar un separateur fourni en 2eme argument
//explode() decoupe une chaine de caracteres selon un separateur fporni en deuxieme argument et place chaque segment de cette chaine dans un tableau array à des indices differents;
// exemple:
echo implode('<br />', $donnes);

// 9 - PDO: PREPARE + BINDVALUE + EXECUTE

echo '<hr /><hr /><hr />';
$resultat = $pdo->prepare("SELECT * FROM employes WHERE id_employes = :id");// :nom est un marquer nominatif
$resultat->bindValue(":id", 350, PDO::PARAM_INT);//bindValue(nom_du_marquer,valeur_du_marquer, type_attendu)
$resultat = $resultat->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($donnes); echo '</pre>';

// BINDVALUE accepte une variable ou la valeur directement pour le marquer.(ce n'est pas le cas de bindParam qui n'accepte qu'une variable)



















































?>