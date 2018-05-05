<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Connexion à LinkECE</title>

    <!-- Bootstrap core CSS -->
    <link href="1.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="connexion.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="2.php">
      <img class="mb-4" src="iconmonstr-linkedin-3.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Connexion à LinkECE</h1>
      <label for="inputEmail" class="sr-only">Adresse Mail</label>
      <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Adresse mail" required autofocus>
      <label for="inputPassword" class="sr-only">Mot de Passe</label>
      <input type="password" id="inputPassword" name="mdp" class="form-control" placeholder="Mot de passe" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Se Souvenir
        </label>
      </div>
       <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Connexion</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018, LinkECE</p>
    </form>
  </body>
</html>