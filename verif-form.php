
<?php
// Initialiser la session
session_start();
?>
<?php
try
{
 $bdd = new PDO("mysql:host=localhost;dbname=game_club", "root", "Gladiator/89");
 $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
  die("Une érreur a été trouvé : " . $e->getMessage());
}
$bdd->query("SET NAMES UTF8");

if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher")
{
 $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
 $terme = $_GET['terme'];
 $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
 $terme = strip_tags($terme); //pour supprimer les balises html dans la requête

 if (isset($terme))
 {
  $terme = strtolower($terme);
  $select_terme = $bdd->prepare("SELECT id FROM produits WHERE nom LIKE ? OR resume LIKE ?");
  $select_terme->execute(array("%".$terme."%", "%".$terme."%"));
  $jeux = $select_terme->fetchAll();
 }
 else
 {
  $message = "Vous devez entrer votre requete dans la barre de recherche";
 }
 if (isset($jeux[0])){
 header("Location:page_jeux_description.php?page=".$jeux[0]['id']);
}else{
 header("Location:recherche_non_aboutie.php");
  
}
}
?>
