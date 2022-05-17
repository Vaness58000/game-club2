<?php
    $serveur = "localhost";
    $dbname = "game_club";
    $user = "root";
    $pass = "Gladiator/89";
    $name_image = "";
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
          $name_image = $uniqueName.".".$extension;
          //$file = 5f586bf96dcd38.73540086.jpg
  
          move_uploaded_file($tmpName, '../../img/'.$name_image);
  
          //$req = $db->prepare('INSERT INTO produits (image) VALUES (?)');
          //$req->execute([$produits]);
  
          echo "Image enregistrée";
      }
      else{
          echo "Une erreur est survenue";
      }
  }
  if(isset($_POST['categorie'])){
    try{

        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname; charset=utf8",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $dbco->prepare("
            SELECT id_categories,image FROM pegi WHERE age=?");

            $sth->execute([$_POST['categorie']]);
            $pegi_categorie=$sth->fetch();
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO produits(nom,resume,description,id_categories,image,image_pegi,console)
            VALUES(:nom,:resume,:description,:id_categories,:image,:image_pegi,:console)");
        $sth->bindParam(':nom',$_POST['nom']);
        $sth->bindParam(':resume',$_POST['resume']);
        $sth->bindParam(':description',$_POST['description']);
        $sth->bindParam(':id_categories',$pegi_categorie['id_categories']);
        $sth->bindParam(':image', $name_image);
        $sth->bindParam(':image_pegi',$pegi_categorie['image']);
        $sth->bindParam(':console',$_POST['console']);
        $sth->execute();

        function valid_donnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
        $nom = valid_donnees($_POST["nom"]);
        $resume = valid_donnees($_POST["resume"]);
        $description = valid_donnees($_POST["description"]);
        $id_categories = valid_donnees($_POST["id_categories"]);
        $image = valid_donnees($_POST["image"]);
        $image_pegi = valid_donnees($_POST["image_pegi"]);
        $console = valid_donnees($_POST["console"]);
        
    }
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:./envoi_donnees.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Envoi de données</title>
</head>
<body>
  <style>
    input[type="file"] {
    display: none;
}</style>
</body>
</html>

<div>
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Articles jeux vidéos</h3>
        <p class="mt-1 text-sm text-gray-600">Ces informations seront affichées publiquement, alors faites attention à ce que vous partagez.</p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
    <form action="./envoi_donnees.php" method="POST" enctype="multipart/form-data">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="nom" class="block text-sm font-medium text-gray-700"> Titre du jeu </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="nom" id="nom" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="super mario 3d">
                </div>
              </div>
            </div>

            <div>
              <label for="resume" class="block text-sm font-medium text-gray-700"> Résumé </label>
              <div class="mt-1">
                <textarea id="resume" name="resume" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la"></textarea>
              </div>
    
            </div>
            
            <div>
              <label for="description" class="block text-sm font-medium text-gray-700"> Description du jeu </label>
              <div class="mt-1">
                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la"></textarea>
              </div>
            </div>
            <div>
              <label for="console" class="block text-sm font-medium text-gray-700"> Console </label>
              <div class="mt-1">
                <textarea id="console" name="console" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="xbox, playstation, switch, pc"></textarea>
              </div>
    
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
    
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            

            <fieldset>
              <legend class="sr-only">Type de public IMAGE JEU</legend>
              <div class="text-base font-medium text-gray-900" aria-hidden="true">Type de public IMAGE JEU</div>
              <div class="mt-4 space-y-4">
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input name="categorie" type="radio" value="18" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="adultes" class="font-medium text-gray-700">Adulte 18 ans</label>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input name="categorie" type="radio" value="16" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="adultes" class="font-medium text-gray-700">A partir de 16 ans</label>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input name="categorie" type="radio" value="12" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="enfants" class="font-medium text-gray-700">A partir de 12 ans</label>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input name="categorie" type="radio" value="7" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="enfants" class="font-medium text-gray-700">A partir de 7 ans</label>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input name="categorie" type="radio" value="3" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="enfants" class="font-medium text-gray-700">A partir de 3 ans</label>
                  </div>
                </div>
                <div>
                <input type="file" id="file" name="produits" accept="image/png, image/jpeg, image/jfif, image/jpg" />
                <img id="add-img" src="./icons8-ajouter-une-image-90.png" alt="ajouter une image" />
            </div>
            
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Enregistrer</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="image.js"></script>
</body>
</html>

<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
