<?php

require('model.php'); 

if(isset($_POST['submit_new_cadeau'])){  //Vérification des données en POST

	$new_cadeau_numero = $_POST['noCadeau'];
	$new_cadeau_nom = $_POST['nomCadeau'];
	$new_cadeau_prix = $_POST['prixFidelite'];
	$new_cadeau_membership = $_POST['membership'];
	$new_cadeau_stock = $_POST['stock'];

	//-------------Récupération des nom et prénom de l'utilisateur ayant le même nom que celui saisi-------------//

	$db = dbConnect();
	$req = $db->prepare("SELECT noCadeau FROM cadeau WHERE noCadeau='$new_cadeau_numero'");
	$req->execute(array());
	$duplicate_noCadeau = $req->fetch();

	if($duplicate_noCadeau){
		header("location: new-client.php?error=duplicate_noCadeau");
	} else {
		//----------Insertion des infos du nouvel utilisateur---------------//

		try{
			setCadeau($new_cadeau_numero, $new_cadeau_nom, $new_cadeau_prix, $new_cadeau_membership, $new_cadeau_stock);
			} catch (PDOException $e) {
				echo 'Error: ' . $e->getMessage();
			}
			header("location: new-cadeau.php?success=true");
	}

} else {
	echo "erreur de POST";
}

?>