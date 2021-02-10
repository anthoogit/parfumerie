
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Commandes</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php 
require('header.php'); 
$req = getCommandes();
?>

<div>
	<div class="btntop">
		<a class="bouton" href="new-commande.php" >Créer une nouvelle commande</a>
	</div>
</div>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Commandes</span></h1>

	<form action="info-commande.php" method="GET">
		<label for="commande_id">ID Commande</label>
		<input type="text" name="commande_id" id="commande_id" />
		<input type="submit" value="Valider" />
	</form><br/><br/>

	<div class="modif">
		<a href="list-commandes-csv.php" >Exporter les commandes en .CSV</a>
	</div><br/>

	<p>
		<table>
			<thead>
				<tr>
					<th>noCommande</th>
					<th>dateCommande</th>
					<th>etatCommande</th>
					<th>nbPoints</th>
					<th>prixTotal</th>
					<th>numColis</th>
					<th>dateArrivee</th>
					<th>datePaiement</th>
					<th>fraisService</th>
					<th>promotion</th>
					<th>codeClient</th>
				</tr>
			</thead>

			<tbody>
				<?php
				while ($commande = $req->fetch()) {
				?>

					<tr>
						<td><a href="info-commande.php?commande_id=<?=$commande['noCommande']?>"><?= $commande['noCommande'] ?></a></td>
						<td><?= $commande['dateCommande'] ?></td>
						<td><?= $commande['etatCommande'] ?></td>
						<td><?= $commande['nbPoints'] ?></td>
						<td><?= $commande['prixTotal'] ?></td>
						<td><?= $commande['numColis'] ?></td>
						<td><?= $commande['dateArrivee'] ?></td>
						<td><?= $commande['datePaiement'] ?></td>
						<td><?= $commande['fraisService'] ?></td>
						<td><?= $commande['promotion'] ?></td>
						<td><a href="profil_client.php?client_id=<?=$commande['codeClient']?>"><?= $commande['codeClient'] ?></a></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</p>
</div>

<?php require('footer.php'); ?>
</body>
</html>