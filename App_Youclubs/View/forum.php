<?php 
  include '../Model/AffichageEvents.php';
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
    <title>Forum</title>
</head>

<body>
    <?php 
            include '../Includes/HeaderMembre.php';
    ?>
    <?php echo $Success; ?> 
    <?php echo $Failed; ?>
    <br><br>
    <div class="first">
        <h2 class="h">FORUM</h2>
        <p>Vous avez quelque idées à nous suggérer?<br>
        vous voulez des nouveaux évenements ou clubs a organiser?<br>
        Partager avec nous vos suggestions, and let's chat!</p>
    </div>
        <div class="Image1"><img src="../Public/Images/thinking.svg" width="150px" height="150px">
        <a href="Mes_Suggestions.php"> Consulter mes suggestions </a>
    </div>
    <br><br>

<div class="container">
    <div class="row">
        <section class="Part_event">
            <button class="btnSuggestion" id="btnAddProduct" data-filter="*" data-toggle="modal" data-target="#addProductModal" >
            <img src="../Public/Images/plus.png" alt="add" width="15px" height="15px">
                    Ajouter une suggestion
            </button>
            <div class="tri">
                <div class="triAll">
                <form method="post" style="margin-top:20px">
                    <select  name="select2" id="tri_club">
                        <option  hidden selected value="valeur1">Tri par club</option> 
                        <?php foreach($rows2 as $row2) { ?>
                            <option value="<?php echo $row2->nom_club ?>" ><?php echo $row2->nom_club ?></option>
                        <?php } ?>
                    </select>
                    <button class="btnSearch" name="SearchClub"> <img src="../Public/Images/search.png" height="25px" width="25px" alt="search"></button>
                </form>
                </div>
            </div>
        </section>                
    </div>
    <?php foreach($suggestions as $suggestion ) { ?>
    <div class="row" style="width:100%; margin:auto;" >
        <div class="for" style="width:100%; margin:auto;">
            <div class="card" style="width:80%; margin:auto;">
                <div class="card-header" >
                    <?php echo $suggestion->nom_membre." ".$suggestion->prenom_membre; ?>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p> <?php echo $suggestion->text_suggest; ?></p>
                    <footer class="blockquote-footer">Club : <?php echo $suggestion->nom_club; ?> <br>
                    <cite title="Source Title">Le : <?php echo $suggestion->date_suggest; ?></cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>




    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une suggestion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
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
                            <textarea class="form-control" name="textSuggest" id="suggestion"></textarea>
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="AjoutSuggest" class="btn btn-primary" id="btnAddProductExecute">Ajouter</button>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>

<br><br><br>
<br><br><br><br><br>
<?php
      include '../Includes/Footer.php';
    ?>
</body>

</html>