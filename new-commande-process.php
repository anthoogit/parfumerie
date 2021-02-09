<?php

require('model.php'); 

if(isset($_POST['submit_new_user'])){  //Vérification des données en POST

	$new_noCommande = $_POST['noCommande'];
	$new_dateCommande = date("Y-m-d");
	$new_etatCommande = 0;
	$new_nbPoint = $_POST['nbPoint'];
	$new_prixTotal = 500;
	$new_numColis = $_POST['numColis'];
	$new_dateExpedition = NULL;
	$new_dateArrivee = NULL;
	$new_datePaiement = NULL;
	$new_fraisLivraison = $_POST['fraisLivraison'];
	$new_fraisService = $_POST['fraisService'];
	$new_promotion = $_POST['promotion'];
	$new_codeClient = $_POST['codeClient'];
    
	//-------------Récupération des nom et prénom de l'utilisateur ayant le même nom que celui saisi-------------//

	$db = dbConnect();
	$req = $db->prepare("SELECT noCommande FROM commande WHERE noCommande='$new_noCommande'");
	$req->execute(array());
	$duplicate_noCommande = $req->fetch();

	$req = $db->prepare("SELECT numColis FROM commande WHERE numColis='$new_numColis'");
	$req->execute(array());
	$duplicate_numColis = $req->fetch();

	if($duplicate_noCommande){
		header("location: new-commande.php?error=duplicate_noCommande");
	} else if($duplicate_numColis) {
		header("location: new-commande.php?error=duplicate_numColis");
	} else {
		//----------Insertion des infos de la nouvelle commande---------------//

		try{
            setCommande($new_noCommande, $new_nbPoint, $new_prixTotal, $new_numColis, $new_fraisLivraison, $new_fraisService, $new_promotion, $new_codeClient);

			// setProduit_Commande ?
			} catch (PDOException $e) {
				echo 'Error: ' . $e->getMessage();
			}
			header("location: new-commande.php?success=true");
	}

} else {
	echo "erreur de POST";
}

?>