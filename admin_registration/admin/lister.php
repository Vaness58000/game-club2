<?php
//ouverture de la base de données
$objectPdo = new PDO ('mysql:host=localhost;dbname=game_club;charset=utf8','root','root');

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

    <link rel="stylesheet" href="interface_admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   	<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
   	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


<!------ Include the above in your HEAD tag ---------->
</head>

    <section>
    <form>
    <table class="table table-striped table-dark">
        <thead>
            <th>Nom</th>
            <th>Console</th>
            <th>Description</th>
            <th>Image</th>
            <th>Résume</th>
            <th>Pegi</th>
            <th>Lien vidéo</th>
            <th></th>
            <th></th>
            
        </thead>
        <tbody>
        
            <?php foreach($produit as $produits){ ?>
            
                <tr>
                    <td scope="row"><?= $produits ['nom'] ?>
                    </td> 
                    <td scope="row"><?= $produits ['console'] ?></td>
                    <td scope="row"><?= $produits["description"] ?></td>  
                    <td scope="row"><img src="../../img/<?= utf8_encode($produits["image"]) ?>" style="width:100%; height: auto;"></td> 
                    <td scope="row"><?= $produits ['resume'] ?></td>
                    <td scope="row"><img src="../../img/<?= $produits ['image_pegi'] ?>" style="width:60%; height: auto;">
                    
                    </td>
                    <td scope="row"><button><a href="form_modification.php?numProduit=<?= $produits['id'] ?>">Modifier</a></button></td>
                    <td scope="row"><button><a href="supprimer.php?numProduit=<?= $produits['id'] ?>">Supprimer</a></button></td>
                    <!--sert à pouvoir supprimer une entrée grâce à l'id-->
                </tr>
        

                
            <?php
            }    
            ?>
        </tbody>
    </table>
    </form>
    </section>




</body>
</html>
