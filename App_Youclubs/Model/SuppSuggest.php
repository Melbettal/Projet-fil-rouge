<?php
    include '../Model/DataBase.php';
    include '../Includes/functions.php';

    
    $id_suggest  = "";
    $Success ="";
    $id_suggest = isset($_GET['id_suggest']) && is_numeric($_GET['id_suggest']) ? intval($_GET['id_suggest']) : 0;

    $stmt = $db->prepare("SELECT * FROM suggestion , membre WHERE membre.id_membre = suggestion.id_membre AND id_suggest = ? LIMIT 1");
    $stmt->execute(array($id_suggest));
    $row = $stmt->fetch();

    if(isset($_POST['Supprimer']))
    {  
            $stmt = $db->prepare("DELETE FROM suggestion WHERE id_suggest= ?");
            $stmt->execute(array($id_suggest));

            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Suggestion bien supprimée ! </div>" .
             header('refresh:2;url=../View/Gestion_suggest.php');
        
    }

   