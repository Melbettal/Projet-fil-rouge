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
        $stmt = $db->prepare("SELECT  nom_event , date_event FROM evenement WHERE id_event = ? LIMIT 1");
        $stmt->execute(array($id_event));
        $row = $stmt->fetch();
    }
    
    if(isset($_POST['Cloturer']))
        {
            $stmt2 = $db->prepare("SELECT  nom_event, date_event FROM evenement WHERE id_event = ? LIMIT 1");
            $stmt2->execute(array($id_event));
            $row2 = $stmt2->fetch();
            $photo_name = $row2->nom_event.$row2->date_event;
            

            $article = checkInput($_POST['article']);
            $photo1 = checkInput($_FILES['photo1']['name']);
            $photo2= checkInput($_FILES['photo2']['name']);
            $photo3 = checkInput($_FILES['photo3']['name']);
            $photo4 = checkInput($_FILES['photo4']['name']);

            $photorandom1 = rand(0,1000000);
            $target1 = "../Public/Images_event/". $_SESSION['id_club']."/".$photorandom1.basename($photo1);
            $photorandom2 = rand(0,1000000);
            $target2 = "../Public/Images_event/". $_SESSION['id_club']."/".$photorandom2.basename($photo2);
            $photorandom3 = rand(0,1000000);
            $target3 = "../Public/Images_event/". $_SESSION['id_club']."/".$photorandom3.basename($photo3);
            $photorandom4 = rand(0,1000000);
            $target4 = "../Public/Images_event/". $_SESSION['id_club']."/".$photorandom4.basename($photo4);

            $imageExtension  = pathinfo($target1,PATHINFO_EXTENSION);
            
            if(empty($article)){
                    $articleERROR = "Ce champ ne peut pas être vide";
                    $isSuccess = false;
            }
            if(empty($photo1)||empty($photo2)||empty($photo3)||empty($photo4)){
                $photoERROR = "Veuillez ajouter 4 images!";
                $isSuccess = false;
            }
            else if(!checkExtension($photo1,$target1) || !checkExtension($photo2,$target2) || !checkExtension($photo3,$target3) || !checkExtension($photo4,$target4) )
            {
                $photoERROR = "Les fichiers autorisés sont : .jpg, .jpng , .png , .gif";
                $isSuccess = false;
            }
            else if($_FILES["photo1"]["size"] > 10000000 || $_FILES["photo2"]["size"] > 10000000 || $_FILES["photo3"]["size"] > 10000000 || $_FILES["photo4"]["size"] > 10000000){ 
                $photoERROR = "Veuillez revoir les tailles des images";
                $isSuccess = false;
            }
            
             
        if($isSuccess){
            $status = false;
            move_uploaded_file($_FILES['photo1']['tmp_name'],$target1); 
            move_uploaded_file($_FILES['photo2']['tmp_name'],$target2); 
            move_uploaded_file($_FILES['photo3']['tmp_name'],$target3);  
            move_uploaded_file($_FILES['photo4']['tmp_name'],$target4); 

            $stmt = $db->prepare("INSERT INTO photo(src_photo,id_event) VALUES (?, ?)");
            $stmt->execute(array($photorandom1.$photo1, $id_event));
            $stmt->execute(array($photorandom2.$photo2, $id_event));
            $stmt->execute(array($photorandom3.$photo3, $id_event));
            $stmt->execute(array($photorandom4.$photo4, $id_event));

            $stmt2 = $db->prepare("UPDATE evenement SET article = ? , cloture = 1   WHERE id_event= ?");
            $stmt2->execute(array($article, $id_event));

            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Evénement bien clôturé ! </div>" .
             header('refresh:2;url=../View/Gestion_event.php');
        }
    }