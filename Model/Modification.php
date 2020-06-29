<?php
    include '../Model/DataBase.php';
    include '../Includes/functions.php';

    
    $id_event    = $nom = $photo = $description = $date  = $nomERROR = $dateERROR = $photoERROR  = $descriptionERROR = "";
    $isSuccess  = $status = $ChangeImage = true;
    $Success ="";
    $id_event = isset($_GET['id_event']) && is_numeric($_GET['id_event']) ? intval($_GET['id_event']) : 0;

    if( $_SESSION["club"] == null){
        header("Location:../View/LoginTest.php");
    }else{
        $stmt = $db->prepare("SELECT DATE_FORMAT(date_event, '%Y-%m-%dT%H:%i:%s') as date_event, nom_event, photo_event,description_event FROM evenement WHERE id_event = ? LIMIT 1");
        $stmt->execute(array($id_event));
        $row = $stmt->fetch();

    }
    if(isset($_POST['Modifier']))
        {
            $nom = checkInput($_POST['nom']);
            $date  = checkInput($_POST['date']);
            $photo = checkInput($_FILES['photo']['name']);
            $description = checkInput($_POST['description']);
            $target = "../Public/Images_event/". $_SESSION['id_club']."/".basename($photo);
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
                $ChangeImage = false;
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
            
             
        if($isSuccess && $ChangeImage){
            $status = false;
            move_uploaded_file($_FILES['photo']['tmp_name'],$target);  
            $stmt = $db->prepare("UPDATE evenement SET nom_event = ?,  date_event = ? , photo_event = ? , description_event=? WHERE id_event= ?");
            $stmt->execute(array($nom, $date, $photo,$description,$id_event));

            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Evénement bien ajouté ! </div>" .
             header('refresh:2;url=../View/Gestion_event.php');
        }
        else{
            $status = false;
            move_uploaded_file($_FILES['photo']['tmp_name'],$target);  
            $stmt = $db->prepare("UPDATE evenement SET nom_event = ?,  date_event = ? , description_event=? WHERE id_event= ?");
            $stmt->execute(array($nom, $date,$description,$id_event));

            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Evénement bien modifié ! </div>" .
             header('refresh:2;url=../View/Gestion_event.php');
        }
    }


    if(isset($_POST['Supprimer']))
    {  
            $stmt = $db->prepare("DELETE FROM evenement WHERE id_event= ?");
            $stmt->execute(array($id_event));

            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Evénement bien supprimé ! </div>" .
             header('refresh:2;url=../View/Gestion_event.php');
        
    }
?>