<?php
    include '../Model/DataBase.php';

    session_start();
    if( $_SESSION["admin"] == null){
    header("Location:../View/LoginTest.php");
    }else{
    
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $pageCourante = (int) strip_tags($_GET['page']);
        }else{
            $pageCourante = 1;
        }


        // On détermine le nombre total de suggestions
        $sql = 'SELECT COUNT(*) AS nb_suggestions FROM `suggestion`';
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $nbsuggestions = $result->nb_suggestions;

        // On détermine le nombre de suggestions par page
        $parPage = 10;
        $pages = ceil($nbsuggestions / $parPage);

        // Affichage de la page selon la première suggestion
        $premier = ($pageCourante * $parPage) - $parPage;
        $sql = 'SELECT id_suggest, text_suggest, date_suggest, suggestion.id_membre, prenom_membre, nom_membre FROM suggestion, membre
        WHERE membre.id_membre = suggestion.id_membre ORDER BY `date_suggest` DESC LIMIT :premier, :parpage;';
        $query = $db->prepare($sql);
        $query->bindValue(':premier', $premier, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $query->execute();
        $suggestions = $query->fetchAll();

        
    }
    