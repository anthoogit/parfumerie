
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
if (isset($_POST['confirm'])){
    $commande_id = $_POST["commande_id"];
    deleteCommande($commande_id);
    header('location: profil_client.php?client_id='.$id_client['id_client'].'');
}
?>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Suppression commande</span></h1>

	<?php
	if (isset($_POST["supprimer"])){
		$commande_id = $_POST["commande_id"];
		if (verifCommande_ID($commande_id)){

        ?>

            <p>Êtes-vous sur de vouloir supprimer la commande numéro <?= $commande_id ?></p>

			<form action="" method="POST">
                <input type="hidden" name="commande_id" value="<?= $commande_id ?>" required />
				<p><input type="submit" name="confirm" value="Confirmer la suppression"/></p>
			</form>
			
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