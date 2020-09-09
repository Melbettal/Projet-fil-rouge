<?php 
  include '../Model/AffichageEvents.php';
  include '../Includes/manage_forum.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/messuggestions.css">
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
    ?>
    <div class="space"> </div>
    <h2> FORUM</h2><br>
    <table class="table table-hover">
        <thead>
          <tr>
            <th style="text-align: center;" scope="col">Id du suggestion</th>
            <th style="text-align: center;" scope="col-xl">Suggestions</th>
            <th style="text-align: center;" scope="col" >Modifier le text</th>
            <th style="text-align: center;"scope="col" >Supprimer la suggestion</th>
          </tr>
        </thead>
        <?php
            foreach ($rows as $row) {
        ?>        
        <tbody>
          <tr>
            <th style="text-align: center;" scope="row"> <?php echo $row->id_suggest ?> </th>
            <td style="text-align: center;"><?php echo $row->text_suggest ?></td>
            <td style="text-align: center;">
                <a href="Modif_club.php?do=modif&id_club=<?php echo $row->id_suggest ?>">
                    <button><img src="../Public/Images/modif.svg" width="30px" height="30px" alt="Modifier"></button> 
                </a>
            </td>
            <td style="text-align: center;">
                <a href="Supp_club.php?do=supp&id_club=<?php echo $row->id_suggest ?>">
                    <button><img src="../Public/Images/delete.svg" width="30px" height="30px" alt="Supprimer"></button> 
                </a>
            </td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
      
      <div class="space"> </div>