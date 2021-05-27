<?php
session_start();
try{      // cette boucle veut dire "essaye cette itération (le try), sinon si ca marche pas exécute l'autre (le catch en bas)"
    $userco=(trim($_POST['userco']));
    $pwdco=(trim($_POST['pwdco']));
    if($userco&&$pwdco){
      //definition de la connexion a la bdd
      $userphp = 'root';  //id a utiliser pour phpmyadmin. (Celui par défaut)
      $pwdphp= '';        //mdp pour l'interface administrateur (par défaut c'est rien)
      //lancement de la connexion a notre base de données 
      $db = new PDO ('mysql:host=localhost; dbname=login', $userphp,$pwdphp);
      $coresult = $db-> prepare ("SELECT * FROM username_code WHERE identifiant = '$userco' ");
      $valid = $coresult->execute();
      //$quest = "SELECT * FROM username_code WHERE identifiant = '$userco'";
      //$valid = $db -> query($quest);
      
        if ($row = $coresult->fetch(PDO::FETCH_ASSOC)){
          if (password_verify($pwdco,$row["mot de passe"]) && $row["identifiant"]==$userco){
          $txtverif="connexion réussie";
          $_SESSION ['username'] = $userco;
          $_SESSION ['mail']= $row['mail'];
          header("Location:http://127.2.7.0/accueil.php");
          exit();
          }
          else{
            $txtverif="utilisateur ou mot de passe incorrect";
            $_SESSION['erreur']=$txtverif;
            header("Location:http://127.2.7.0/page_connexion.php");
            echo $txtverif;
          }
        }
      else{
        $txtverif="echec de la connexion, veuillez réessayer";
        $_SESSION['erreur']=$txtverif;
        header("Location:http://127.2.7.0/page_connexion.php");
        echo $txtverif;
      }
      
    }
    else{
      $txtverif="veuillez remplir toutes les cases";
      $_SESSION['erreur']=$txtverif;
      header("Location:http://127.2.7.0/page_connexion.php");
    }
}   
catch(PDOException $e) // ca veut dire qu'il y a eu une erreur dans le processus
{
  die('Erreur : ' . $e->getMessage()); // permet de récupérer le message d'erreur de php et de l'afficher 
}
?>