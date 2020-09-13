<?php 
  include '../Model/Consultation.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/Consulter_event.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title> Evénement <?php echo $row->nom_event ?></title>
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
        <h2> L'événement "<?php echo $row->nom_event ?>" </h2>
        <div class="space"></div>
        <div class="infosEvent">
            <div class="leftPart">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $n = 0;
                        foreach ($row2 as $r) { ?>
                            <div class="carousel-item <?php if($n == 0){echo 'active';}  ?>">
                                <div  style="background-image: url('../Public/Images_event/<?php echo $r->src_photo ?>'); width: 100%; height: 500px;background-position: center;background-size: cover;"></div>
                            </div>
                        <?php $n++; } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="rightPart">
                <h5> Date : <span> <?php echo $row->date_event ?> </span> </h5>
                <div>
                    <p><?php echo $row->article ?></p>
                </div>
            </div>
        </div>
    </section>
    <div class="space"></div>
    <div class="retour">
        <a href="Evenements.php">
            <button style="border:none; background-color:white;"><img src="../Public/Images/retour.svg" alt="retour" width="40px" height="40px"></button>
        </a>
    </div>
    <?php
      include '../Includes/Footer.php';
    ?>
</body>
</html>