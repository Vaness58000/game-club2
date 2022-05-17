<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=game_club', 'root', "Gladiator/89");
}catch(PDOException $e){
    die('Erreur connexion : '.$e->getMessage());
}