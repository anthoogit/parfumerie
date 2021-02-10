<?php
require('header.php');
$req = getCadeau();
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
		<a class="bouton" href="new-cadeau.php" >Créer une nouvelle fiche cadeau</a>
	</div>
</div>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Cadeaux</span></h1>
<p>
	<table>
		<thead>
			<tr>
				<th>noCadeau</th>
				<th>nomCadeau</th>
				<th>prixFidelite</th>
				<th>niveauMembership</th>
				<th>stock</th>
			</tr>
		</thead>

		<tbody>
			<?php
			while ($cadeau = $req->fetch()) {
			?>

				<tr>
					<td><?= $cadeau['noCadeau'] ?></td>
					<td><?= $cadeau['nomCadeau'] ?></td>
					<td><?= $cadeau['prixFidelite'] ?></td>
					<td><?= $cadeau['niveauMembership'] ?></td>
					<td><?= $cadeau['stock'] ?></td>
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