<?php 
  include '../Model/Affichage.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/Gestion_event.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title> Gestion d'événements </title>
</head>
<body>
    <?php
      include '../Includes/HeaderClub.php';
    ?>
    <div class="space"></div>
    <div class="Image1"><img src="../Public/Images/Tab_img.svg" alt="photo" width="400px" height="300px"> </div>
    <h2> Les événements à venir </h2>
    <br>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col" style="text-align:center;">Id</th>
            <th scope="col" style="text-align:center;">Photo</th>
            <th scope="col" style="text-align:center;">Nom</th>
            <th scope="col" style="text-align:center;">Date</th>
            <th scope="col"  style="text-align:center;" width="50px">Modifier</th>
            <th scope="col" style="text-align:center;"  width="50px">Clôturer</th>
          </tr>
        </thead>
        <?php
            foreach ($rows as $row) {
        ?>        
        <tbody>
          <tr>
            <th style="text-align:center;"scope="row"> <?php echo $row->id_event ?> </th>
            <td style="text-align:center;"><img height="100px" width="100px" src='../Public/Images_event/<?php echo $row->photo_event ?>' alt="photo_event"></td>
            <td style="text-align:center;"><?php echo $row->nom_event ?></td>
            <td style="text-align:center;"><?php echo $row->date_event ?></td>
            <td style="text-align:center;">
              <a href="Modif_event.php?do=modif&id_event=<?php echo $row->id_event ?>">
                <button><img src="../Public/Images/Modifier.svg" width="30px" height="30px" alt="Modifier"></button> 
              </a>
            </td>
            <td style="text-align:center;"> 
              <a href="Cloture_event?do=cloture&id_event=<?php echo $row->id_event ?>">
                <button><img src="../Public/Images/Cloturer.svg" width="30px" height="30px" alt="Cloturer"></button>
              </a>
            </td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
      <div class="divAdd">
          <a href="Ajout_event">
            <button class="btnAdd"> <img src="../Public/Images/plus.png" alt="add" width="20px" height="20px"> Ajouter événement </button>
          </a>
      </div>
      <div class="space"></div>
</body>
</html>





    