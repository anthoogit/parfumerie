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
	<h3 class="titre_principal">Mes commandes</h3>
	<form action="" method="GET">
		<label for="commande_id">ID Commande</label>
		<input type="text" name="commande_id" id="commande_id" />
		<input type="submit" value="Valider" />
	</form>

	<?php
	if (isset($_GET["commande_id"])){
		$commande_id = $_GET["commande_id"];
		if (verifCommande_ID($commande_id)){
			$commande = getCommande($commande_id);
		?>

		<div class="container">
			<div>
				<h3>Nom commande</h3>
				<p>
					<?= "noCommande : " . $commande["noCommande"]; ?><br />
					<?= "dateCommande : " . $client["dateCommande"]; ?><br />
					<?= "etatCommande : " . $client["etatCommande"]; ?><br />
				</p>
			</div>
		</div>

		<?php
		}
		else{
			echo '<p>ID commande inexistant</p>';
		}
	}
	?>
</div>

<?php require('footer.php'); ?>
</body>
</html>