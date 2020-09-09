<?php
    include '../Model/DataBase.php';
    include '../Includes/functions.php';

    
    $id_membre  = "";
    $Success ="";
    $id_membre = isset($_GET['id_membre']) && is_numeric($_GET['id_membre']) ? intval($_GET['id_membre']) : 0;

    $stmt = $db->prepare("SELECT * FROM membre WHERE id_membre = ? LIMIT 1");
    $stmt->execute(array($id_membre));
    $row = $stmt->fetch();

    if(isset($_POST['Supprimer']))
    {  
            $stmt = $db->prepare("DELETE FROM membre WHERE id_membre= ?");
            $stmt->execute(array($id_membre));

            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Membre bien supprimé ! </div>" .
             header('refresh:2;url=../View/Gestion_membres.php');
        
    }