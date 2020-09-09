<?php 
include '../Model/DataBase.php';
include '../Includes/functions.php';


  session_start();
    if( $_SESSION["admin"] == null){
       header("Location:../View/LoginTest.php");
    }else{
        $nom = $email = $mdp = $Cmdp = $id_club=  $nomERROR =  $emailERROR =  $mdpERROR = $CmdpERROR="";
        $Success ="";
        $isSuccess  =  true;

        $id_club = isset($_GET['id_club']) && is_numeric($_GET['id_club']) ? intval($_GET['id_club']) : 0;
  
        $stmt = $db->prepare("SELECT * FROM club WHERE id_club= ?");
        $stmt->execute(array($id_club));
        $rows = $stmt->fetch();


        if(isset($_POST['Modifier'])){
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
             $stmt = $db->prepare("SELECT nom_club FROM club WHERE nom_club = ? AND id_club != ?");
             $stmt->execute(array($nom, $id_club));
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
             $stmt2 = $db->prepare("SELECT email_club FROM club WHERE email_club = ? AND id_club != ? ");
             $stmt2->execute(array($email,$id_club));
             $row2 = $stmt2->fetchAll();
             if($row2 != null)
             {
               $emailERROR = "L'email existe déjà";
               $isSuccess = false;
             }
           }
 
           if(empty($hashedMdp)){
             $mdpERROR = "Ce champ ne peut pas être vide";
             $isSuccess = false;
            }
 
            if(empty($ChashedMdp)){
             $mdpERROR = "Ce champ ne peut pas être vide";
             $isSuccess = false;
            }
            else
            {
              if($hashedMdp != $ChashedMdp)
              {
               $CmdpERROR = "Les mots de passe ne sont pas identiques !";
               $isSuccess = false;
              }
            }
         
        if($isSuccess){
            $status = false; 
            $stmt2 = $db->prepare("UPDATE club set nom_club= ?, email_club = ?, mdp_club = ? WHERE id_club = ?");
            $stmt2->execute(array($nom, $email, $hashedMdp,$id_club));

            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Club bien modifié ! </div>" .
             header('refresh:2;url=../View/Dashboard.php');
        }
      }
}

