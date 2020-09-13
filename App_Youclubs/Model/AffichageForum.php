<?php

include '../Model/DataBase.php';
session_start();
    if( $_SESSION["membre"] == null){
    header("Location:../View/LoginTest.php");
    }else{
        $ERROR="";$Success="";$Failed="";$isSuccess=true;

        //Affichage suggestions
        $stmt = $db->prepare("SELECT * FROM suggestion, membre, club
        WHERE suggestion.id_membre = membre.id_membre AND suggestion.id_club = club.id_club ORDER BY date_suggest desc LIMIT 20 ");
        $stmt->execute();
        $suggestions = $stmt->fetchAll();

        if(isset($_POST['SearchClub']))
        {
            $club = $_POST['select2'];
            //Affichage suggestions selon club
            $stmt = $db->prepare("SELECT * FROM suggestion, membre, club 
            WHERE suggestion.id_membre = membre.id_membre AND suggestion.id_club = club.id_club AND nom_club = ? ORDER BY date_suggest desc LIMIT 20 ");
            $stmt->execute(array($club));
            $suggestions = $stmt->fetchAll();
        }

        
        if(isset($_POST['AjoutSuggest']))
        {
            $clubSuggest = $_POST['select2'];
            $textSuggest = $_POST['textSuggest'];

            if(empty($clubSuggest)||empty($textSuggest)){
                $Failed = "<br> <br> <div class='alert alert-warning' role='alert'> Veuillez remplir tous les champs ! </div>" .
                header('refresh:2;url=../View/Forum.php');
                $isSuccess = false;
               }


            if($isSuccess){
                $status = false; 

                $req = $db->prepare("SELECT id_club FROM club WHERE nom_club = ? ");
                $req->execute(array($clubSuggest));
                $resultat = $req->fetch();
                
                $stmt = $db->prepare("INSERT INTO suggestion ( text_suggest, id_membre ,id_club) VALUES (?, ?, ?)");
                $stmt->execute(array($textSuggest, $_SESSION['id_membre'], $resultat->id_club));
  
                $Success ="<br> <br> <div class='alert alert-success' role='alert'> Suggestion ajoutée avec succès ! </div>" .
                header('refresh:2;url=../View/Forum.php');
            }
        }

        $req2 = $db->prepare("SELECT * FROM suggestion WHERE id_membre = ? ");
        $req2->execute(array($_SESSION['id_membre']));
        $mesSuggestions = $req2->fetchAll();


        //Supprimer ma suggestion

        $id_suggest = isset($_GET['id_suggest']) && is_numeric($_GET['id_suggest']) ? intval($_GET['id_suggest']) : 0;

        if(isset($_POST['Supprimer']))
        {  
                $stmt = $db->prepare("DELETE FROM suggestion WHERE id_suggest= ?");
                $stmt->execute(array($id_suggest));

                $Success ="<br> <br> <div class='alert alert-success' role='alert'> Suggestion bien supprimée ! </div>" .
                header('refresh:2;url=../View/Mes_suggestions.php');
            
        }

    }  