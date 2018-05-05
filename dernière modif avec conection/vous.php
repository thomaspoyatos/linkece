<?php
  //Récupération des variables de la session
  session_start();

  //Accès à la base de données
  try{$bdd = new PDO('mysql:host=localhost;dbname=linkece', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));}
  catch(Exception $e){die('Erreur :'.$e->getMessage());}

if (isset($_POST['savenewnom'])) 
  {
    $newnom = $_POST['newnom'];
    
    $req = $bdd->prepare('UPDATE membres SET nom =:new WHERE id = :id_session');
    $req->execute(array(':new'=>$newnom,
              ':id_session'=>$_SESSION['id'])); 
  }



if (isset($_POST['savenewinfo'])) 
  {
    $newinfo = $_POST['newinfo'];
    
    $req = $bdd->prepare('UPDATE membres SET info =:new WHERE id = :id_session');
    $req->execute(array(':new'=>$newinfo,
              ':id_session'=>$_SESSION['id'])); 
  }

if (isset($_POST['savenewparcours1'])) 
  {
    $newparcours1 = $_POST['newparcours1'];
    
    $req = $bdd->prepare('UPDATE membres SET parcours1 =:new WHERE id = :id_session');
    $req->execute(array(':new'=>$newparcours1,
              ':id_session'=>$_SESSION['id'])); 
  }

if (isset($_POST['savenewparcours2'])) 
  {
    $newparcours2 = $_POST['newparcours2'];
    
    $req = $bdd->prepare('UPDATE membres SET parcours2 =:new WHERE id = :id_session');
    $req->execute(array(':new'=>$newparcours2,
              ':id_session'=>$_SESSION['id'])); 
  }

if (isset($_POST['savenewparcours3'])) 
  {
    $newparcours3 = $_POST['newparcours3'];
    
    $req = $bdd->prepare('UPDATE membres SET parcours3 =:new WHERE id = :id_session');
    $req->execute(array(':new'=>$newparcours3,
              ':id_session'=>$_SESSION['id'])); 
  }




?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>LinkECE</title>

    <!-- Bootstrap core CSS -->
    <link href="1.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/LinkECE/presentation.html">LinkECE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Accueil/accueil.html">Accueil<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Vous<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="reseau.php">Mon Réseau<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Notifications/notifications.html">Notifications<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Emplois/emplois.html">Emplois<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Photos/photos.html">Photos<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="message.php">Messagerie<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <a class="btn btn-outline-success my-2 my-sm-0" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Debut/debut.html" role="button">Deconnexion</a>
        </form>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="py-5 text-center">
      <?php
        //On récupère les données de l'utilisateur
        $req = $bdd->prepare('SELECT * FROM membres WHERE id=:id_session');
        $req->execute(array(':id_session'=>$_SESSION['id']));
        
        $user = $req->fetch();  
      ?>
        <img class="d-block mx-auto mb-4" src="file:///Users/hugobendejac/Desktop/Projet%20piscine/Profil/Image.jpg" alt="" width="200" height="200">
        <h3 class="police"> Nom : 
          <?php 
            if (isset($_POST['changenom'])) 
            {?>
              <form action="vous.php" method="post">
                  <textarea name="newnom" rows="3" cols="80"></textarea>
                  <input type="submit" name="savenewnom" value="Sauvegarder">
              </form> 
            <?php 
            } else {
              echo $user['nom'];
            }
            ?>
        </h3>
        <form action="vous.php" method="post">
          <button class="d-block text-right mt-3" name="changenom" type="submit">Modifier</a>
        </form>
      </div>
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Informations Générales: </h6>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <?php 
            if (isset($_POST['changeinfo'])) 
            {?>
              <form action="vous.php" method="post">
                  <textarea name="newinfo" rows="3" cols="80"></textarea>
                  <input type="submit" name="savenewinfo" value="Sauvegarder">
              </form> 
            <?php 
            } else {
              echo $user['info'];
            }
            ?></p>
        </div>
        <form action="vous.php" method="post">
          <button class="d-block text-right mt-3" name="changeinfo" type="submit">Modifier</a>
        </form>
      </div>
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Parcours</h6>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block">
              <?php 
              if (isset($_POST['changeparcours1'])) 
              {?>
                <form action="vous.php" method="post">
                    <textarea name="newparcours1" rows="3" cols="80"></textarea>
                    <input type="submit" name="savenewparcours1" value="Sauvegarder">
                </form> 
              <?php 
              } else {
                echo $user['parcours1'];
              }
              ?></p>
            </span>
          </div>
          <form action="vous.php" method="post">
          <button class="d-block text-right mt-3" name="changeparcours1" type="submit">Modifier</a>
        </form>
        </div>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block">
              <?php 
              if (isset($_POST['changeparcours2'])) 
              {?>
                <form action="vous.php" method="post">
                    <textarea name="newparcours2" rows="3" cols="80"></textarea>
                    <input type="submit" name="savenewparcours2" value="Sauvegarder">
                </form> 
              <?php 
              } else {
                echo $user['parcours2'];
              }
              ?></p>
            </span>
          </div>
          <form action="vous.php" method="post">
           <button class="d-block text-right mt-3" name="changeparcours2" type="submit">Modifier</a>
        </form>
        </div>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block">
              <?php 
              if (isset($_POST['changeparcours3'])) 
              {?>
                <form action="vous.php" method="post">
                    <textarea name="newparcours3" rows="3" cols="80"></textarea>
                    <input type="submit" name="savenewparcours3" value="Sauvegarder">
                </form> 
              <?php 
              } else {
                echo $user['parcours3'];
              }
              ?></p>
            </span>
          </div>
          <form action="vous.php" method="post">
           <button class="d-block text-right mt-3" name="changeparcours3" type="submit">Modifier</a>
        </form>
        </div>
        
      </div>
    </main>


    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>