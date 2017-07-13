<meta charset="utf-8" />
<style>
	*{ font-family :sans-serif;}
	h1 {padding:10px;background:green;}
	p {padding:10px;background:red;color:yellow;}
	.erreur {margin-top:20px; background:red;color:white;padding:10px;text-align:center;}
	.succes {margin-top:20px; background:green;color:white;padding:10px;text-align:center;}
</style>


<a href="formulaire2.php">Lien x la page 1</a>
<?php

$message = "";
 
echo'<pre>';print_r($_POST);'</pre>';

//$valid_pseudo($pseudo,$minlenght)
//$pseudo = "";
//$minlenght = 4;
/* if($minlenght >= 4 && $pseudo != null){
	return "Welcome back " . $pseudo .'<br />'; 
else
	return "Nous sommes desolée " . $minlenght . " is not long enough".'<br />';
} */

if(isset($_POST['pseudo']) && isset($_POST['email']))
{
	$pseudo = $_POST['pseudo'];
	$email  = $_POST['email'];
	
	if(iconv_strlen($_POST['pseudo']) > 3 && iconv_strlen($_POST['pseudo']) < 15)
	{
		$message .='<p class="succes">Votre pseudo est: ' . $pseudo . '</p>';
	}	

		else
		{
			$message .= '<p class="erreur">Attention, la taille du pseudo est invalide<br />En effet, le pseudo doit avoir entre 4 et 14 caractéres inclus</p>';
		}
		
		// control sur le format de l'email
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$message .= '<p class="succes">Votre email est:' . $email . '</p>';
		}
		else{
			$message .= '<p class="erreur">Attention le format du mail est invalide<br />Vouillez verifier votre saisie</p>';
		}
}		
echo '<h1>Resultats:</h1>';

echo $message;

































