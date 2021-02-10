
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer une nouvelle fiche cadeau</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php 
require('header.php'); 
$req = getCadeau();

if(isset($_GET['success'])){
	if($_GET['success'] == true){
		echo '<script>alert("Le cadeau a bien été ajouté !")</script>';
	}
}

if(isset($_GET['error'])){
	if($_GET['error'] == "duplicate_noCadeau"){
		echo '<script>alert("Le numéro du cadeau existe déjà !")</script>';
	}
}
?>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Créer une nouvelle fiche cadeau</span></h1>

	<form action="new-cadeau-process.php" method="POST">
		<p>* indique qu'un champ est obligatoire</p>
		<p>*Numéro cadeau: <input type="text" name="noCadeau" required></p>
		<p>*Nom: <input type="text" name="nomCadeau" required></p>
		<p>*Prix fidélité: <input type="text" name="prixFidelite" required></p>
		<p>*Niveau membership nécessaire (1 pour Gold, 2 pour Silver et 3 pour Bronze): <input type="text" name="membership" required></p>
		<p>Stock: <input type="text" name="stock" /></p>
		<p><input type="submit" name="submit_new_cadeau" value="Ajouter"/></p>
	</form>
	
</div>

<?php require('footer.php'); ?>
</body>
</html>