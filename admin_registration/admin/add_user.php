<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
require('../config.php');

if (isset($_REQUEST['pseudo'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['mdp'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$pseudo = stripslashes($_REQUEST['pseudo']);
	$pseudo = mysqli_real_escape_string($connexion, $pseudo); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($connexion, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$mdp = stripslashes($_REQUEST['mdp']);
	$mdp = mysqli_real_escape_string($connexion, $mdp);
	// récupérer le type (user | admin)
	$type = stripslashes($_REQUEST['type']);
	$type = mysqli_real_escape_string($connexion, $type);
	
    $query = "INSERT into `utilisateurs` (pseudo, email, type, mdp)
				  VALUES ('$pseudo', '$email', '$type', '".hash('sha256', $mdp)."')";
    $res = mysqli_query($connexion, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
    }
}else{
?>
<form class="box" action="#" method="post">
	<h1 class="box-logo box-title"><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1>
    <h1 class="box-title">Ajouter utilisateur</h1>
	<input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
	<div class="input-group">
			<select class="box-input" name="type" id="type" >
				<option value="" disabled selected>Type</option>
				<option value="admin">Administreur</option>
				<option value="user">Utilisateur</option>
			</select>
	</div>
    <input type="password" class="box-input" name="mdp" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
<?php } ?>
</body>
</html>