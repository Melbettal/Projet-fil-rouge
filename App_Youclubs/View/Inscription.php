<?php 
  include '../Model/Inscription.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/Connexion.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <title>S'inscrire</title>
</head>

<body>
<?php 
        include '../Includes/Header.php';
    ?>

<br><br><h3 style="text-align:center;"> Bienvenue à YouClubs ! <br> </h3>
<?php echo $Success; ?> 

  <div class="container one">
      <div class="row">
          <div class="col-sm border" style="padding: 5%;">
            <div class="form-group ">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-light active">
              <input type="radio" name="options" id="option1" onclick="window.location.href='./Connexion.php'"> Se connecter
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="options" id="option2" > S'inscrire
            </label>
          </div>
          </div>
          <form  method="post">
            <p>Nouveau sur YouClubs? <br>
            Inscris-toi pour être à jour de tout ce qui se passe à Youcode :) !</p>
              <div class="form-group">
                <label for="exampleInputPassword1">Nom :</label>
                <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
                <p style="color:red;text-align:left"> <?php echo $nomERROR; ?> </p>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Prénom :</label>
                <input type="text" name="prenom" class="form-control" id="exampleInputPassword1">
                <p style="color:red;text-align:left"> <?php echo $prenomERROR; ?> </p>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email :</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p style="color:red;text-align:left"> <?php echo $emailERROR; ?> </p>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe :</label>
                <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
                <p style="color:red;text-align:left"> <?php echo $mdpERROR; ?> </p>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirmation de mot de passe :</label>
                <input type="password" name="Cmdp" class="form-control" id="exampleInputPassword1">
                <p style="color:red;text-align:left"> <?php echo $CmdpERROR; ?> </p>
              </div>
              <button type="submit" name="Inscription" class="btn btn-primary" style="  padding:8px 25px; margin-left: 200px; border-radius: 2em;">S'inscrire</button>
          </form>
          </div>

          <div class="col-sm">
            <img src="../Public/Images/pic5.png" style="width:100%; margin-top:70px"  alt="png"></img>
        </div>
      </div>
    </div>
    <div class="space"></div>

<br><br>

<?php include '../Includes/Footer.php';?>
</body>
</html>
