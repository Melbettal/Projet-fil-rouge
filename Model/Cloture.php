<?php
    include '../Model/DataBase.php';
    include '../Includes/functions.php';

    $id_event    = $article = $photo1 = $photo2 = $photo3  = $photo4 = $photoERROR  = $articleERROR = "";
    $isSuccess  = $status = true;
    $Success ="";
    $id_event = isset($_GET['id_event']) && is_numeric($_GET['id_event']) ? intval($_GET['id_event']) : 0;

    if( $_SESSION["club"] == null){
        header("Location:../View/LoginTest.php");
    }
    else if($do != 'cloture'){
        header("Location:../View/LoginTest.php");
    }
    else{
        $stmt = $db->prepare("SELECT  nom_event FROM evenement WHERE id_event = ? LIMIT 1");
        $stmt->execute(array($id_event));
        $row = $stmt->fetch();
    }
    
    if(isset($_POST['Cloturer']))
        {
            $article = checkInput($_POST['article']);
            $photo1 = checkInput($_FILES['photo1']['name']);
            $photo2= checkInput($_FILES['photo2']['name']);
            $photo3 = checkInput($_FILES['photo3']['name']);
            $photo4 = checkInput($_FILES['photo4']['name']);
            $target = "../Public/Images_event/". $_SESSION['id_club']."/".basename($photo1);
            $target = "../Public/Images_event/". $_SESSION['id_club']."/".basename($photo2);
            $target = "../Public/Images_event/". $_SESSION['id_club']."/".basename($photo3);
            $target = "../Public/Images_event/". $_SESSION['id_club']."/".basename($photo4);
            $imageExtension  = pathinfo($target,PATHINFO_EXTENSION);
            if(empty($article)){
                    $articleERROR = "Ce champ ne peut pas être vide";
                    $isSuccess = false;
            }
            if(empty($photo1)||empty($photo2)||empty($photo3)||empty($photo4)||empty($photo5)){
                $photoERROR = "Veuillez ajouter 5 images!";
                $isSuccess = false;
            }
            else if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif"){
                $photoERROR = "Les fichiers autorisés sont : .jpg, .jpng , .png , .gif";
                $isSuccess = false;   
            }
            else if($_FILES["photo1"]["size"] > 10000000 || $_FILES["photo2"]["size"] > 10000000 || $_FILES["photo3"]["size"] > 10000000 || $_FILES["photo4"]["size"] > 10000000 || $_FILES["photo5"]["size"] > 10000000){ 
                $photoERROR = "Veuillez revoir les tailles des images";
                $isSuccess = false;
            }
            
             
        if($isSuccess){
            $status = false;
            move_uploaded_file($_FILES['photo1']['tmp_name'],$target); 
            move_uploaded_file($_FILES['photo2']['tmp_name'],$target); 
            move_uploaded_file($_FILES['photo3']['tmp_name'],$target);  
            move_uploaded_file($_FILES['photo4']['tmp_name'],$target); 

            $stmt = $db->prepare("INSERT INTO photo(src_photo,id_event) VALUES (?, ?)");
            $stmt->execute(array($photo1, $id_event));
            $stmt->execute(array($photo2, $id_event));
            $stmt->execute(array($photo3, $id_event));
            $stmt->execute(array($photo4, $id_event));

            $stmt2 = $db->prepare("UPDATE evenement SET article = ? , cloture = 1   WHERE id_event= ?");
            $stmt2->execute(array($article, $id_event));

            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Evénement bien clôturé ! </div>" .
             header('refresh:2;url=../View/Gestion_event.php');
        }
    }