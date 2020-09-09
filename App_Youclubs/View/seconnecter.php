

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/seconnecter.css">
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
        include '../Includes/HeaderClub.php';
        include '../Model/login.php';
    ?>
         <div class="container one">
            <div class="row">
            <div class="col-sm border" style="padding: 5%;">
            <div class="form-group ">
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="options" id="option1" > Se connecter
  </label>
  <label class="btn btn-light">
    <input type="radio" name="options" id="option2" onclick="window.location.href='./sinscrire.php'"> S'inscrire
  </label>
</div>
</div>
<form action="./includes/seconnecter.inc.php" method="post">
<p>Vous avez déjà un compte?
Connectez-vous pour rejoindre ou créer des événements</p>
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
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">email ou mot de passe oublié?</label>
  </div>
  <button type="submit" name="Connexion" class="btn btn-primary" style="  position: absolute; margin-left: 200px; border-radius: 2em;">Se connecter</button>
</form>
</div>

                <div class="col-sm">
                    <img src="../Public/Images/pic5.png" class="pic5"  alt="png">
                    </img>
                </div>
</div>
</div>

                <div class="space"></div>

                <?php
      include '../Includes/Footer.php';
    ?>
    </body>
    </html>
