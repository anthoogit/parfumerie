<?php
require('model.php');
$req = getClients();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer une nouvelle fiche client</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php require('header.php'); ?>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Créer une nouvelle fiche client</span></h1>

	<form action="action.php" method="post">
 		<p>Nom: <input type="text" name="nom" /></p>
 		<p>Prenom: <input type="text" name="prenom" /></p>
 		<p><input type="submit" value="Ajouter"/></p>
	</form>
	
</div>

<?php require('footer.php'); ?>
</body>
</html>