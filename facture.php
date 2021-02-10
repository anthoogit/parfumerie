<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon profil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php
    require('model.php');
    if(isset($_POST['invoice'])){
    if (isset($_POST["commande_id"])){
		$commande_id = $_POST["commande_id"];
		if ((verifFacture_ID($commande_id)) == false){
            setFacture($commande_id, date('Y/m/d'));
            //echo ' facture existe pas ';
            $date_facture = date('Y/m/d');
        }
        elseif (verifFacture_ID($commande_id)){
            $facture = getFacture($commande_id);
            //echo ' facture existe ';
            $date_facture = $facture['dateFacture'];
        }

        $clientinfo = getClientInfo_invoice($commande_id);
        $commande = getCommande($commande_id);
        $req_produits = getProduitsCommande($commande_id);
?>

<div id="bloc_page">
    <h1 class="titre_principal"><span>Facture</span></h1>
    
    <p>No. client : <?php echo $clientinfo['CodeClient'] ?></p>
    <p>Client : <?php echo $clientinfo['nom'],' ', $clientinfo['prenom']?></p>
    <p>Adresse : <?php echo $clientinfo['adresse'] ?></p>
    <p>Telephone : <?php echo $clientinfo['numeroTel'] ?></p>
    <hr/>
    <p>No. commande : <?php echo $commande_id ?></p>
    <p>Date de commande : <?php echo $commande['dateCommande'] ?></p>
    <p>Facture numero : <?php echo $commande_id ?></p>
    <p>Date de facture : <?php echo $date_facture ?></p>
    
    <table>
        <thead>
            <td>No.</td>
            <td>Produit</td>
            <td>Quantité</td>
            <td>Prix Unité</td>
            <td>Prix Total</td>
        </thead>
        <tbody>
            <?php
            $cpt = 0;
            $prixtotal=0;
			while ($produit = $req_produits->fetch()) {
            $cpt++;
            $prixtotalunitaire=($produit['quantite']*$produit['prixUnitaire']);
            $prixtotal=$prixtotal+$prixtotalunitaire;
            ?>
            
                
				<tr>
					<td><?= $cpt ?></td>
					<td><?= $produit['nom'] ?></td>
					<td><?= $produit['quantite'] ?></td>
					<td><?php echo $produit['prixUnitaire'],' €' ?></td>
					<td><?php echo ($produit['quantite']*$produit['prixUnitaire']),' €'  ?></td>
				</tr>
			<?php
			}
			?>
		</tbody>
    </table>

    <table>
        <tr>
            <td>Montant de la commande</td>
            <td><?php echo $prixtotal,' €' ?></td>
        </tr>
        <tr>
            <td>Frais de service</td>
            <td><?php echo $commande['fraisService'],' €' ?></td>
        </tr>
        <tr>
            <td>Frais de livraison</td>
            <td><?php echo $commande['fraisLivraison'],' €' ?></td>
        </tr>
        <tr>
            <td>Promotion/Remise</td>
            <td><?php echo $commande['promotion'],' €' ?></td>
        </tr>
        <tr>
            <td>Montant de la facture</td>
            <td><?php echo ($prixtotal-$commande['promotion']+$commande['fraisService']+$commande['fraisLivraison']),' €' ?></td>
        </tr>
    </table>




</div>

<?php
    }
		else{
			echo '<p>no Commande inexistant</p>';
        }
    } else {
        echo 'formulaire manquant';
    }
        
?>

</body>
</html>