<?php
require('model.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon profil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php require('header.php'); ?>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Mon profil</span></h1>
	<form action="" method="GET">
		<label for="client_id">ID Client</label>
		<input type="text" name="client_id" id="client_id" />
		<input type="submit" value="Valider" />
	</form>

	<?php
	if (isset($_GET["client_id"])){
		$client_id = $_GET["client_id"];
		if (verifClient_ID($client_id)){
			$client = getclient($client_id);
		?>

		<div class="container">
			<div>
				<h3>Mes Informations</h3>
				<p>
					<?= "Code client : " . $client["CodeClient"]; ?><br />
					<?= "Nom : " . $client["nom"]; ?><br />
					<?= "Prénom : " . $client["prenom"]; ?><br />
					<?= "Adresse : " . $client["adresse"]; ?><br />
					<?= "facebook : " . $client["facebook"]; ?><br />
					<?= "instagram : " . $client["instagram"]; ?><br />
					<?= "email : " . $client["email"]; ?><br />
					<?= "numeroTel : " . $client["numeroTel"]; ?><br />
					<?= "nbPoints : " . $client["nbPoints"]; ?><br />
					<?= "id_membership : " . $client["id_membership"]; ?><br />
					<?= "dateExpiration : " . $client["dateExpiration"]; ?><br />
				</p>
			</div>
			<div class="colonne_aside">
				<h3 class="titre_orange">Mes Commandes</h3>

				<p>Mes dernières commandes</p>
				<ul>
				<?php
				$req = getCommandesClient($client_id);
				while ($commande = $req->fetch()){
					echo '<li><a href="commande.php?commande_id=' . $commande["noCommande"] . '">' . $commande["noCommande"] . ' - '. $commande["dateCommande"] . '</a></li>';
				}
				?>
				</ul>
				<p><a href="#">Suivre mes commandes</a></p>
				<p><a href="#">Demander de l'aide</a></p>
				<p><a href="#">Faire un retour</a></p>

				<p>Posez vos questions sur nos réseaux :</p>
			</div>
		</div>

		<?php
		}
		else{
			echo '<p>Code client inexistant</p>';
		}
	}
	?>
</div>

<?php require('footer.php'); ?>
</body>
</html>