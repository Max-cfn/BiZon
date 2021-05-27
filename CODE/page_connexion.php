<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page_connexion.css">
    <title>Bizon - connexion</title>
</head>
<body>

<img class="img" src="giphy2.gif">
<form action="processconnexion.php" method="POST" class="flex-container">
<div class="formulaire">
    <h1>Connexion</h1>
    <?php
    session_start();
    if(isset($_SESSION['erreur'])){
        $code_error=$_SESSION['erreur'];
        echo $code_error;
        $_SESSION['erreur']= NULL;
    }
    ?>
    <br> <!--afin de marquer une différence entre le message d'erreur et lepremier imput-->
    
    
    <input id="user" type="text" id="username" name="userco" placeholder="Identifiant" required class="flex-item ">
    <input id="mdp" type="password" id="password" name= "pwdco" placeholder="Mot de passe" required class="flex-item">
    <input type="submit" value="Connexion" id="connexion" class="button" >

</div>

</form>

<form action="inscription.php" method="post" >
<div >
    <input type="submit" value="Créer un compte" id="compte" class="button" title="Pas encore de compte? ">

</div>
</form>
</body>
</html>