<?php include '../Model/AffichageMembres.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des membres</title>
    <link rel="stylesheet" href="../Public/Style/DashboardAdmin.css">
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
    <div class="Image1"><img src="../Public/Images/membres.svg" alt="photo" width="400px" height="300px"> </div>
    <h2> Gestion des membres </h2>
    <br>
    <form method="POST">
       <div class="searchDiv">
        <div class="triAll">
          <input type="text" placeholder="Chercher par nom ou prénom" name="nom">
          <button type="submit" class="btnSearch" name="Search"> <img src="../Public/Images/search.png" height="25px" width="25px" alt="search"></button>
        </div>
    </form>
    </div>
    <div class="space"></div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col" style="text-align: center;">Date d'inscription </th>
            <th scope="col" style="text-align: center;">Nom du membre</th>
            <th scope="col" style="text-align: center;">Prénom du membre</th>
            <th scope="col" style="text-align: center;">Email du membre</th>
            <th scope="col" style="text-align: center;" >Supprimer le membre</th>
          </tr>
        </thead>
        <?php
            foreach ($membres as $row) {
        ?>        
        <tbody>
          <tr>
            <td style="text-align: center;" scope="row"> <?php echo $row->date_insc ?> </td>
            <td style="text-align: center;"><?php echo $row->nom_membre ?></td>
            <td style="text-align: center;"><?php echo $row->prenom_membre ?></td>
            <td style="text-align: center;"><?php echo $row->email_membre ?></td>
            <td style="text-align: center;">
                <a href="Supp_membre.php?do=supp&id_membre=<?php echo $row->id_membre ?>">
                    <button><img src="../Public/Images/delete.svg" width="30px" height="30px" alt="Supprimer"></button> 
                </a>
            </td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
      <div class="divAdd">
        <nav>
          <ul class="pagination">
            <li class="page-item <?= ($pageCourante == 1) ? "disabled" : "" ?>">
              <a href="./Gestion_membres?page=<?= $pageCourante - 1 ?>" class="page-link">Précédent</a>
            </li>
            <?php for($page = 1; $page <= $pages; $page++): ?>
              <li class="page-item <?= ($pageCourante == $page) ? "active" : "" ?>">
                <a href="./Gestion_membres?page=<?= $page ?>" class="page-link"><?= $page ?></a>
              </li>
            <?php endfor ?>
              <li class="page-item <?= ($pageCourante == $pages) ? "disabled" : "" ?>">
                <a href="./Gestion_membres?page=<?= $pageCourante + 1 ?>" class="page-link">Suivant</a>
              </li>
          </ul>
        </nav>
      </div>
      <div class="space"></div>
</body>
</html>