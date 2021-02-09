
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer une nouvelle fiche client</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php 
require('header.php'); 
$req = getClients(); 

if(isset($_GET['success'])){
	if($_GET['success'] == true){
		echo '<script>alert("La commande a bien été créer !")</script>';
	}
}

if(isset($_GET['error'])){
	if($_GET['error'] == "duplicate_noCommande"){
		echo '<script>alert("Le numéro de commande existe déjà !")</script>';
	} else if($_GET['error'] == "duplicate_numColis"){
		echo '<script>alert("Le numéro de colis existe déjà !")</script>';
	}
}
?>
<!-- <script>
	var check = function() {
		if (document.getElementById('mdp').value ==
			document.getElementById('confirm_mdp').value) {
			document.getElementById('message').style.color = 'green';
			document.getElementById('message').innerHTML = 'Les mots de passes correspondent';
		} else {
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'Les mots de passes ne correspondent pas';
		}
	}
</script> -->

<div id="bloc_page">
	<h1 class="titre_principal"><span>Créer une nouvelle commande</span></h1>

	<form action="new-commande-process.php" method="GET">
		<p>* indique qu'un champ est obligatoire</p>
		<p>*noCommande: <input type="text" name="noCommande" required></p>
		<p>*nbPoint: <input type="number" name="nbPoint" required></p>
		<p>*numColis: <input type="text" name="numColis" required /></p>
		<p>*fraisLivraison: <input type="number" step=".01" name="fraisLivraison" required></p>
		<p>*fraisService: <input type="number" step=".01" name="fraisService" required></p>
		<p>*promotion: <input type="number" step=".01" name="promotion" required></p>
		<p>*codeClient:
        <select name="CodeClient">
			<option value="">-- Choisir un client</option>
            <?php
            $req = getClients();
            while ($client = $req->fetch()){
                ?>
                <option value="<?= $client["CodeClient"] ?>"><?= $client["CodeClient"] ?></option>
                <?php
            }
            ?>
        </select>
		</p>
		<span id='message'></span>
		<p><input type="submit" name="submit_new_user" value="Ajouter"/></p>
	</form>
	
</div>

<?php require('footer.php'); ?>
</body>
</html>