<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="demande.css">
    <title>BiZon - Postez votre demande</title>
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

    <img class="img" src="giphy1.gif">
    <form action="processpostdemande.php" method="POST" >
      
      <div class="formulaire">
      <fieldset class="flex-container">
              <h1>Poster une demande</h1>
              <div class="demande">Quel est le sujet de votre demande ? </div>          
              <input type="text" id="sujet" name="subject" maxlength="40" placeholder="De quoi voulez vous parler ?" required class="flex-item">

              <div class="inputdemande">Veuillez décrire votre demande :</div>
              <textarea name="in_demande" rows="10" cols="50" minlength="1" maxlength="400" id="inputdemande" required class="flex-item"  placeholder="Vous pouvez écrire ici."></textarea>
              </fieldset> 
              <div><input  type="submit" value="Postez votre demande ! " name="submit" class="button" ></div>
      </div>
     
      </form>
    
  
</body>
</html>