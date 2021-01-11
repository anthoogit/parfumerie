<?php
require('model.php');
?>

<h3>Produits</h3>
<form action="" method="GET">
	<label for="client_id">ID Client</label>
	<input type="text" name="client_id" id="client_id" />
	<input type="submit" value="Valider" />
</form>
<p>

	$client = getclient($_GET["client_id"]);

</p>
</div>
