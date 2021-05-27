<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css">
    <title>BiZon - Accueil</title>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['erreur']="veuillez vous connecter pour continuer";
    header("Location:http://127.2.7.0/page_connexion.php");
}
?>

    <!-- barre en haut du site -->
    <div class="container">
        <header class="header">
            <a href="accueil.php" class="brand">BiZon</a>
            <ul class="nav">
                <li class="active"><a href="accueil.php">Accueil</a></li>
                <li><a href="compte.php">Mon compte</a></li>
                <li><a href="processdeco.php">Déconnexion</a></li>
            </ul>
        </header>
        <img class="img" src="giphy.gif">
    
    <fieldset class="flex-container">
        <div>
            <?php

            //definition de la connexion a la bdd
            $userphp = 'root';  //id a utiliser pour phpmyadmin. (Celui par défaut)
            $pwdphp= '';        //mdp pour l'interface administrateur (par défaut c'est rien)
            //lancement de la connexion a notre base de données 
            $db = new PDO ('mysql:host=localhost; dbname=login', $userphp,$pwdphp); 
            $recupdemande = $db -> prepare("SELECT * FROM table_demandes ORDER BY horaire DESC");
            
            $recupdemande -> execute();
            
            //$row = $recupdemande->fetch(PDO::FETCH_ASSOC);
            
            while($row = $recupdemande->fetch(PDO::FETCH_ASSOC))
            {
            ?>
            <p class="idheure"><?php echo htmlspecialchars($row['identifiant'])?>, le <?php echo $row['horaire']?></p>
            <p class="sujet"> Sujet : <?php echo $row['sujet']?><p>
            <p class="voicidemande"> Voici sa demande : </p>
            <p class="lademande"> <?php echo $row['text']?><p>
            <p class="lecontact"> Contact : <a href="mailto:<?php $row['mail']?>"><?php echo $row['mail']?></a><p>
            <p>________________________________________________________________________________________</p>
            <?php
            }
            ?>
            
        </div>

    </fieldset>
    <form action="post_demande.php" method="post" >
            <div><input  type="submit" value="Postez votre demande ! " name="submit" class="button" ></div>
            </form>
            

</body>

</html>
