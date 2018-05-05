<?php
  //Récupération des variables de la session
  session_start();

  //Accès à la base de données
  try{$bdd = new PDO('mysql:host=localhost;dbname=linkece', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));}
  catch(Exception $e){die('Erreur :'.$e->getMessage());}
  
  if(isset($_POST['envoyer']))
  {
    $req = $bdd->prepare('SELECT * FROM membres WHERE id=:id_session');
    $req->execute(array(':id_session'=>$_SESSION['id']));
    
    $user = $req->fetch();  
    
    $req2 = $bdd->prepare('SELECT * FROM membres WHERE id=:id_friends');
    $req2->execute(array(':id_friends'=>$user['ami']));
    
    $ami = $req2->fetch();
        
    $destinataire=$ami['id'];
    
    $contenu=$_POST['contenu'];
    $req = $bdd->prepare('INSERT INTO message(contenu, expediteur, destinataire) 
                                     VALUES (:contenu, :expediteur, :destinataire)');
        
    $req->execute(array('contenu' => $contenu,
                            'expediteur' => $_SESSION['id'],
              'destinataire' => $destinataire)); 
    ?>
    <div class="alert alert-info alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      Vous avez envoyé un message à  <strong><?php echo $ami['nom']; ?> </strong>
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
            <a class="nav-link" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Profil/vous.html">Vous<span class="sr-only">(current)</span></a>
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
            <a class="nav-link" href="#">Messagerie<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <a class="btn btn-outline-success my-2 my-sm-0" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Debut/debut.html" role="button">Deconnexion</a>
        </form>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded box-shadow">
        <img class="mr-3" src="iconmonstr-linkedin-3.svg" alt="" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">LinkECE</h6>
          <small>Depuis 2011</small>
        </div>
      </div>
      <div class="col-sm-3 container-fluid text-center">
      
        <div class="hero-left">
<br/><br/> 
        <?php
        //On récupère les données de l'utilisateur        
        
        $req = $bdd->prepare('SELECT * FROM membres WHERE id=:id_session');
        $req->execute(array(':id_session'=>$_SESSION['id']));
        
        $user = $req->fetch();  
        
        $req2 = $bdd->prepare('SELECT * FROM membres WHERE id=:id_friends');
        $req2->execute(array(':id_friends'=>$user['ami']));
        
        $ami = $req2->fetch();
        ?>          
          
        </div>
      </div>  
      
      <!-- Deuxième colonne (6 longueurs) -->
      <div class="col-sm-6 container-fluid"> 
      <div class="center-co">
      <h2 class="police"><center>Envoyer un message</center <h2>
      <p>
      <center>
      <form action="messageamis.php" method="post">
        <input type="text" name="contenu" rows="6" cols="40">
        <input class="btn btn-sucess" type="submit" name="envoyer" value="Envoyer Message">
      </form>
      </center>
      </p>
      
      
      
      </div>
      </div>

