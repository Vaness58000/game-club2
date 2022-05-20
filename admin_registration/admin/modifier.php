<?php

//ouverture de la base de données
$objectPdo = new PDO ('mysql:host=localhost;dbname=game_club;charset=utf8','root','Gladiator/89');

$pdoStat = $objectPdo->prepare(' UPDATE produits SET nom=:nom, resume=:resume, description=:description, console=:console, video=:video, id_categories=:id_categories WHERE id =:num');

//liaison du parametre nommé

$pdoStat->bindValue(':num', $_POST['numProduit']);
$pdoStat->bindValue(':nom', $_POST['nom']);
$pdoStat->bindValue(':resume', $_POST['resume']);
$pdoStat->bindValue(':description', $_POST['description']);
$pdoStat->bindValue(':console', $_POST['console']);
$pdoStat->bindValue(':video', $_POST['video']);
$pdoStat->bindValue(':id_categories', $_POST['categorie']);


//execution de la requete
$executeIsOk = $pdoStat->execute();
var_dump ($_POST);
$name_image = "";
    if(!empty($_FILES['produits']['name'])){
      $tmpName = $_FILES['produits']['tmp_name'];
      $name = $_FILES['produits']['name'];
      $size = $_FILES['produits']['size'];
      $error = $_FILES['produits']['error'];
  
      $tabExtension = explode('.', $name);
      $extension = strtolower(end($tabExtension));
  
      $extensions = ['jpg', 'png', 'jpeg', 'gif', 'jfif'];
      $maxSize = 400000;

      if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
  
          $uniqueName = uniqid('', true);
          //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
          $name_image = $uniqueName.".".$extension;
          //$file = 5f586bf96dcd38.73540086.jpg
  
          move_uploaded_file($tmpName, '../../img/'.$name_image);

          $pdoStat = $objectPdo->prepare(' UPDATE produits SET image=:image WHERE id =:num');

//liaison du parametre nommé

    $pdoStat->bindValue(':num', $_POST['numProduit']);
    $pdoStat->bindValue(':image', $name_image);


//execution de la requete
$executeIsOk = $pdoStat->execute();
  
          //$req = $db->prepare('INSERT INTO produits (image) VALUES (?)');
          //$req->execute([$produits]);
  
          echo "Image enregistrée";
      }
      else{
          echo "Une erreur est survenue";
      }
  }

if($executeIsOk){
  $message = 'le produit a été mis à jour';
}
else{
  $message = "echec de la modification du produit";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modification</title>
</head>
<body>
  <h1> resultat de la modification</h1>

  <p><?= $message ?></p>
</body>
</html>
