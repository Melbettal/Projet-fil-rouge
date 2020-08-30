<?php
    session_start(); 
    if (isset($_SESSION['club'])) { // IF SESSION 'CLUB' IS ALREADY OPEN
        header('location: ../View/Gestion_event.php'); // REDIRECT TO MANAGEMENT PAGE
        exit();
    } elseif (isset($_SESSION['membre'])) { // IF SESSION 'MEMBER' IS ALREADY OPEN
        header('location: ../View/Accueil.php'); // REDIRECT TO HOME PAGE
        exit();
    }

    if(isset($_POST['Connexion'])){
        include 'DataBase.php';
        global $db;
    
        $user = $_POST['EmailSession'];
        $mdp = $_POST['MdpSession'];
        $shapassword = sha1($mdp);

        $stmt = $db->prepare("SELECT id_membre, nom_membre, prenom_membre, email_membre, mdp_membre FROM membre WHERE adminYC = 0 AND email_membre = ? AND mdp_membre = ? ");
        $stmt->execute(array($user, $shapassword));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();

        //Verifier si c'est la session d'un membre de Youcode

        if ($count > 0) {
            $_SESSION['membre'] = $row->nom_membre ." ". $row->prenom_membre  ;// SESSION USERNAME
            $_SESSION['id_membre'] = $row->id_membre ;// ID USER
            header('location: ../View/Accueil.php'); // REDIRECT VERS PAGE HOME
            exit();
        } 

        //Verifier si c'est la session de l'admin

        $stmt1 = $db->prepare("SELECT id_membre, nom_membre, prenom_membre, email_membre, mdp_membre FROM membre WHERE adminYC = 1 AND email_membre = ? AND mdp_membre = ? ");
        $stmt1->execute(array($user, $shapassword));
        $row1 = $stmt1->fetch();
        $count1 = $stmt1->rowCount();

        if ($count1 > 0) {
            $_SESSION['admin'] = $row1->nom_membre ." ". $row1->prenom_membre  ;// SESSION USERNAME
            $_SESSION['id_admin'] = $row1->id_membre ;// ID USER
            header('location: ../View/Dashboard.php'); // REDIRECT VERS PAGE DASHBOARD
            exit();
        } 

        //Verifier si c'est la session d'un club

        $stmt2 = $db->prepare("SELECT id_club, nom_club, email_club, mdp_club FROM club WHERE email_club = ? AND mdp_club = ?");
        $stmt2->execute(array($user, $shapassword));
        $row2 = $stmt2->fetch();
        $count2 = $stmt2->rowCount();

        if ($count2 > 0) {
            $_SESSION['club'] = $row2->nom_club; // SESSION NAME CLUB
            $_SESSION['id_club'] = $row2->id_club; // SESSION ID CLUB
            header('location: ../View/Gestion_event.php'); // REDIRECT TO MANAGEMENT PAGE
            exit();
        }


        if(!$count > 0 && !$count2 > 0)
        {
            echo 'Email ou mot de passe incorrect !';
        }
    }
