<?php 
include '../Model/DataBase.php';
include '../Includes/functions.php';

    $nom = $email = $mdp = $Cmdp =  $nomERROR =  $emailERROR =  $mdpERROR = $CmdpERROR ="";
    $Success ="";
    $isSuccess  =  true;

    
    session_start();
    if( $_SESSION["admin"] == null){
       header("Location:../View/LoginTest.php");
    }else{
        if(isset($_POST['Ajouter'])){

          $nom = checkInput($_POST['nom']);
          $email  = checkInput($_POST['email']);
          $mdp = checkInput($_POST['mdp']);
          $hashedMdp = sha1($mdp);
          $Cmdp = checkInput($_POST['Cmdp']);
          $ChashedMdp = sha1($Cmdp);
          
          if(empty($nom)){
           $nomERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
          }
          else{
            $stmt = $db->prepare("SELECT nom_club FROM club WHERE nom_club = ? ");
            $stmt->execute(array($nom));
            $row = $stmt->fetchAll();
            if($row != null)
            {
              $nomERROR = "Le nom existe déjà";
              $isSuccess = false;
            }
          }

          if(empty($email)){
           $emailERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
          }
          else{
            $stmt2 = $db->prepare("SELECT email_club FROM club WHERE email_club = ? ");
            $stmt2->execute(array($email));
            $row2 = $stmt2->fetchAll();
            if($row2 != null)
            {
              $emailERROR = "L'email existe déjà";
              $isSuccess = false;
            }
          }

          if(empty($mdp)){
            $mdpERROR = "Ce champ ne peut pas être vide";
            $isSuccess = false;
           }

           if(empty($Cmdp)){
            $mdpERROR = "Ce champ ne peut pas être vide";
            $isSuccess = false;
           }
           else
           {
             if($mdp != $Cmdp)
             {
              $CmdpERROR = "Les mots de passe ne sont pas identiques !";
              $isSuccess = false;
             }
           }
         
          if($isSuccess){
              $status = false; 
              $stmt = $db->prepare("INSERT INTO club ( nom_club, email_club, mdp_club) VALUES (?, ?, ?)");
              $stmt->execute(array($nom, $email, $hashedMdp));

              $Success ="<br> <br> <div class='alert alert-success' role='alert'> Club bien ajouté ! </div>" .
              header('refresh:2;url=../View/Dashboard.php');
          }
      }
}

