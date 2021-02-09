
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>

<body>
<?php require('header.php'); ?>


<div id="bloc_page">
	<h1 class="titre_principal"><span>Accueil</span></h1>

	<?php
	 if(isset($_SESSION['loggedin'])){
	 	if($_SESSION['loggedin'] && $_SESSION['loggedin'] == true){
			$user = $_SESSION['username'];
			
			//récupérer nombre de points de l'utilisateur
			$client = getclient($id_client['id_client']);
			
			// afficher un message
			echo "<h2>Vous avez ".$client['nbPoints']." points !</h2><br/>";
			echo '<div class="bouton_catalogue"><a href="pagecadeau.php">Voir le catalogue de cadeaux</a></div><br/><br/>';
		
			if($_SESSION['username'] == "admin"){
				echo '<div class="bouton_catalogue"><a href="produits.php">Produits [ADMIN ONLY]</a></div><br/><br/>';
				echo '<div class="bouton_catalogue"><a href="clients.php">Clients [ADMIN ONLY]</a></div><br/><br/>';
				echo '<div class="bouton_catalogue"><a href="commandes.php">Commandes [ADMIN ONLY]</a></div><br/><br/>';
				echo '<div class="bouton_catalogue"><a href="profil_client.php?client_id=1">Profil client (A DEPLACER DANS CLIENTS.PHP)</a></div><br/><br/>';
				echo '<div class="bouton_catalogue"><a href="info-commande.php?commande_id=1">Info commande</a></div><br/>';
			}
		
		}
	} else {
		echo "Connectez-vous pour accéder au large choix de cadeaux !<br/><br/>";
	}



	?>

	
</div>

<?php require('footer.php'); ?>
</body>
</html>
