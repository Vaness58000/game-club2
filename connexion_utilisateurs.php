<?php
	session_start();
	require_once 'connexion_bdd.php';
	
	if(ISSET($_POST['connecter'])){
		if($_POST['email'] != "" || $_POST['mdp'] != ""){
			$email = $_POST['email'];
			$mdp = $_POST['mdp'];
			$requete = "SELECT * FROM `utilisateurs` WHERE `email`=? AND `mdp`=? ";
			$query = $connexion->prepare($requete);
			$query->execute(array($email,hash('sha256', $mdp)));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['id'];
				header("location: index.php");
			} else{
				echo "
				<script>alert('mail ou mot de passe invalide');</script>
				<script>window.location = 'test_connexion2.php';</script>
				";
			}
		}else{
			echo "
				<script>alert('Complétez le fichier d'inscription!');</script>
				<script>window.location = 'formulaire_inscription.php';</script>
			";
		}
	}
?>