<?php
    include '../Model/DataBase.php';


    $stmt = $db->prepare("SELECT * FROM evenement WHERE cloture=1 AND date_event < NOW() ORDER BY date_event desc");
    $stmt->execute(array());
    $rows = $stmt->fetchAll();


    $stmt2 = $db->prepare("SELECT nom_club FROM club");
    $stmt2->execute(array());
    $rows2 = $stmt2->fetchAll();


    $stmt3 = $db->prepare("SELECT DISTINCT DATE_FORMAT(date_event, '%Y') as date_event FROM evenement ORDER BY date_event desc");
    $stmt3->execute(array());
    $rows3 = $stmt3->fetchAll();


    $stmt4 = $db->prepare("SELECT * FROM evenement,club WHERE cloture=0 AND club.id_club=evenement.id_club AND date_event > NOW()");
    $stmt4->execute(array());
    $rows4 = $stmt4->fetchAll();



    if(isset($_POST['Search']))
    {
        $select1 = $_POST['select1'];
        $select2 = $_POST['select2'];

        if($select1 != "valeur1" && $select2 != "valeur1")
        {
            $stmt = $db->prepare("SELECT id_event, nom_event, date_event, photo_event,  club.id_club, evenement.id_club FROM evenement, club 
            WHERE cloture=1 and  club.id_club = evenement.id_club AND date_event < NOW() and DATE_FORMAT(date_event, '%Y') = ? and  nom_club = ? ORDER BY date_event desc");
            $stmt->execute(array($select1,$select2));
            $rows = $stmt->fetchAll();
        }
        else if ($select1 == "valeur1" && $select2 != "valeur1")
        {
            $stmt = $db->prepare("SELECT id_event, nom_event, date_event, photo_event,  club.id_club, evenement.id_club FROM evenement, club 
            WHERE cloture=1 and  club.id_club = evenement.id_club  AND date_event < NOW() and  nom_club = ? ORDER BY date_event desc");
            $stmt->execute(array($select2));
            $rows = $stmt->fetchAll();
        }
        else if($select1 != "valeur1" && $select2 == "valeur1")
        {
            $stmt = $db->prepare("SELECT id_event, nom_event, date_event, photo_event, id_club FROM evenement 
            WHERE cloture=1  AND date_event < NOW() and DATE_FORMAT(date_event, '%Y') = ? ORDER BY date_event desc ");
            $stmt->execute(array($select1));
            $rows = $stmt->fetchAll();
        }
    }

