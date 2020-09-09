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


        // On détermine le nombre total de membres
        $sql = 'SELECT COUNT(*) AS nb_membres FROM `membre` WHERE `adminYC`=0;';
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $nbMembres = $result->nb_membres;

        // On détermine le nombre de membres par page
        $parPage = 10;
        $pages = ceil($nbMembres / $parPage);

        // Affichage de la page selon le premier membre
        $premier = ($pageCourante * $parPage) - $parPage;
        $sql = 'SELECT * FROM `membre`WHERE `adminYC`=0  ORDER BY `date_insc` DESC LIMIT :premier, :parpage;';
        $query = $db->prepare($sql);
        $query->bindValue(':premier', $premier, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $query->execute();
        $membres = $query->fetchAll();

        if(isset($_POST['Search']))
        {
            $nom = $_POST['nom'];
            if(!empty($nom) )
            {
                $stmt = $db->prepare("SELECT * FROM membre WHERE nom_membre= ?");
                $stmt->execute(array($nom));
                $membres = $stmt->fetchAll();
                if(count($membres)==0)
                {
                    $stmt = $db->prepare("SELECT * FROM membre WHERE prenom_membre= ?");
                    $stmt->execute(array($nom));
                    $membres = $stmt->fetchAll();
                }
            }
        }


        // $numPage = 1;
        // $nbrMembres = count($rows);
        // for($i=0; $i<=$nbrMembres; $i++)
        // {
        //     if($nbrMembres > 10)
        //     {
        //         $numPage ++;
        //         $nbrMembres = $nbrMembres-10;
        //     }
        // }
        }
    