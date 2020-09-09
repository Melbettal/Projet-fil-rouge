<?php
    //check the click of the submit button
    if (isset($_POST['sinscrire-submit'])) {

        require '../Model/DataBase.php';

        $utilisateur = $_POST['nom'];
        $email = $_POST['email'];
        $motdepasse = $_POST['mdp'];
        $classe = $_POST['classe'];

        //check if fields are 3amrin
        if (empty($utilisateur) || empty($email) || empty($motdepasse) || empty($classe)) {
            header("Location: ../sinscrire.php?error=champsvide&nom".$utilisateur."&email".$email);
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $utilisateur)) {
            header("Location: ../sinscrire.php?error=mailinvalide&email");  
        }
        //check if email is unvalid with defined function
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../sinscrire.php?error=mailinvalide&nom".$utilisateur);
            exit();
        }
        //check for valid username
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $utilisateur)) {
            header("Location: ../sinscrire.php?error=utilisateurinvalide&email".$email);
            exit();
        }
        //checking if username already used
        else {

            $sql = "SELECT nom_membre FROM membre WHERE id_membre=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../sinscrire.php?error=sqlerror&email".$email);
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $utilisateur, $motdepasse);
                mysqli_stmt_execute($stmt); //run inside the database 
                mysqli_stmt_store_result($stmt); //check if theres a match
                $resultCheck = mysqli_stmt_num_rows();
                if ($resultCheck > 0) {
                    header("Location: ../sinscrire.php?error=utilisateurpris&email=".$email);
                    exit();
                }
                else {
                    $sql = "INSERT INTO membre (id_membre, nom_membre, class_membre, email_membre, mdp_membre) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../sinscrire.php?error=sqlerror");
                        exit();
                    }
                    else {
                        mysqli_stmt_bind_param($stmt, "sssi", $utilisateur, $classe, $motdepasse, $motdepasse);
                        mysqli_stmt_execute($stmt);  
                        mysqli_stmt_store_result($stmt);
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } 
    else {
        header("Location: ../sinscrire.php");
        exit();
    }