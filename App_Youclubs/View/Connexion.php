

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
    <title>Se connecter</title>
</head>

<body>
  <?php 
          include '../Includes/Header.php';
          include '../Model/Login.php';
      ?>

<br><br><h3 style="text-align:center;"> Bienvenue à YouClubs ! <br> </h3>

<div class="container one">
    <div class="row">
    <div class="col-sm border" style="padding: 5%;">
    <div class="form-group ">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-primary active">
      <input type="radio" name="options" id="option1" > Se connecter
    </label>
    <label class="btn btn-light">
      <input type="radio" name="options" id="option2" onclick="window.location.href='./Inscription.php'"> S'inscrire
    </label>
  </div>
  </div>
  <form method="post">
    <p>Vous avez déjà un compte?
    Connectez-vous pour suivre nos actualités !</p>
      <div class="form-group">
        <label for="exampleInputEmail1">Email :</label>
        <input type="email" name="EmailSession" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre
    </small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe :</label>
        <input type="password" name="MdpSession" class="form-control" id="exampleInputPassword1">
      </div>
      <p style="color:red;text-align:left"> <?php echo $erreur; ?> </p>

      <button type="submit" name="Connexion" class="btn btn-primary" style=" padding:8px 25px; margin-left: 200px; border-radius: 2em;">Se connecter</button>
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
