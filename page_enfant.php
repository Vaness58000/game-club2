<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_page_console.css">
    <link rel="stylesheet" href="header_footer.css">
    <script src="https://kit.fontawesome.com/6baf9741f4.js"></script>
    <title>ENFANTS</title>
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
                $requete = $connexion->prepare("SELECT id, image, resume, image_pegi, nom FROM produits WHERE id_categories=1 ORDER BY RAND() LIMIT 9 ");
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
    <h3 class="mini_gamer"><span>Sélection mini-gamer</span></h3>
</div>
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
include 'footer.php';
?>
</body>
</html>

<!--<div class="item-1">
          <a href="page_jeux_description_enfant.php">
              <img src="img/switch3.jfif" alt="super_mario_3d">    </a>
              <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la Princesse Libella et ses sujets dans cette version retravaillée de Super Mario 3D World.</div>
                  
            </div>
        </div>
        <div class="item-2">
          <a href="#">
              <img  src="img/switch2.jfif" alt="mario_kart8">  </a>
              <div class="description">
                <div class="pegi"><img src="img/pegi3.jfif"></div>
                  <div class="text">Découvrez le plus grand Mario Kart jamais créé et jouez-y où vous voulez, quand vous voulez : Mario Kart 8 Deluxe, uniquement sur Nintendo Switch ! </div>
                  
            </div>
        </div>

        <div class="item-3">
          <a href="#">
              <img  src="img/siwtch5.jpg" alt="zelda"> </a>
              <div class="description">
                <div class="pegi"><img src="img/pegi12.png"></div>
                  <div class="text"> Plongez dans un monde de découverte, d'exploration et d'aventure dans The Legend of Zelda: Breath of the Wild, un nouveau jeu qui vient bouleverser la série à succès.</div>
                  
            </div>
        </div>

        <div class="item-4">
          <a href="#">
              <img src="img/switch9.jpg" alt="splatoon2">  </a>
              <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Réclamez votre territoire, où, quand et avec qui vous le souhaitez dans Splatoon 2, en exclusivité sur Nintendo Switch.</div>
                  
            </div>
        </div>

        <div class="item-5">
          <a href="#">
              <img src="img/marsupilami_secret_du_sarcophage.jpg" alt="marsoupilami">    </a>
              <div class="description">
                <div class="pegi"><img src="img/pegi7.png"></div>
                  <div class="text">Découvrez les Marsupilamis comme vous ne les avez jamais vu dans une aventure pleine de rebondissement ! </div>
                  
            </div>
        </div>  

        <div class="item-6">
          <a href="#">
              <img src="img/roblox.jfif" alt="roblox">          
            </a>
            <div class="description">
              <div class="pegi"><img src="img/pegi7.png"></div>
                <div class="text"> Roblox est l'univers virtuel ultime qui te permet de créer, de partager des expériences avec tes amis et d'être tout ce que tu peux imaginer.</div>
                
          </div>
        </div>

        <div class="item-7">
          <a href="#">
              <img src="img/switch6.jfif" alt="super_smash_bros">          
            </a>
            <div class="description">
              <div class="pegi"><img src="img/pegi12.png"></div>
                <div class="text">Retrouvez Mario, Donkey Kong, Link, Samus, Yoshi, Kirby, Fox, Pikachu et quatre autres personnages cachés et participez à des combats d'arène démentiels ! </div>
                
          </div>
        </div>

        <div class="item-8">
          <a href="#">
              <img src="img/playstation3.jfif" alt="kena">          
            </a>
            <div class="description">
              <div class="pegi"><img src="img/pegi12.png"></div>
                <div class="text"> Incarnez Kena et rassemblez une équipe de compagnons-esprits charmants appelés les Rots.</div>
                
          </div>
        </div>

        <div class="item-9">
          <a href="#">
              <img src="img/switch7.jpg" alt="luigi_mansion3">          
            </a>
            <div class="description">
              <div class="pegi"><img src="img/pegi7.png"></div>
                <div class="text">Le frère de Mario devra encore une fois faire face à ses plus grandes peurs pour secourir ses amis, toujours à l’intérieur d’un hôtel des plus effrayants.</div>
                
          </div>-->