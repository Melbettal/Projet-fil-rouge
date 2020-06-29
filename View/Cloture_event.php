<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/Cloture_event.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title> Clôture événement </title>
</head>
<body>
    <?php
      include '../Includes/HeaderClub.php'
    ?>
    <div class="space"></div>
    <h2> Clôture de l'événement "________" </h2>
    <div class="space"></div>
    <div class="firstPart">
        <div class="formPart">
            <div>
                <label for="article"> Article : </label>
                <textarea name="article" id="article"></textarea>
            </div>
            <div>
                <label for="photo"> Photos : </label>
                <input type="file" name="photo1" id="photo1">
            </div>
            <div>
                <input type="file" name="photo2" id="photo2">
            </div>
            <div>
                <input type="file" name="photo3" id="photo3">
            </div>
            <div>
                <input type="file" name="photo4" id="photo4">
            </div>
            <div>
                <input type="file" name="photo5" id="photo5">
            </div>
            <div>
                <button> Clôturer </button> 
            </div>
        </div>
        <div class="pictPart">
            <img src="../Public/Images/Cloture_img.svg" alt="Image">
        </div>
    </div>
    <div class="space"></div>
    <div class="retour">
        <a href="Gestion_event.php">
            <button><img src="../Public/Images/retour.svg" alt="retour" width="40px" height="40px"></button>
        </a>
    </div>
</body>
</html>