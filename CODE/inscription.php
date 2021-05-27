<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page_inscription.css">
    <title>BiZon - Inscription</title>
</head>
<body>    

    <header>
    <img class="img" src="giphy3.gif">
        
        <form action="processinscription.php" method="POST" >
            <fieldset class="flex-box">
            <div class="formulaire">
                <h1>Inscription</h1>

                <?php  // CE PHP NOUS PERMET D'AFFICHER LES MESSAGES D'ERREUR
                session_start();
                if(isset($_SESSION['erreur'])){
                    $code_error=$_SESSION['erreur'];
                    echo $code_error;
                    $_SESSION['erreur']= NULL;
                }
                ?>
                <input type="text" id="identifiant" name="username" placeholder="Identifiant" required class="flex-item ">
                <input type="email" id="email" name="mail" placeholder="E-mail" required class="flex-item">
                <input type="password" id="password" name="pwd1" placeholder="Mot de passe" required class="flex-item">
                <div id="consigne"></div>
                <input type="password" id="password2" name="pwd2" placeholder="Veuillez confirmer le mot de passe" required class="flex-item">
            </fieldset>
                <div><input  type="submit" value="Créer un compte" name="submit" class="button" ></div>
            </div>


        </form>
        <img class="img" src="giphy3.gif">

    </header>
</body>
</html>
