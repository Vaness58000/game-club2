<?php
// Initialiser la session
session_start();
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .body-bg {
        
        background-image: url("img/paysage.jpg");
        background-size: cover;
        
    }
</style>
</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
<header class="max-w-lg mx-auto">

</header>
<button class=" mx-5 px-5 bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 rounded shadow-lg hover:shadow-2xl transition duration-200" type="submit">
    <a href="index.php">Revenir à l'accueil</a>
</button>
<main class="bg-white-500 max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    
    <section>
        <h3 class="font-bold text-2xl text-white text-center">Bienvenue sur GAME CLUB</h3>
        <p class="text-white pt-2 text-center">Connecte-toi.</p>
    </section>

    <section class="mt-10">
        <form class="flex flex-col" method="POST" action="connexion_utilisateurs.php">
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                <input type="text" id="email" name="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-700 transition duration-500 px-3 pb-3 shadow-outline">
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-700 transition duration-500 px-3 pb-3">
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit" name="connecter">Connexion</button>
        </form>
    </section>
</main>

<div class="max-w-lg mx-auto text-center mt-12 mb-6">
    <p class="text-white">Pas de compte? <a href="formulaire_inscription.php" class="font-bold hover:underline">S'inscrire</a>.</p>
</div>

<footer class="max-w-lg mx-auto flex justify-center text-white">
    <a href="#" class="hover:underline">Contact</a>
    <span class="mx-3">•</span>
    <a href="#" class="hover:underline">Copyrigth droits réservés 2022</a>
</footer>
</body>
</html>