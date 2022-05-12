<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Envoi de données</h1>  
        <?php
            $servername = 'localhost';
            $username = 'root';
            $dbname= 'game_club';
            $password = 'Gladiator/89';

            try{
                $connexion = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $requete = $connexion->prepare("
                INSERT INTO utilisateurs(pseudo, email, mdp)
                VALUES(:pseudo, :email, :mdp)");
            $requete->bindParam(':pseudo',$_POST['pseudo']);
            $requete->bindParam(':email',$_POST['email']);
            $requete->bindParam(':mdp',$_POST['mdp']);
            $requete->execute();
           
            function valid_donnees($donnees){
                
                $donnees=trim($donnees);/*permet d'espacer les mots*/
                $donnees = stripslashes($donnees);
                $donnees = htmlspecialchars($donnees);
                return $donnees;

            $pseudo = valid_donnees($_POST["pseudo"]);
            $email = valid_donnees($_POST["email"]);
            $mdp = valid_donnees($_POST["mdp"]);
            };
                
        }
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
            //on ferme la connexion
            $connexion = null;
        ?>
    </body>
</html>