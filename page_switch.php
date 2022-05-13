<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_page_console.css">
    <link rel="stylesheet" href="header_footer.css">
    <script src="https://kit.fontawesome.com/6baf9741f4.js"></script>
    <title>SWITCH</title>
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
                $requete = $connexion->prepare("SELECT id, image, resume, image_pegi, nom FROM produits WHERE console='switch' ORDER BY id DESC LIMIT 9 ");
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
<h3 class="switch"><span>SWITCH</span></h3>
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

<!-- <div class="item-1">
              <a href="#">
                  <img src="img/switch1.jpg" alt="pokemon_legend"></a>
            </div>

            <div class="item-2">
              <a href="#">
                  <img  src="img/switch2.jfif" alt="mario_kart">  </a>
            </div>

            <div class="item-3">
              <a href="page_enfant.php">
                  <img  src="img/switch3.jfif" alt="super_mario3d">  </a>
            </div>

            <div class="item-4">
              <a href="#">
                  <img src="img/switch4.jfif" alt="super_mario_odyssee">  </a>
            </div>

            <div class="item-5">
              <a href="#">
                  <img src="img/siwtch5.jpg " alt="zelda">    </a>
            </div>  

            <div class="item-6">
              <a href="#">
                  <img src="img/switch6.jfif" alt="super_smash_bros">          
                </a>
            </div>

            <div class="item-7">
              <a href="#">
                  <img src="img/switch7.jpg" alt="luigi">          
                </a>
            </div>

            <div class="item-8">
              <a href="#">
                  <img src="img/switch8.jpg" alt="kirby">          
                </a>
            </div>

            <div class="item-9">
              <a href="#">
                  <img src="img/switch9.jpg" alt="splatoon">          
                </a>
            </div>-->