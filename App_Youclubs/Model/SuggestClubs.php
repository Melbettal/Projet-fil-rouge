<?php
    include '../Model/DataBase.php';

    $stmt = $db->prepare("SELECT * FROM suggestion, membre, club
    WHERE suggestion.id_membre = membre.id_membre AND suggestion.id_club = club.id_club  AND club.id_club = ? ORDER BY date_suggest desc LIMIT 20 ");
    $stmt->execute(array($_SESSION['id_club']));
    $suggestClub = $stmt->fetchAll();
