<?php

require('model.php'); 

if(isset($_POST['submit_edit_user'])){  //Vérification des données en POST

	$user_codeclient = $_POST['codeclient'];
	$edit_user_nom = $_POST['nom'];
	$edit_user_prenom = $_POST['prenom'];
	$edit_user_adresse = $_POST['adresse'];
	$edit_user_facebook = $_POST['facebook'];
	$edit_user_instagram = $_POST['instagram'];
	$edit_user_email = $_POST['email'];
	$edit_user_telephone = $_POST['telephone'];

	$db = dbConnect();
		//----------Insertion des infos du nouvel utilisateur---------------//

		try{
			editClient($edit_user_nom, $edit_user_prenom, $edit_user_adresse, $edit_user_facebook, $edit_user_instagram, $edit_user_email, $edit_user_telephone, $user_codeclient);
			} catch (PDOException $e) {
				echo 'Error: ' . $e->getMessage();
			}
			header("location: edit-client.php?client_id=".$user_codeclient."&success=true");
	

} else {
	echo "erreur de POST";
}

?>