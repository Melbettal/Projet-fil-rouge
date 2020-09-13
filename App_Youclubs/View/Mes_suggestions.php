<?php 
  include '../Model/AffichageForum.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/ForumSug.css">
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
    <title>Mes suggestions</title>
</head>

<body>
    <?php 
        include '../Includes/HeaderMembre.php';
    ?>
    
    <div class="space"></div>
    <?php echo $Success; ?> 
    <div class="Image1"><img src="../Public/Images/suggestions.svg" alt="photo" width="400px" height="300px"> </div>
    <br>
    <h2> Mes suggestions </h2>
    <div class="space"></div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col" style="text-align:left;"  width="500px">Date</th>
                <th scope="col" style="text-align:left;">Suggestion</th>
                <th scope="col" style="text-align:left;" width="50px">Supprimer</th>
            </tr>
            </thead>
            <?php
                foreach ($mesSuggestions as $row) {
            ?>        
            <tbody>
            <tr>
                <th style="text-align:left;"> <?php echo $row->date_suggest ?> </th>
                <td style="text-align:left;"><?php echo $row->text_suggest ?></td>
                <td style="text-align:left;"> 
                <a href="DeleteSuggest?id_suggest=<?php echo $row->id_suggest ?>">
                    <button><img src="../Public/Images/delete.svg" width="30px" height="30px" alt="Supprimer"></button>
                </a>
                </td>
            </tr>
            </tbody>
            <?php } ?>
        </table>
        <div class="space"></div>
        <div class="retour">
            <a href="Forum.php">
                <button><img src="../Public/Images/retour.svg" alt="retour" width="40px" height="40px"></button>
            </a>
        </div>
        <br>

    <?php
      include '../Includes/Footer.php';
    ?>
</body>

</html>