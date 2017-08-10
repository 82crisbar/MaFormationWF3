<!DOCTYPE html>
<html>
<head>
	<title>Faisons le ménage</title>
	<meta charset="utf-8">
</head>
<style>
body{
	padding-top:50px;
	background:green;
	text-align:center;
}
</style>
<body>

	<h1>Ajout d'un véhicule</h1>
	<form method="POST"> <!-- Debut du formulaire -->

		<div id="formdata"></div>

		<div>
			<label for="brand">Marque :</label>
			<input type="text" name="brand" id="brand" required>
		</div>
		<div>
			<label for="model">Modèle :</label>
			<input type="text" name="model" id="model" required>
		</div>

		<div>
			<label for="year">Année :</label>
			<input type="text" name="year" id="year" required>
		</div>

		<div>
			<label for="color">Couleur :</label>
			<input type="text" name="color" id="color" required>
		</div>

		<div>
			<input type="submit" value="Envoyer">
	</form> <!-- Fin du formulaire -->

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
$(function(){
	$('input[type="submit"]').click(function(e){
		e.preventDefault();
		$.ajax({
			url: 'inc/AddVehicle.php',
			type: 'post',
			cache: false,
			data: $('form').serialize(),
			dataType: 'json',
			success: function(result) {
				if(result.code == 'success'){
					$('#formdata').html('<div class="green">'+result.msg+'</div>');
					$('input[type="text"]').val(''); 
				}
				else {
					$('#formdata').html('<div class="red">'+result.msg+'</div>');

				}
			},
			error: function(err){
			}
		});
	});
});
</script>

</body>
</html>