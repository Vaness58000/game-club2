<?php

//ouverture de la base de données
$objectPdo = new PDO ('mysql:host=localhost;dbname=game_club;charset=utf8','root','Gladiator/89');

$pdoStat = $objectPdo->prepare(' SELECT *, produits.image as modif_image FROM produits LEFT JOIN categories ON categories.id_categories=produits.id_categories LEFT JOIN pegi ON produits.image_pegi=pegi.Image  WHERE produits.id =:num');

//liaison du parametre nommé
$pdoStat->bindValue(':num',$_GET['numProduit'],PDO::PARAM_INT);

//execution de la requete
$executeIsOk = $pdoStat->execute();

//on récupère le produit
$produits = $pdoStat->fetch();
//var_dump($produits);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Modification de données</title>
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
    <form action="modifier.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="numProduit" value="<?= $_GET['numProduit'] ?>">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="nom" class="block text-sm font-medium text-gray-700"> Titre du jeu </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="nom" id="nom" value="<?= $produits['nom']; ?>"class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                </div>
              </div>
            </div>

            <div>
              <label for="resume" class="block text-sm font-medium text-gray-700"> Résumé </label>
              <div class="mt-1">
                <input id="resume" name="resume" value="<?= $produits['resume']; ?>" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">
              </div>
    
            </div>
            
            <div>
              <label for="description" class="block text-sm font-medium text-gray-700"> Description du jeu </label>
              <div class="mt-1">
                <input id="description" name="description" value="<?= $produits['description']; ?>" rows="3"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">
              </div>
            </div>
            <div>
              <label for="console" class="block text-sm font-medium text-gray-700"> Console </label>
              <div class="mt-1">
                <input id="console" name="console" value="<?= $produits['console']; ?>" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">
              </div>
            </div>
            <div>
              <label for="video" class="block text-sm font-medium text-gray-700"> Lien de la video </label>
              <div class="mt-1">
                <input id="video" name="video" value="<?= $produits['video']; ?>" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">
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
                  <?php    
                  if($produits['age']=="18"){
                    ?><input name="categorie" type="radio" value="18" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
                
                <?php
                  }else{
                    ?><input name="categorie" type="radio" value="18" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                
                    <?php
                  }
                  ?>
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="adultes" class="font-medium text-gray-700">Adulte 18 ans</label>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                  <?php    
                  if($produits['age']=="16"){
                    ?><input name="categorie" type="radio" value="16" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
                
                <?php
                  }else{
                    ?><input name="categorie" type="radio" value="16" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                
                    <?php
                  }
                  ?>
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="adultes" class="font-medium text-gray-700">A partir de 16 ans</label>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                
                  <?php    
                  if($produits['age']=="12"){
                    ?><input name="categorie" type="radio" value="12" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
                
                <?php
                  }else{
                    ?><input name="categorie" type="radio" value="12" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                
                    <?php
                  }
                  ?>
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="enfants" class="font-medium text-gray-700">A partir de 12 ans</label>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">

                  <?php    
                  if($produits['age']=="7"){
                    ?><input name="categorie" type="radio" value="7" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
                
                <?php
                  }else{
                    ?><input name="categorie" type="radio" value="7" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                
                    <?php
                  }
                  ?>
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="enfants" class="font-medium text-gray-700">A partir de 7 ans</label>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">

                  <?php    
                  if($produits['age']=="3"){
                    ?><input name="categorie" type="radio" value="3" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
                
                <?php
                  }else{
                    ?><input name="categorie" type="radio" value="3" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                
                    <?php
                  }
                  ?>
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="enfants" class="font-medium text-gray-700">A partir de 3 ans</label>
                  </div>
                </div>
                <div>
                <input type="file" id="file" name="produits" accept="image/png, image/jpeg, image/jfif, image/jpg" />
                <img id="add-img" src="../../img/<?= $produits['modif_image']; ?>" alt="ajouter une image" />
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