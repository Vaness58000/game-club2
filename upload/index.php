
<?php

require './bdd.php';

if(isset($_FILES['produits'])){
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
        $produits = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg

        move_uploaded_file($tmpName, '../img/'.$produits);

        $req = $db->prepare('INSERT INTO produits (image) VALUES (?)');
        $req->execute([$produits]);

        echo "Image enregistrée";
    }
    else{
        echo "Une erreur est survenue";
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

    </head>
<body>
    <h2>Ajouter une image</h2>
    <form action="index.php" method="POST" enctype="multipart/form-data">
    
        <label for="produits">Fichier</label>
        <input type="file" name="produits">

        <button type="submit">Enregistrer</button>
    </form>
    <h2>Mes images</h2>
    <?php 
        $req = $db->query('SELECT image FROM produits');
        while($data = $req->fetch()){
            echo "<img src='../img/".$data['image']."' width='200px' ><br>";
        }
    ?>
</body>
</html>