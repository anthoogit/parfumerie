
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
?>
<script>
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
</script>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Créer une nouvelle fiche client</span></h1>

	<form action="action.php" method="post">
		<p>* indique qu'un champ est obligatoire</p>
		<p>*Code client: <input type="text" name="codeclient" required></p>
		<p>*Nom: <input type="text" name="nom" required></p>
		 <p>*Prenom: <input type="text" name="prenom" required></p>
		 <p>*Adresse: <input type="text" name="adresse" required></p>
		 <p>Facebook: <input type="text" name="facebook" /></p>
		 <p>Instagram: <input type="text" name="instagram" /></p>
		 <p>*Email: <input type="email" name="email" required></p>
		 <p>Telephone: <input type="text" name="telephone" /></p>
		 <p>*Login: <input type="text" name="login" required></p>
		 <p>*Mot de passe: <input type="password" name="mdp" id ="mdp" onkeyup='check();' required></p>
		 <p>*Confirmation Mot de passe: <input type="password" name="confirm_mdp" id="confirm_mdp" onkeyup='check();' required></p>
		 <span id='message'></span>
		 <p><input type="submit" value="Ajouter"/></p>
	</form>
	
</div>

<?php require('footer.php'); ?>
</body>
</html>