<?php
    include '../Model/DataBase.php';
    include '../Includes/functions.php';
    
    session_start();
    if( $_SESSION["membre"] == null){
    header("Location:../View/LoginTest.php");
    
    }else{
        $stmt = $db->prepare("SELECT * FROM membre where id_membre = ?");
        $stmt->execute(array($_SESSION['id_membre']));
        $row = $stmt->fetch();


        $email = $mdp = $Cmdp = $emailERROR =  $mdpERROR = $CmdpERROR="";
        $Success ="";
        $isSuccess  =  true;

        if(isset($_POST['Modifier'])){
            $email  = checkInput($_POST['email']);
            $mdp = checkInput($_POST['mdp']);
            $hashedMdp = sha1($mdp);
            $Cmdp = checkInput($_POST['Cmdp']);
            $ChashedMdp = sha1($Cmdp);
  
   
             if(empty($email)){
              $emailERROR = "Ce champ ne peut pas être vide";
              $isSuccess = false;
             }
             else{
               $stmt2 = $db->prepare("SELECT email_membre FROM membre WHERE email_membre = ? AND id_membre != ? ");
               $stmt2->execute(array($email,$_SESSION['id_membre']));
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
               $CmdpERROR = "Ce champ ne peut pas être vide";
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
              $stmt2 = $db->prepare("UPDATE membre set email_membre = ?, mdp_membre = ? WHERE id_membre = ?");
              $stmt2->execute(array($email, $hashedMdp,$_SESSION['id_membre']));
  
              $Success ="<br> <br> <div class='alert alert-success' role='alert'> Informations bien modifiées ! </div>" .
               header('refresh:2;url=../View/Profil.php');
          }
        }
        
    }