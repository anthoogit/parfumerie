<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Se connecter</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>

<body>
<?php require('header.php'); ?>

<div id="bloc_page">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
				<h1 class="titre_principal"><span>Se connecter</span></h1>
                
                <label><b>Nom d'utilisateur</b></label><br/>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required><br/>

                <label><b>Mot de passe</b></label><br/>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required><br/>

                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>

<?php require('footer.php'); ?>
</body>
</html>
