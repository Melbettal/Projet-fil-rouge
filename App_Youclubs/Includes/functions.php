<?php
    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;   
    }

    function checkExtension($image_name,$target_name){

        $imageExtension  = pathinfo($target_name,PATHINFO_EXTENSION);

        if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif"){
            return false;
        }
        else{
            return true;
        }
    }
    