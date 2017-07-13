  <?php
  
  $pdo = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  
     $showbdd = $pdo->query("SELECT * FROM annuaire");
		echo '<hr />';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
				
					echo "<table class='table table-bordered' style='background:lightgray;' > <tr>";
					for($i=0; $i<$showbdd->columnCount(); $i++)
					{
						$colonne = $showbdd->getColumnMeta($i);
						echo '<th>'.$colonne['name'].'</th>';
					}
					echo "</tr>";
					 
					while ($ligne = $showbdd->fetch(PDO::FETCH_ASSOC))
					{
						echo '<tr>';
						foreach ($ligne as $indice => $information)
						{
							echo '<td>' . $information . '</td>';
						}
						echo '</tr>';
					}
					echo '</table>';
				echo '</div>';
			echo '</div>';
	
	
	
	
	
	
	
	
	
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="Moi">

    <title>formulaire contact</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
		