<?php
//ouverture de la base de données
$objectPdo = new PDO ('mysql:host=localhost;dbname=game_club;charset=utf8','root','Gladiator/89');

//préparation de la requête 
$pdoStat = $objectPdo->prepare(' SELECT * FROM produits');
//execution de la requête
$executeIsOk = $pdoStat->execute();
//récupération des résultats en une seule fois
$produit = $pdoStat->fetchAll();
//var_dump($produit);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>liste des produits</h1>
    <ol>
        <?php foreach($produit as $produits): ?>
            
            <li>
               <?= $produits ['nom'] ?> <?= $produits ['console'] ?> - <?= $produits ['resume'] ?> -<?= $produits ['description'] ?>
                <br>
               <a href="supprimer.php?numProduit=<?= $produits['id'] ?>">Supprimer</a>
               <a href="form_modification.php?numProduit=<?= $produits['id'] ?>">Modifier</a>
            
            
            </li>


        <?php endforeach; ?>

    </ol>


</body>
</html>
