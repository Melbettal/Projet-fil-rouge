<?php 
  include '../Model/AffichageEvents.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Style/forum.css">
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

    <div class="first">
        <h2 class="h">FORUM</h2>
        <p>Vous avez quelque idées à nous suggérer?<br>
 vous voulez des nouveaux évenements ou clubs a organiser?<br>
 Partager avec nous vos suggestions, and let's chat!</p>
</div>

<div class="container">
    <div class="row">
        <section class="Part_event">
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
                <button class="btnConnexion" id="btnAddProduct" data-filter="*" data-toggle="modal" data-target="#addProductModal" >
                                Ajouter une suggestion
                            </button>
        <!-- <a class="nav-link" href="../Model/Logout.php"><button class="btnConnexion"> Ajouter une suggestion</button></a> -->
        </section>                
    </div>
                    <div class="row">
<div class="for">
        <div class="card">
            <div class="card-header">
                Quote
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
            </div>
        </div>
                    </div>
                    </div>




    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group d-flex flex-column">
                            <label for="addCategorie" class="col-form-label">Club concerné:</label>
                                <select  name="select2" id="tri_club">
                                    <option  hidden selected value="valeur1">Tri par club</option>  
                                    <?php foreach($rows2 as $row2) { ?>
                                    <option value="<?php echo $row2->nom_club ?>" ><?php echo $row2->nom_club ?></option>
                                    <?php } ?>
                                </select>
                        </div>  
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Suggestion :</label>
                            <textarea class="form-control" id="suggestion"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="btnAddProductExecute">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
      include '../Includes/Footer.php';
    ?>
</body>

</html>