<?php 
  include '../Model/AffichageClubs.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Public/Style/Dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
</head>
<body>
    <?php
      include '../Includes/HeaderAdmin.php';
    ?>
    <div class="space"> </div>
    <div class="Image1"><img src="../Public/Images/managment.svg" alt="photo" width="400px" height="300px"> </div>
    <h2> Gestion des clubs </h2>
    <div class="space"> </div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Id du club</th>
            <th scope="col">Nom du club</th>
            <th scope="col">Email du club</th>
            <th scope="col" >Modifier le club</th>
            <th scope="col" >Supprimer le club</th>
          </tr>
        </thead>
        <?php
            foreach ($rows as $row) {
        ?>        
        <tbody>
          <tr>
            <th style="vertical-align: middle;"scope="row"> <?php echo $row->id_club ?> </th>
            <td style="vertical-align: middle;"><?php echo $row->nom_club ?></td>
            <td style="vertical-align: middle;"><?php echo $row->email_club ?></td>
            <td style="vertical-align: middle;">
                <a href="Modif_club.php?do=modif&id_club=<?php echo $row->id_club ?>">
                    <button><img src="../Public/Images/modif.svg" width="30px" height="30px" alt="Modifier"></button> 
                </a>
            </td>
            <td style="vertical-align: middle;">
                <a href="Supp_club.php?do=supp&id_club=<?php echo $row->id_club ?>">
                    <button><img src="../Public/Images/delete.svg" width="30px" height="30px" alt="Supprimer"></button> 
                </a>
            </td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
      <div class="divAdd">
          <a href="Ajout_club">
            <button class="btnAdd"> <img src="../Public/Images/plus.png" alt="add" width="20px" height="20px"> Ajouter un club </button>
          </a>
      </div>
      <div class="space"> </div>
</body>
</html>