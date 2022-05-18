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
    <link rel="stylesheet" href="style_page_jeux_description.css">
    <link rel="stylesheet" href="header_footer.css">
    <script src="https://kit.fontawesome.com/6baf9741f4.js"></script>
    <title>page jeux description</title>
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
                $requete = $connexion->prepare("SELECT id, console, id_categories, nom, description, image_pegi, image, video FROM produits WHERE id=:id");
                $requete->execute([
               ":id"=> $_GET['page'],
                ]);
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $produit = $requete->fetch(PDO::FETCH_ASSOC);
                
            }  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }      
?>
<?php
    $_GET['page'];
    ?>
<body>
    <main>
    <div class="categorie_page_jeu_enfant"><span><?php echo $produit["console"] ?></div>
    <div class=effet_3d_enfant><h1><?php echo $produit["nom"] ?></h1></div>
    <div class="grid_jeu_ind">

    
    
        <div class="item_jeu_image">
            <img src="./img/<?php echo $produit["image"] ?>" alt="<?php echo $produit["nom"] ?>">
        </div>

        <div class="item_jeu_description">
            <article>
            <?php echo $produit["description"] ?>   
            </article>
        </div>
       
        <div class="item_jeu_pegi">
            <img src="./img/<?php echo $produit["image_pegi"] ?>">
        </div>
    <div class="video">
            <button class="bouton_video"><a href="<?php echo $produit["video"] ?>" target="_blank">Voir teaser</a></button>
        </div>
        </div>
</main>
    <?php
include 'footer.php'
?>
</body>
</html>

