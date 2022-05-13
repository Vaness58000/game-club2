
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
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
    <form action="./add_file.php" method="POST" enctype="multipart/form-data">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="company-website" class="block text-sm font-medium text-gray-700"> Titre du jeu </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="company-website" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="super mario 3d">
                </div>
              </div>
            </div>

            <div>
              <label for="about" class="block text-sm font-medium text-gray-700"> Résumé </label>
              <div class="mt-1">
                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la"></textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">Brève description du jeu.</p>
            </div>
            <div>
              <label for="about" class="block text-sm font-medium text-gray-700"> Description du jeu </label>
              <div class="mt-1">
                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Rejoignez Mario, Luigi, Peach et Toad, et partez à l'aventure pour sauver le royaume des Libellas dans Super Mario 3D World + Bowser’s Fury sur Nintendo Switch ! En solo ou avec jusqu'à trois autres joueurs, allez sauver la"></textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500"> Description du jeu</p>
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
                    <input id="adultes" name="categorie" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="adultes" class="font-medium text-gray-700">Adultes</label>
                    <p class="text-gray-500">A partir de 16 ans</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="enfants" name="categorie" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="enfants" class="font-medium text-gray-700">Enfants</label>
                    <p class="text-gray-500">Jusqu'à 12 ans</p>
                  </div>
                </div>
                <div>
                <input type="file" id="file" name="file" accept="image/png, image/jpeg, image/jfif, image/jpg" />
                <img id="add-img" src="./icons8-ajouter-une-image-90.png" alt="ajouter une image" />
            </div>
            <legend class="sr-only">Type de public PEGI</legend>
              <div class="text-base font-medium text-gray-900" aria-hidden="true">Type de public PEGI</div>
              <div class="mt-4 space-y-4">
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="adultes" name="categorie" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="adultes" class="font-medium text-gray-700">Adultes</label>
                    <p class="text-gray-500">A partir de 16 ans</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="enfants" name="categorie" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="enfants" class="font-medium text-gray-700">Enfants</label>
                    <p class="text-gray-500">Jusqu'à 12 ans</p>
                  </div>
                </div>
                <div>
                <input type="file" id="file" name="file" accept="image/png, image/jpeg, image/jfif, image/jpg" />
                <img id="add-img" src="./icons8-ajouter-une-image-90.png" alt="ajouter une image" />
            </div>
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
