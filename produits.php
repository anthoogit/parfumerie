
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Produits</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php 
require('header.php'); 
$req = getProduits();
?>

<div id="bloc_page">
	<h1 class="titre_principal"><span>Produits</span></h1>
	<p>
		<table>
			<thead>
				<tr>
					<th>noProduit</th>
					<th>nom</th>
					<th>prixUnitaire</th>
					<th>stock</th>
				</tr>
			</thead>

			<tbody>
				<?php
				while ($produit = $req->fetch()) {
				?>

					<tr>
						<td><?= $produit['noProduit'] ?></td>
						<td><?= $produit['nom'] ?></td>
						<td><?= $produit['prixUnitaire'] ?></td>
						<td><?= $produit['stock'] ?></td>
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