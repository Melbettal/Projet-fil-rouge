<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
</head>
<body>
<?php
        include '../Model/Login.php';
    ?>
    <div class="space"></div>
    <form  method="post">
        <div class="field-wrap">
        <input type="email" placeholder="Email" name="EmailSession" required autocomplete="off"/>
        </div>
        
        <div class="field-wrap">
        <input type="password" placeholder="Mot de passe" name="MdpSession" required autocomplete="off"/>
        </div>
        
        <p class="forgot"><a href="#">Forgot Password?</a></p>
        <button type="submit" name="Connexion" >Se connecter</button>
    </form>
   
</body>
</html>