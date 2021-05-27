<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<?php
try{
    session_start();
    header("Content-Type: text/html;charset=utf-8");
    if(empty($_SESSION['username'])){
        header("Location:http://127.2.7.0/page_connexion.php");
    }
    $subject=(trim($_POST['subject']));
    $in_demande=(trim($_POST['in_demande']));
    

    if ($subject&&$in_demande)
    {
        //definition de la connexion a la bdd
        $userphp = 'root';  //id a utiliser pour phpmyadmin. (Celui par défaut)
        $pwdphp= '';        //mdp pour l'interface administrateur (par défaut c'est rien)
        //lancement de la connexion a notre base de données 
        $db = new PDO ('mysql:host=localhost; dbname=login', $userphp,$pwdphp); 
        $userpost = $_SESSION['username'];
        $postmail = $_SESSION['mail'];
        $insertdemande = $db-> prepare ("INSERT INTO table_demandes VALUES (NULL, :user , :sujet, :texte , NOW(), :mail)");
        $postwin= $insertdemande->execute(array(':user' => $userpost, ':sujet' => $subject, ':texte' => $in_demande, ':mail' => $postmail));
        echo $postwin;
        header("Location:http://127.2.7.0/post_demande.php");



    }

}

catch(PDOException $e) // ca veut dire qu'il y a eu une erreur dans le processus
{
  die('Erreur : ' . $e->getMessage()); // permet de récupérer le message d'erreur de php et de l'afficher 
}
?>