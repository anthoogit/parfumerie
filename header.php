<?php 
session_start();
require('model.php'); 
?>
<header>
    <a href="index.php"><img src="logo.png"></a>
	<div class="topnav">
	
	    <a class="active" href="index.php">Accueil</a>
	    <a href="#">Boutique</a>
	    <a href="pagecadeau.php">Les cadeaux</a>
		<?php
		if(isset($_SESSION['loggedin'])){
			if($_SESSION['loggedin'] && $_SESSION['loggedin'] == true){
				$user = $_SESSION['username'];
				
				//récupérer l'id du client
				$id_client = getClientFromLogin($_SESSION['username']);
				
				// afficher un message
				echo '<a href="profil_client.php?client_id='.$id_client['id_client'].'">Mon compte ('.$user.')</a>';
				echo '<a href="logout.php">Se déconnecter</a>';
			}
		} else {
			echo '<a href="login.php">Se connecter</a>';
		}
		?>
		
		
	</div>
</header>