<?php 
  include '../Model/AffichageEvents.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Public/Style/Home.css">
  <link rel="stylesheet" href="../Public/Style/Home_events.css">
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
  <title>Page d'accueil</title>
</head>

<body>
    <?php 
            include '../Includes/HeaderMembre.php';
    ?> 

  <div class="container one">
    <div class="row">
      <div class="col-sm">
        <h1>Créez votre événement de club, informez les Youcoders pour qu’ils puisssent participer. </h1>
        <div>
          Saisissez votre email pour recevoir nos évenements actuels
        </div>
        <div class="btn-toolbar mb-3 adj" role="toolbar" aria-label="Toolbar with button groups">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text" id="btnGroupAddon">@</div>
            </div>
            <input type="text" class="form-control" placeholder="Entrez votre email" aria-label="Input group example"
              aria-describedby="btnGroupAddon">
          </div>
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-primary">Recevoir</button>
          </div>
        </div>
      </div>
      <div class="col-sm">
        <img src="../Public/Images/pic1.png" class="pic1" alt="png">
        </img>
      </div>
      
    
      <section class="Part_event">
        <div class="space"></div>
        <h2> Liste des événements à venir </h2>
        
          <div class="space"></div>
            <div class="evenements">
                <?php
                    foreach ($rows4 as $row) {
                ?>
                <div class="evenement">
                    <div class="photoEvent" style="background-image: url('../Public/Images_event/<?php echo $row->photo_event ?>');">
                  
                  </div>
                     
                  <p id="desc"> <?php echo $row->description_event ?></p>
                    <div class="infosEvent"> 
                        <h5> <?php echo $row->date_event ?> </h5>
                        <p> <?php echo $row->nom_event ?><br> <span>~Club <?php echo $row->nom_club?></span></p>
                        <?php $_SESSION['desc']= $row->description_event ?>
                    </div>
                    
                </div>
                <?php } ?>
            </div>
        </section>
      </div>
    </div>
    <div class="container two" style="background-color: #E8EFF6;">
        <div class="row">
          <div class="col-sm">
            <img src="../Public/Images/pic2.png" class="pic1" alt="png">
            </img>
            <p>Connectez vous selon le rôle qui vous avez (Apprenants, Staff, Comité de club).</p>
          </div>
          <div class="col-sm">
            <svg width="67" height="67" viewBox="0 0 63 84" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M31.0349 83.9121C39.2659 83.9121 47.1597 79.4918 52.9799 71.6235C58.8001 63.7552 62.0698 53.0835 62.0698 41.9561C62.0698 30.8286 58.8001 20.1569 52.9799 12.2886C47.1597 4.42036 39.2659 0 31.0349 0C22.8039 0 14.9101 4.42036 9.08992 12.2886C3.26974 20.1569 0 30.8286 0 41.9561C0 53.0835 3.26974 63.7552 9.08992 71.6235C14.9101 79.4918 22.8039 83.9121 31.0349 83.9121ZM45.4157 38.2482L33.7776 22.5147C33.046 21.5593 32.066 21.0307 31.0489 21.0427C30.0317 21.0546 29.0587 21.6062 28.3395 22.5786C27.6202 23.5509 27.2122 24.8663 27.2034 26.2414C27.1945 27.6165 27.5855 28.9413 28.2922 29.9304L33.3082 36.7115H19.3968C18.3679 36.7115 17.3812 37.2641 16.6537 38.2476C15.9262 39.2312 15.5175 40.5651 15.5175 41.9561C15.5175 43.347 15.9262 44.6809 16.6537 45.6645C17.3812 46.648 18.3679 47.2006 19.3968 47.2006H33.3082L28.2922 53.9817C27.9217 54.4655 27.6261 55.0442 27.4228 55.6841C27.2195 56.3239 27.1125 57.0121 27.108 57.7085C27.1035 58.4048 27.2017 59.0954 27.3968 59.7399C27.5918 60.3845 27.8799 60.97 28.2441 61.4624C28.6084 61.9549 29.0415 62.3443 29.5183 62.608C29.995 62.8717 30.5058 63.0044 31.021 62.9983C31.536 62.9923 32.0451 62.8476 32.5184 62.5727C32.9917 62.2979 33.4198 61.8983 33.7776 61.3974L45.4157 45.6639C46.143 44.6804 46.5515 43.3467 46.5515 41.9561C46.5515 40.5654 46.143 39.2317 45.4157 38.2482Z"
                fill="#008AFF" />
            </svg>
          </div>
          <div class="col-sm">
            <img src="../Public/Images/pic3.png" class="pic1" alt="png">
            </img>
            <p>Bénéficiez des fonctionnalités disponibles: Organiser des activités, Consulter les événements passés , Poster des
              suggestions ...</p>
          </div>
          <div class="col-sm">
            <svg width="67" height="67" viewBox="0 0 63 84" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M31.0349 83.9121C39.2659 83.9121 47.1597 79.4918 52.9799 71.6235C58.8001 63.7552 62.0698 53.0835 62.0698 41.9561C62.0698 30.8286 58.8001 20.1569 52.9799 12.2886C47.1597 4.42036 39.2659 0 31.0349 0C22.8039 0 14.9101 4.42036 9.08992 12.2886C3.26974 20.1569 0 30.8286 0 41.9561C0 53.0835 3.26974 63.7552 9.08992 71.6235C14.9101 79.4918 22.8039 83.9121 31.0349 83.9121ZM45.4157 38.2482L33.7776 22.5147C33.046 21.5593 32.066 21.0307 31.0489 21.0427C30.0317 21.0546 29.0587 21.6062 28.3395 22.5786C27.6202 23.5509 27.2122 24.8663 27.2034 26.2414C27.1945 27.6165 27.5855 28.9413 28.2922 29.9304L33.3082 36.7115H19.3968C18.3679 36.7115 17.3812 37.2641 16.6537 38.2476C15.9262 39.2312 15.5175 40.5651 15.5175 41.9561C15.5175 43.347 15.9262 44.6809 16.6537 45.6645C17.3812 46.648 18.3679 47.2006 19.3968 47.2006H33.3082L28.2922 53.9817C27.9217 54.4655 27.6261 55.0442 27.4228 55.6841C27.2195 56.3239 27.1125 57.0121 27.108 57.7085C27.1035 58.4048 27.2017 59.0954 27.3968 59.7399C27.5918 60.3845 27.8799 60.97 28.2441 61.4624C28.6084 61.9549 29.0415 62.3443 29.5183 62.608C29.995 62.8717 30.5058 63.0044 31.021 62.9983C31.536 62.9923 32.0451 62.8476 32.5184 62.5727C32.9917 62.2979 33.4198 61.8983 33.7776 61.3974L45.4157 45.6639C46.143 44.6804 46.5515 43.3467 46.5515 41.9561C46.5515 40.5654 46.143 39.2317 45.4157 38.2482Z"
                fill="#008AFF" />
            </svg>
          </div>
          <div class="col-sm">
            <img src="../Public/Images/pic4.png" class="pic1" alt="png">
            </img>
            <p>Navigez en tout comfort, et amusez vous dans votre monde d’apprentissage.</p>
          </div>
        </div>
      </div>
      <br><br>



    <script>

    </script>
      

      <!-- this is the footer  -->
     
    <?php
      include '../Includes/Footer.php';
    ?>
</body>

</html>