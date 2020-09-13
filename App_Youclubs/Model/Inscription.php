<?php 
include '../Model/DataBase.php';
include '../Includes/functions.php';

    $nom = $prenom = $email = $mdp = $Cmdp =  $nomERROR = $prenomERROR = $emailERROR =  $mdpERROR = $CmdpERROR ="";
    $Success ="";
    $isSuccess  =  true;

    
        if(isset($_POST['Inscription'])){

          $nom = checkInput($_POST['nom']);
          $prenom = checkInput($_POST['prenom']);
          $email  = checkInput($_POST['email']);
          $mdp = checkInput($_POST['mdp']);
          $hashedMdp = sha1($mdp);
          $Cmdp = checkInput($_POST['Cmdp']);
          $ChashedMdp = sha1($Cmdp);
          
          if(empty($nom)){
            $nomERROR = "Ce champ ne peut pas être vide";
            $isSuccess = false;
          }

          if(empty($prenom)){
            $prenomERROR = "Ce champ ne peut pas être vide";
            $isSuccess = false;
          }
         
          if(empty($email)){
           $emailERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
          }
          else{
            $stmt2 = $db->prepare("SELECT email_membre, email_club FROM membre , club WHERE email_club = ? OR email_membre = ? ");
            $stmt2->execute(array($email,$email));
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
             if($hashedMdp != $ChashedMdp)
             {
              $CmdpERROR = "Les mots de passe ne sont pas identiques !";
              $isSuccess = false;
             }
           }
         
          if($isSuccess){
              $status = false; 
              $stmt = $db->prepare("INSERT INTO membre ( nom_membre, prenom_membre ,email_membre, mdp_membre) VALUES (?, ?, ?, ?)");
              $stmt->execute(array($nom, $prenom, $email, $hashedMdp));

              $Success ="<br> <br> <div class='alert alert-success' role='alert'> Inscription effectuée avec succès ! </div>" .
              header('refresh:2;url=../View/Connexion.php');
          }
      
}

