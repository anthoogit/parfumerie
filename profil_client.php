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

<h3>Produits</h3>
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

	<?php
	}
	else{

	}
}
?>


</body>
</html>