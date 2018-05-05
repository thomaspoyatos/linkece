<?php
  //Récupération des variables de la session
  session_start();

  //Accès à la base de données
  try{$bdd = new PDO('mysql:host=localhost;dbname=linkece', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));}
  catch(Exception $e){die('Erreur :'.$e->getMessage());}
  
  if (isset($_POST['voirprofile'])) 
  { 
    $friend_id = $_POST['voirprofile'];
    
    $req3 = $bdd->prepare('UPDATE user SET friends = :id_found WHERE id = :id_session');
    $req3->execute(array('id_found' => $friend_id,
               'id_session' => $_SESSION['id'])); 
    
    header("Location:friendprofile.php");
  } 
  
   // Ajouter cette nouvelle amitié dans la BDD
  if (isset($_POST['addfriend'])) 
  { 
    $req = $bdd->prepare('SELECT * FROM user WHERE id=:id_session');
    $req->execute(array(':id_session'=>$_SESSION['id']));
    
    $user = $req->fetch();
    
    $req2 = $bdd->prepare('INSERT INTO friendship(id_friend1, id_friend2) 
                    VALUES(:id_friend1, :id_friend2)');             
    $req2->execute(array('id_friend1' => $user['friends'],
               'id_friend2' => $_SESSION['id']));
               
    $req3 = $bdd->prepare('SELECT * FROM user WHERE id=:id_friend');
    $req3->execute(array('id_friend' => $user['friends'])); 
            
    $friend = $req3->fetch();
    ?>
    
    <div class="alert alert-success alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Bravo !</strong> Vous êtes maintenant ami avec <strong><?php echo $friend['firstname']; ?> <?php echo $friend['lastname']; ?></strong>
    </div>
    <?php
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
    <link href="offcanvas.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand mr-auto mr-lg-0" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/LinkECE/presentation.html">LinkECE</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Accueil/accueil.html">Accueil<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="vous.php">Vous<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Mon Réseau<span class="sr-only">(current)</span></a>
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
        <form class="form-inline mt-2 mt-md-0" action="reseau.php" method="post">
          <input class="form-control mr-sm-2" type="text" name="chercherami" placeholder="Chercher un ami" aria-label="Search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit" name="chercher">Chercher</button>
          </div>
          <p>
          <a class="btn btn-outline-success my-2 my-sm-0" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Debut/debut.html" role="button">Deconnexion</a></p>
        </form>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded box-shadow">
        <?php
        //On récupère les données de l'utilisateur
        $req = $bdd->prepare('SELECT * FROM membres WHERE id=:id_session');
        $req->execute(array(':id_session'=>$_SESSION['id']));
        
        $user = $req->fetch();
        ?>
        <img class="mr-3" src="iconmonstr-linkedin-3.svg" alt="" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">LinkECE</h6>
          <small>Depuis 2011</small>
        </div>
      </div>

      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Liste D'Amis</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <?php
        // On récupère tout le contenu de la table
            $req = $bdd->prepare('SELECT * FROM amis WHERE id_ami1=:id_session OR id_ami2=:id_session');
            $req->execute(array('id_session' => $_SESSION['id']));    

        // On affiche chaque entrée une à une
        
            while ($amitie = $req->fetch())
            {
              if($amitie['id_ami1'] == $_SESSION['id'])
              { 
                $req2 = $bdd->prepare('SELECT * FROM membres WHERE id=:id_ami2');
                $req2->execute(array('id_ami2' => $amitie['id_ami2'])); 
            
                $friend = $req2->fetch();
              } else {
                $req3 = $bdd->prepare('SELECT * FROM membres WHERE id=:id_ami1');
                $req3->execute(array('id_ami1' => $amitie['id_ami1'])); 
            
                $friend = $req3->fetch();
              }
            }


          
        ?>
          </p>
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
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>