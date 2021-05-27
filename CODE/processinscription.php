<?php
session_start();
try{      // cette boucle veut dire "essaye cette itération (le try), sinon si ca marche pas exécute l'autre (le catch en bas)"
  $username=htmlentities(trim($_POST['username']));
  $pwd1=htmlentities(trim($_POST['pwd1']));
  $pwd2=htmlentities(trim($_POST['pwd2']));
  $mail=htmlentities(trim($_POST['mail']));
  if($username&&$pwd1&&$pwd2&&$mail)
	{
		if($pwd1==$pwd2)
		{
      //hachage des mots de passe (pour la sécurité). md5 et pas ouf, voir pour une autre fonction de hachage a l'avenir
      $pwd1 = password_hash($pwd1, PASSWORD_DEFAULT);

      //definition de la connexion a la bdd
      $userphp = 'root';  //id a utiliser pour phpmyadmin. (Celui par défaut)
      $pwdphp= '';        //mdp pour l'interface administrateur (par défaut c'est rien)
      //lancement de la connexion a notre base de données 
      $db = new PDO ('mysql:host=localhost; dbname=login', $userphp,$pwdphp); 
      
      $verifuserexists = $db-> prepare ("SELECT * FROM username_code WHERE identifiant = '$username' ");
      $verifmailexists = $db-> prepare ("SELECT * FROM username_code WHERE mail = '$mail' ");
      $valid1 = $verifuserexists->execute();
      $valid2 = $verifmailexists->execute();
      if ($row = $verifuserexists->fetch(PDO::FETCH_ASSOC) || $row2 = $verifmailexists->fetch(PDO::FETCH_ASSOC)){
        $verif="Email ou identifiant déjà utilisé";
        $_SESSION['erreur']=$verif;
        header("Location:http://127.2.7.0/inscription.php");
      }
      else{
      
        //preparation requete d'insertion
        $insertresult = $db-> prepare('INSERT INTO username_code VALUES (NULL, :user, :pwd, :mail)');
        // assignement des différentes valeurs a insérer
        $insertresult->bindValue(':user', $username, PDO::PARAM_STR);
        $insertresult->bindValue(':pwd', $pwd1, PDO::PARAM_STR);
        $insertresult->bindValue(':mail', $mail, PDO::PARAM_STR);
        //EXECUTION
        $exec = $insertresult->execute();
        //verification que l'insertion a  bien été faite
        //on va assigner le résultat dans une valeur histoire qu'on puisse l'afficher sur une autre page, et aussi parce que si on met "echo", on pourra pas redigirer avec le header qui suit
        if ($exec){         //on vérifie; si c'est true, c'est que l'inscription dans la bdd a bien été faite
          $verif="inscription réussie";
          // header("location  nous permet de rediriger l'utilisateur vers une certaine page sans qu'il n'ait a appuyer quelque part
          
          $_SESSION ['username'] = $username;
          $_SESSION ['mail'] = $mail;
          header("Location:http://127.2.7.0/accueil.php");
        }
        else{               // ducoup sinon non
          $verif="echec de l'inscription";
          $_SESSION['erreur']=$verif;
          header("Location:http://127.2.7.0/inscription.php");
        }
      }
    }
    else{
      $verif="mots de passe différents, veuillez réessayer";
      $_SESSION['erreur']=$verif;
      header("Location:http://127.2.7.0/inscription.php");    // on le renvoie a la page de connexion parce qu'il a eu 2 mots de passe différents
      }
    }
  }     
catch(PDOException $e) // ca veut dire qu'il y a eu une erreur dans le processus
{
  die('Erreur : ' . $e->getMessage()); // permet de récupérer le message d'erreur de php et de l'afficher 
}
?>