<?php
	session_start();
	require_once 'connexion_bdd.php';
 
	if(ISSET($_POST['inscription'])){
		if($_POST['pseudo'] != "" || $_POST['email'] != "" || $_POST['mdp'] != ""){
			try{
				$pseudo = $_POST['pseudo'];
				$email = $_POST['email'];
				$mdp = $_POST['mdp'];
				$requete = "INSERT INTO utilisateurs (pseudo, email, mdp) VALUES ('$pseudo', '$email', '".hash('sha256', $mdp)."')";
				$connexion->exec($requete);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			$connexion = null;
			header('location:test_connexion2.php');
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'registration.php'</script>
			";
		}
	}
?>