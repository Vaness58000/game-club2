<?php
// Initialiser la session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_page_console.css">
    <link rel="stylesheet" href="header_footer.css">
    <script src="https://kit.fontawesome.com/6baf9741f4.js"></script>
    <title>ADULTES</title>
</head>
<?php
include 'header.php'
?>
<?php
            $servname = "localhost"; $dbname = "game_club"; $user = "root"; $pass = "Gladiator/89";
            
            try{
                $connexion = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                /*Sélectionne les valeurs dans les colonnes nom, descriptif et images de la table
                 *users pour chaque entrée de la table*/
                $requete = $connexion->prepare("SELECT id, image, resume, image_pegi, nom FROM produits WHERE id_categories=2 ORDER BY RAND() LIMIT 9 ");
                $requete->execute();
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $produits = $requete->fetchAll(PDO::FETCH_ASSOC);
                
            }  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }      
?>
<body>
<main>
  <div id='center' class="main center">
    <h3 class="adulte"><span>Sélection du moment <br>réservé aux adultes</span></h3>
    <div class="grid2">
<?php 
$i=1; 
foreach ($produits as $produit) {?>
<div class="item-<?php echo $i; ?>">
<a href="page_jeux_description.php?page=<?php echo $produit["id"]; ?>">
<img src="./img/<?php echo $produit["image"] ?>" alt="<?php echo $produit["nom"] ?>"></a>
<div class="description">
        <div class="pegi"><img src="./img/<?php echo $produit["image_pegi"] ?>"></div>
        <div class="text"><?php echo $produit["resume"] ?></div>
          
</div>
</div>
<?php
$i++;} 
?>
</div>
</div>
</main>
    <?php
include 'footer.php'
?>

</body>
</html>

<!--<div class="item-2">
  <a href="page_jeux_description_adulte.php">
      <img  src="img/xbox2.jpg" alt="horizon2">  </a>
      <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la Princesse Libella et ses sujets dans cette version retravaillée de Super Mario 3D World.</div>
                  
            </div>
</div>

<div class="item-3">
  <a href="#">
      <img  src="img/pc9.jfif" alt="league_of_legends"> </a>
      <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la Princesse Libella et ses sujets dans cette version retravaillée de Super Mario 3D World.</div>
                  
            </div>
</div>

<div class="item-4">
  <a href="#">
      <img src="img/xbox8.jpg" alt="ark2">  </a>
      <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la Princesse Libella et ses sujets dans cette version retravaillée de Super Mario 3D World.</div>
                  
            </div>
</div>

<div class="item-5">
  <a href="#">
      <img src="img/pc3.jfif" alt="starcraft2">    </a>
      <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la Princesse Libella et ses sujets dans cette version retravaillée de Super Mario 3D World.</div>
                  
            </div>
</div>  

<div class="item-6">
  <a href="#">
      <img src="img/playstation1.png" alt="returnal">          
    </a>
    <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la Princesse Libella et ses sujets dans cette version retravaillée de Super Mario 3D World.</div>
                  
            </div>
</div>

<div class="item-7">
  <a href="#">
      <img src="img/xbox7.jfif" alt="senua_s_saga_hellblade2">          
    </a>
    <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la Princesse Libella et ses sujets dans cette version retravaillée de Super Mario 3D World.</div>
                  
            </div>
</div>

<div class="item-8">
  <a href="#">
      <img src="img/pc1.jpg" alt="escape_from_tarkov">          
    </a>
    <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la Princesse Libella et ses sujets dans cette version retravaillée de Super Mario 3D World.</div>
                  
            </div>
</div>

<div class="item-9">
  <a href="#">
      <img src="img/playstation8.jfif" alt="ghostwire">          
    </a>
    <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la Princesse Libella et ses sujets dans cette version retravaillée de Super Mario 3D World.</div>
                  
            </div>-->
