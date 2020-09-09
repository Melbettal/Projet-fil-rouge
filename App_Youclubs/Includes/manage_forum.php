<?php


if (isset($_POST['ajouter'])) {
    $suggestion = $_POST['suggestion'];
    $datte = $_POST['datte'];

    $mysqli->query("INSERT INTO suggestion (text_suggest, date_suggest) VALUES('$suggestion', '$datte')") or
        die($mysqli->error);
}