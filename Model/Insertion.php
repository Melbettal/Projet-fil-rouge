<?php 
include '../Model/DataBase.php';

    $id_event    = $nom = $photo = $description = $date  = $nomERROR = $dateERROR = $photoERROR  = $descriptionERROR = "";
    $isSuccess  = $status =  true;
    $Success ="";

    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;   
    }

    session_start();
    if( $_SESSION["club"] == null){
       header("Location:../View/LoginTest.php");
    }else{
        if(isset($_POST['Ajouter'])){
          $nom = checkInput($_POST['nom']);
          $date  = checkInput($_POST['date']);
          $photo = checkInput($_FILES['photo']['name']);
          $description = checkInput($_POST['description']);
          $target = "../Includes/Images/". $_SESSION['id_club']."/".basename($photo);
          $imageExtension  = pathinfo($target,PATHINFO_EXTENSION);
          if(empty($nom)){
           $nomERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
          }
          if(empty($date)){
           $dateERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
          }
          if(empty($photo)){
           $photoERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
          }
          if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif"){
              $photoERROR = "Les fichiers autorisés sont : .jpg, .jpng , .png , .gif";
              $isSuccess = false;   
          }
          if($_FILES["photo"]["size"] > 1000000){ 
              $photoERROR = "Le fichier ne doit pas dépasser le 500KB";
              $isSuccess = false;
          }

          if(empty($description)){
           $descriptionERROR = "Ce champ ne peut pas être vide";
           $isSuccess = false;
          }
         
        if($isSuccess){
            $status = false;
            move_uploaded_file($_FILES['photo']['tmp_name'],$target);  
            $stmt = $db->prepare("INSERT INTO evenement ( nom_event, date_event, photo_event, description_event, id_club) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute(array($nom, $date, $photo,$description,$_SESSION['id_club'] ));

            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Evénement bien ajouté ! </div>" .
             header('refresh:2;url=../View/Gestion_event.php');
        }
      }
}

?>
