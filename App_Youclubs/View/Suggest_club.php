<?php 
 session_start();
 include '../Model/SuggestClubs.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/Gestion_event.css">
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
    <title>Suggestions</title>
</head>

<body>
<?php 
        include '../Includes/HeaderClub.php';
?>

    <div class="space"> </div>
    <div class="Image1"><img src="../Public/Images/ideas.svg" alt="photo" width="400px" height="300px"> </div>
    <h2 > Suggestions du club <?php echo $_SESSION['club'] ?> </h2>
    <div class="space"></div><br>

    <table class="table table-hover">
        <thead>
          <tr>
            <th style="text-align:center;" scope="col">Nom membre</th>
            <th style="text-align:center;" scope="col">Suggestion</th>
            <th style="text-align:center;" scope="col">Date</th>
          </tr>
        </thead>
        <?php
            foreach ($suggestClub as $row) {
        ?>        
        <tbody>
          <tr>
            <th style="text-align:center;"scope="row"> <?php echo $row->nom_membre." ".$row->prenom_membre ?> </th>
            <td style="text-align:center;"><?php echo $row->text_suggest ?></td>
            <td style="text-align:center;"><?php echo $row->date_suggest ?></td>
              </a>
            </td>
          </tr>
        </tbody>
        <?php } ?>
      </table>


<div class="space"></div>
</body>

</html>