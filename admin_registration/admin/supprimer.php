<?php

//ouverture de la base de données
$objectPdo = new PDO ('mysql:host=localhost;dbname=game_club;charset=utf8','root','Gladiator/89');

//préparation de la requête 
$pdoStat = $objectPdo->prepare('DELETE FROM produits WHERE id=:num LIMIT 1');

//liaison du parametre nommé
$pdoStat->bindValue(':num', $_GET['numProduit'], PDO::PARAM_INT);

//execution de la requete
$executeIsOk = $pdoStat->execute();

if($executeIsOk){
    $message = 'le produit a été supprimé';
}
else{
    $message = "echec de la suppression du produit";
}
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
    <h1>Supression</h1>
    <p><?= $message ?></p>
</body>
</html>



