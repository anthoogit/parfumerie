<?php
require('model.php');
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
	<h1>Liste des clients</h1><br/><br/>

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
				<th>Numéro tel.</th>
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
					<td><?= $client['CodeClient'] ?></td>
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

    
</body>
</html>