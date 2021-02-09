
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Info commande</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php 
require('header.php'); 
if(isset($_GET['success'])){
	if($_GET['success'] == true){
		echo '<script>alert("La commande a bien été modifié !")</script>';
	}
}
?>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Infos commande</span></h1>

	<form action="" method="GET">
		<label for="commande_id">ID Commande</label>
		<input type="text" name="commande_id" id="commande_id" />
		<input type="submit" value="Valider" />
	</form><br/><br/>

	<div class="modif">
		<a href="edit-commande.php?commande_id=<?php echo $_GET["commande_id"]; ?>" >Editer la commande</a>
	</div><br/><br/><br/>

	<?php
	if (isset($_GET["commande_id"])){
		$commande_id = $_GET["commande_id"];
		if (verifCommande_ID($commande_id)){
			$commande = getCommande($commande_id);
			$req_produits = getProduitsCommande($commande_id);
		?>

		<div class="container">
			<div>
				<h3><?= "noCommande : " . $commande["noCommande"]; ?></h3>
				<p>
					<?= "dateCommande : " . $commande["dateCommande"]; ?><br />
					<?= "etatCommande : " . $commande["etatCommande"]; ?><br />
					<?= "nbPoints : " . $commande["nbPoints"]; ?><br />
					<?= "prixTotal : " . $commande["prixTotal"]; ?><br />
					<?= "numColis : " . $commande["numColis"]; ?><br />
					<?= "dateExpedition : " . $commande["dateExpedition"]; ?><br />
					<?= "dateArrivee : " . $commande["dateArrivee"]; ?><br />
					<?= "datePaiement : " . $commande["datePaiement"]; ?><br />
					<?= "fraisService : " . $commande["fraisService"]; ?><br />
					<?= "promotion : " . $commande["promotion"]; ?><br />
					<?= "codeClient : " . $commande["codeClient"]; ?><br />
				</p>
			</div>
			<div class="colonne_aside">
				<h3 class="titre_orange">Produits commandés :</h3>
				<p>
					<?php
					$prixTotal = 0;
					while ($produit = $req_produits->fetch()) {
						$prixTotal += ($produit["prixAchat"] * $produit["quantite"]);
					?>
						<?= "Produit : " . $produit["nom"] ?><br />
						<?= "Quantité : " . $produit["quantite"] ?><br />
						<?= "Prix d'achat : " . $produit["prixAchat"] . "€" ?><br />
						<p>----</p>
					<?php
					}
					?>
					<strong>Total : <?= $prixTotal . "€" ?></strong>
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