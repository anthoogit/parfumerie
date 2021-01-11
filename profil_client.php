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

	<?= "Code client : " . $client["CodeClient"]; ?>
	<?= "Nom : " . $client["nom"]; ?>
	<?= "Prénom : " . $client["prenom"]; ?>
	<?= "Adresse : " . $client["adresse"]; ?>
	<?= "facebook : " . $client["facebook"]; ?>

	<?php
	}
}
?>


</body>
</html>