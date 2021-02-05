<?php

require('model.php'); 

if(isset($_POST['submit_new_user'])){  //Vérification des données en POST

	$new_user_codeclient = $_POST['codeclient'];
	$new_user_nom = $_POST['nom'];
	$new_user_prenom = $_POST['prenom'];
	$new_user_adresse = $_POST['adresse'];
	$new_user_facebook = $_POST['facebook'];
	$new_user_instagram = $_POST['instagram'];
	$new_user_email = $_POST['email'];
	$new_user_telephone = $_POST['telephone'];
	$new_user_login = $_POST['login'];
	$new_user_mdp = $_POST['mdp'];

	//-------------Récupération des nom et prénom de l'utilisateur ayant le même nom que celui saisi-------------//

	$db = dbConnect();
	$req = $db->prepare("SELECT CodeClient FROM client WHERE CodeClient='$new_user_codeclient'");
	$req->execute(array());
	$duplicate_codeclient = $req->fetch();

	$req = $db->prepare("SELECT nom_utilisateur FROM utilisateur WHERE nom_utilisateur='$new_user_login'");
	$req->execute(array());
	$duplicate_login = $req->fetch();

	if($duplicate_codeclient){
		header("location: new-client.php?error=duplicate_codeclient");
	} else if($duplicate_login) {
		header("location: new-client.php?error=duplicate_login");
	} else {
		//----------Insertion des infos du nouvel utilisateur---------------//

		try{
			setClient($new_user_codeclient, $new_user_nom, $new_user_prenom, $new_user_adresse, $new_user_facebook, $new_user_instagram, $new_user_email, $new_user_telephone);
			setUser($new_user_login, $new_user_mdp, $new_user_codeclient);
			} catch (PDOException $e) {
				echo 'Error: ' . $e->getMessage();
			}
			header("location: new-client.php?success=true");
	}

} else {
	echo "erreur de POST";
}

?>