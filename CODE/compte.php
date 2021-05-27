<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="compte.css">
    <title>BiZon - Mon compte</title>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['erreur']="veuillez vous connecter pour continuer";
    header("Location:http://127.2.7.0/page_connexion.php");
}
?>
    <div class="container">
        <header class="header">
            <a href="accueil.php" class="brand">BiZon</a>
            <ul class="nav">
                <li class="active"><a href="accueil.php">Accueil</a></li>
                <li><a href="compte.php">Mon compte</a></li>
                <li><a href="processdeco.php">Déconnexion</a></li>
            </ul>
        </header>

        <img class="img" src="giphy4.gif">
        
   
        <fieldset class="flex-container">
            <div class="formulaire">
             <legend>Mon identifiant : <?php echo $_SESSION['username']?></legend>
             <legend>Mon adresse mail : <?php echo $_SESSION['mail']?></legend>
                            
            </div>  
                
            </fieldset>
            <form action="post_demande.php" method="POST" >
            <div><input  type="submit" value="Vous voulez postez une demande ? " name="submit" class="button" ></div>
            </form>
            <p id="explication"> Voici une video explicative des fonctionnalités de notre site :)</p>
            <iframe src="https://spark.adobe.com/video/pk3TX76HUTVks/embed" width="800" height="450" frameborder="0" allowfullscreen></iframe>
    
</body>
</html>