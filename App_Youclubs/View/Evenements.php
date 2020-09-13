<?php 
  include '../Model/AffichageEvents.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/Evenements.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title> Les événements </title>
</head>
<body>
    <?php 
            include '../Includes/HeaderMembre.php';
    ?>
    <hr>
    <section class="Description_page">
        <img src="../Public/Images/Share.svg" class="image1" width="400px" height="400px">
        <!-- <h2> Ici, on partage avec vous nos moments de joie, d'amusement et de solidarité</h2> -->
        <div class="container">
            <div class="neon">Événements </div>
            <div class="flux">YouCode  </div>
          </div>
        <img src="../Public/Images/Party.svg" class="image2" width="400px" height="500px">
    </section>

    <section class="Part_event">
        <div class="space"></div>
        <h2> Liste des événements passés </h2>
        <div class="space"></div>
        <div class="tri">
            <div class="triAll">
            <form method="post">
                <select name="select1" id="tri_date">
                    <option hidden  selected value="valeur1">Tri par date</option> 
                    <?php foreach($rows3 as $row3) { ?>
                        <option  value="<?php echo $row3->date_event ?>" ><?php echo $row3->date_event ?></option>
                    <?php } ?>
                </select>
                <select  name="select2" id="tri_club">
                    <option  hidden selected value="valeur1">Tri par club</option> 
                    <?php foreach($rows2 as $row2) { ?>
                        <option value="<?php echo $row2->nom_club ?>" ><?php echo $row2->nom_club ?></option>
                    <?php } ?>
                </select>
                <button class="btnSearch" name="Search"> <img src="../Public/Images/search.png" height="30px" width="30px" alt="search"></button>
            </form>
            </div>
        </div>

        <div class="space"></div>
        <div class="evenements">
            <?php
                foreach ($rows as $row) {
            ?>
            <div class="evenement">
                <div class="photoEvent" style="background-image: url('../Public/Images_event/<?php echo $row->photo_event ?>'); background-position: center;background-size: cover;">  </div>
                <div class="infosEvent"> 
                    <h5> <?php echo $row->date_event ?> </h5>
                    <p> <?php echo $row->nom_event ?></p>
                    <a href="Consulter_event.php?do=consult&id_event=<?php echo $row->id_event ?>">
                        <button class="btnConsulter" name="Consulter"> Consulter</button>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <div class="space"></div>
    <?php
      include '../Includes/Footer.php';
    ?>
    
</body>
</html>