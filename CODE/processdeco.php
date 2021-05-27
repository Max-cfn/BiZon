<?php
session_start();
$_SESSION['erreur']= "déconnexion réussie";
$_SESSION['username']=NULL;
header("Location:http://127.2.7.0/page_connexion.php");

?>