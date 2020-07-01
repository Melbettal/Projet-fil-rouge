<?php

    include '../Model/DataBase.php';
    include '../Includes/functions.php';

    $id_event = isset($_GET['id_event']) && is_numeric($_GET['id_event']) ? intval($_GET['id_event']) : 0;
    
    $stmt = $db->prepare("SELECT DATE_FORMAT(date_event, '%Y-%m-%d | %H:%i') as date_event, nom_event,article, photo_event,description_event FROM evenement WHERE id_event = ? LIMIT 1");
    $stmt->execute(array($id_event));
    $row = $stmt->fetch();


    $stmt2 = $db->prepare("SELECT * FROM photo WHERE id_event = ?");
    $stmt2->execute(array($id_event));
    $row2 = $stmt2->fetchAll();
