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
		echo '<script>alert("Les informations de la commande ont bien été modifié !")</script>';
	}
}
?>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Editer commande</span></h1>

	<?php
	if (isset($_GET["commande_id"])){
		$commande_id = $_GET["commande_id"];
		if (verifClient_ID($commande_id)){
			$commande = getCommande($commande_id);
		?>

		<div class="container">

			<form action="edit-commande-process.php" method="POST">
				<p>* indique qu'un champ est obligatoire</p>
				<input type="hidden" name="noCommande" value="<?php echo $commande["noCommande"]; ?>" required></p>
				<p>*dateCommande: <input type="date" name="dateCommande" value="<?php echo $commande["dateCommande"]; ?>" required></p>
				<p>*etatCommande: <input type="number" name="etatCommande" value="<?php echo $commande["etatCommande"]; ?>" required></p>
				<p>*nbPoints: <input type="number" name="nbPoints" value="<?php echo $commande["nbPoints"]; ?>" required></p>
				<p>*prixTotal: <input type="number" name="prixTotal" value="<?php echo $commande["prixTotal"]; ?>" required></p>
				<p>*numColis: <input type="number" name="numColis" value="<?php echo $commande["numColis"]; ?>" required/></p>
				<p>dateExpedition: <input type="date" name="dateExpedition" value="<?php echo $commande["dateExpedition"]; ?>" /></p>
				<p>dateArrivee: <input type="date" name="dateArrivee" value="<?php echo $commande["dateArrivee"]; ?>" /></p>
				<p>datePaiement: <input type="date" name="datePaiement" value="<?php echo $commande["datePaiement"]; ?>" ></p>
				<p>*fraisLivraison: <input type="number" name="fraisLivraison" value="<?php echo $commande["fraisLivraison"]; ?>" required></p>
				<p>*fraisService: <input type="number" name="fraisService" value="<?php echo $commande["fraisService"]; ?>" required></p>
				<p>*promotion: <input type="text" name="promotion" value="<?php echo $commande["promotion"]; ?>" required/></p>
				<p>*codeClient: <input type="text" name="codeClient" value="<?php echo $commande["codeClient"]; ?>" required/></p>
				
				<p><input type="submit" name="submit_edit_commande" value="Enregistrer les modifications"/></p>
			</form>
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