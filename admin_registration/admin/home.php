<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["pseudo"])){
		header("Location: login.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="../style.css" />
	</head>
	<body>
		<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['pseudo']; ?>!</h1>
		<p>C'est votre espace admin.</p>
		<a href="add_user.php">Ajout utilisateur</a> | 
		<a href="lister.php">Modifier ou supprimer produits</a> | 
		<a href="envoi_donnees.php">Ajout produits</a> | 
		<a href="../logout.php">Déconnexion</a>
		</ul>
		</div>
	</body>
</html>