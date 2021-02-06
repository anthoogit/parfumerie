
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon profil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php 
require('header.php'); 

if(isset($_GET['success'])){
	if($_GET['success'] == true){
		echo '<script>alert("Les informations du client ont bien été modifié !")</script>';
	}
}
?>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Editer profil</span></h1>

	<?php
	if (isset($_GET["client_id"])){
		$client_id = $_GET["client_id"];
		if (verifClient_ID($client_id)){
			$client = getclient($client_id);
		?>

		<div class="container">

			<form action="edit-client-process.php" method="POST">
				<p>* indique qu'un champ est obligatoire</p>
				<input type="hidden" name="codeclient" value="<?php echo $client["CodeClient"]; ?>" required></p>
				<p>*Nom: <input type="text" name="nom" value="<?php echo $client["nom"]; ?>" required></p>
				<p>*Prenom: <input type="text" name="prenom" value="<?php echo $client["prenom"]; ?>" required></p>
				<p>*Adresse: <input type="text" name="adresse" value="<?php echo $client["adresse"]; ?>" required></p>
				<p>Facebook: <input type="text" name="facebook" value="<?php echo $client["facebook"]; ?>" /></p>
				<p>Instagram: <input type="text" name="instagram" value="<?php echo $client["instagram"]; ?>" /></p>
				<p>*Email: <input type="email" name="email" value="<?php echo $client["email"]; ?>" required></p>
				<p>Telephone: <input type="text" name="telephone" value="<?php echo $client["numeroTel"]; ?>" /></p>
				
				<p><input type="submit" name="submit_edit_user" value="Enregistrer les modifications"/></p>
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