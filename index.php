
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
		}
	} else {
		echo "Connectez-vous pour accéder au large choix de cadeaux !<br/><br/>";
	}
	?>

	<a href="produits.php">Produits (à afficher que pour l'admin)</a><br/>
	<a href="clients.php">Clients (à afficher que pour l'admin)</a><br/>
	<a href="commandes.php">Commandes (à afficher que pour l'admin)</a><br/>
	<a href="profil_client.php?client_id=1">Profil client (A DEPLACER DANS CLIENTS.PHP)</a><br/>
	<a href="info-commande.php?commande_id=1">Info commande (//refaire une page où on aurait tte la liste + option de rechercher par ID)</a><br/>
</div>

<?php require('footer.php'); ?>
</body>
</html>
