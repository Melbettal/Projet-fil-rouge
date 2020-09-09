<?php 
    include '../Model/Affichage.php';
    include '../Model/Modification.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/Modif_event.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title> Modification événement </title>
</head>
<body>
    <?php
      include '../Includes/HeaderClub.php';
    ?>
    <div class="space"></div>
    <h2> Modifier l'événement "<?php echo $row->nom_event ?>" </h2>
    <?php echo $Success; ?> 
    <div class="space"></div>
    <div class="firstPart">
        <div class="formPart">
            <form method="post"  enctype="multipart/form-data">
                <div>
                    <label for="nom"> Nom : </label>
                    <input type="text" name="nom" id="nom" value="<?php echo $row->nom_event ?>">
                    <p style="color:red;"> <?php echo $nomERROR; ?> </p>
                </div>
                <div>
                    <label for="date"> Date : </label>
                    <input type="datetime-local" name="date" id="date" value="<?php echo $row->date_event ?>">
                    <p style="color:red;"> <?php echo $dateERROR; ?></p>
                </div>
                <div>
                    <label for="photo"> Photo : </label>
                    <input type="file" name="photo" id="photo" value="<?php echo $row->photo_event ?>">
                    <p style="color:red;"> <?php echo $photoERROR; ?></p>
                </div>
                <div>
                    <label for="description"> Description : </label>
                    <textarea name="description" id="description"><?php echo $row->description_event ?></textarea>
                    <p style="color:red;"> <?php echo $descriptionERROR; ?></p>
                </div>
                <div class="buttons">
                    <button tybe="submit" name="Modifier" id="btnModifier" > Modifier </button>
                    <button tybe="submit" name="Supprimer" id="btnSupprimer" > Supprimer </button> 
                </div>
            </form>
        </div>
        <div class="space"></div>
        <div class="pictPart">
            <img src="../Public/Images/Modif_img.svg" alt="Image">
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