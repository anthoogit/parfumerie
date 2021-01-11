<?php
require('model/model.php');
$req = getProduits();
?>
<link rel="stylesheet" type="text/css" href="style.css">
<h3>Produits</h3>
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