<?php

require('model.php'); 

if(isset($_POST['submit_edit_commande'])){  //Vérification des données en POST

	$no_commande = $_POST['noCommande'];
	$edit_dateCommande = $_POST['dateCommande'];
	$edit_etatCommande = $_POST['etatCommande'];
	$edit_nbPoints = $_POST['nbPoints'];
	$edit_prixTotal = $_POST['prixTotal'];
	$edit_numColis = $_POST['numColis'];
	$edit_dateExpedition = $_POST['dateExpedition'];
	$edit_dateArrivee = $_POST['dateArrivee'];
	$edit_datePaiement = $_POST['datePaiement'];
	$edit_fraisLivraison = $_POST['fraisLivraison'];
	$edit_fraisService = $_POST['fraisService'];
	$edit_promotion = $_POST['promotion'];
    $edit_codeClient = $_POST['codeClient'];

	$db = dbConnect();
    //----------Insertion des infos de la nouvelle commande---------------//

    try{
        editCommande($edit_dateCommande, $edit_etatCommande, $edit_nbPoints, $edit_prixTotal, $edit_numColis, $edit_dateExpedition, $edit_dateArrivee, $edit_datePaiement, $edit_fraisLivraison, $edit_fraisService, $edit_promotion, $edit_codeClient, $no_commande);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        header("location: info-commande.php?commande_id=".$no_commande."&success=true");
	

} else {
	echo "erreur de POST";
}

?>