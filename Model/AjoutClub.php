<?php 
include '../Model/DataBase.php';
include '../Includes/functions.php';

    $nom = $email = $mdp =  $nomERROR =  $emailERROR =  $mdpERROR ="";
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

          
          if(empty($nom)){
           $nomERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
          }
          if(empty($email)){
           $emailERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
          }
          if(empty($hashedMdp)){
           $mdpERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
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

