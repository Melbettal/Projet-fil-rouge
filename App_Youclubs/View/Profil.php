<?php
    include '../Model/ProfilMembre.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../Public/Style/Profil_membre.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<?php 
            include '../Includes/HeaderMembre.php';
       
    ?> 

     
    <?php echo $Success; ?> 
    <img src="../Public/Images/droite.svg" class="firstImage">
    <h2> Bienvenue Chèr(e) <?php echo $_SESSION['membre'] ?> </h2> 
    <img src="../Public/Images/pdp.svg" class="secondImage">
    <form method="post"  enctype="multipart/form-data">
        <div>
            <label for="nom"> Nom : </label>
            <input type="text" disabled name="nom" id="nom" value="<?php echo $row->nom_membre ?>">
        </div>
        <div>
            <label for="prenom"> Prénom : </label>
            <input type="text" disabled name="prenom" id="prenom" value="<?php echo $row->prenom_membre ?>">
        </div>
        <div>
            <label for="email"> Email : </label>
            <input type="email" name="email" id="email" value="<?php echo $row->email_membre ?>">
            <p style="color:red;"> <?php echo $emailERROR; ?></p>
        </div>
        <div>
            <label for="mdp"> Mot de passe : </label>
            <input type="password" name="mdp" id="mdp" value="<?php echo $row->mdp_membre ?>">
            <span><img class="view" src="../Public/Images/view.png" height="20px" width="20px" alt="view"></span>
            <p style="color:red;"> <?php echo $mdpERROR; ?></p>
        </div>
        <div>
            <label for="Cmdp"> Confirmation mot de passe : </label>
            <input type="password" name="Cmdp" id="Cmdp" value="<?php echo $row->mdp_membre ?>">
            <span><img class="view2" src="../Public/Images/view.png" height="20px" width="20px" alt="view"></span>
            <p style="color:red;"> <?php echo $CmdpERROR; ?></p>
        </div>
        <div>
            <button type="submit" name="Modifier"> Modifier </button> 
        </div>         
    </form>
    <img src="../Public/Images/gauche.svg" class="thirdImage">
    <div class="retour">
        <a href="Accueil.php">
            <button><img src="../Public/Images/retour.svg" alt="retour"  width="40px" height="40px"></button>
        </a>
    </div>
    

        
    <script src="../Public/JS/jquery.js"></script>
    <script type="text/javascript">
            $(function()
            {
                $(".view").on({
                click: function(){
                    if('password' == $('#mdp').attr('type')){
                        $('#mdp').prop('type', 'text');
                    }else{
                        $('#mdp').prop('type', 'password');
                    }
                }
            });
            $(".view2").on({
                click: function(){
                    if('password' == $('#Cmdp').attr('type')){
                        $('#Cmdp').prop('type', 'text');
                    }else{
                        $('#Cmdp').prop('type', 'password');
                    }
                }
            });
            });
    </script>
  
</body>
</html>