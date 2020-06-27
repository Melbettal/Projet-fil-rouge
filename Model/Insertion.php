<?php 
include 'DataBase.php';

if(isset($POST['Ajouter']))
{
    $target = "images/".basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];


}




