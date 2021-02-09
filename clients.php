<?php
require('header.php');
//require('model.php');
$req = getClients();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Clients</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>


<div>
	<div class="btntop">
		<a class="bouton" href="new-client.php" >Créer une nouvelle fiche client</a>
	</div>
</div>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Liste des clients</span></h1>

	<form action="profil_client.php" method="GET">
		<label for="client_id">ID Client</label>
		<input type="text" name="client_id" id="client_id" />
		<input type="submit" value="Valider" />
	</form><br/><br/>

	<table>
		<thead>
			<tr>
				<th>Code Client</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Adresse</th>
				<th>Facebook</th>
				<th>Instagram</th>
				<th>Email</th>
				<th>Numéro téléphone</th>
				<th>Points</th>
				<th>Membership Title</th>
				<th>Date Epiration</th>
			</tr>
		</thead>

		<tbody>
			<?php
			while ($client = $req->fetch()) {
			?>

				<tr>
					<td><a href="profil_client.php?client_id=<?=$client['CodeClient']?>"><?= $client['CodeClient'] ?></a></td>
					<td><?= $client['nom'] ?></td>
					<td><?= $client['prenom'] ?></td>
					<td><?= $client['adresse'] ?></td>
					<td><?= $client['facebook'] ?></td>
					<td><?= $client['instagram'] ?></td>
					<td><?= $client['email'] ?></td>
					<td><?= $client['numeroTel'] ?></td>
					<td><?= $client['nbPoints'] ?></td>
					<td><?= $client['id_membership'] ?></td>
					<td><?= $client['dateExpiration'] ?></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<?php require('footer.php'); ?>
</body>
</html>