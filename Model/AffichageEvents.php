<?php
    include '../Model/DataBase.php';

        $stmt = $db->prepare("SELECT * FROM evenement WHERE cloture=1");
        $stmt->execute(array());
        $rows = $stmt->fetchAll();
       