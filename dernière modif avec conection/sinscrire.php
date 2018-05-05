<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>S'inscrire à LinkECE</title>

    <!-- Bootstrap core CSS -->
    <link href="1.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="forme.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="iconmonstr-linkedin-3.svg" alt="" width="72" height="72">
        <h2>Inscription</h2>
        <p class="lead">Distinguez vous professionnelement. N'hésitez pas à vous inscrire, c'est gratuit!.</p>
      </div>

       

          
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Informations générales</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nom</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Un nom valide est demandé.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Prénom</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Un nom valide est demandé.
                </div>
              </div>
            </div>

            

            <div class="mb-3">
              <label for="email">Mail <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="vous@example.com">
              <div class="invalid-feedback">
                 Entrez s'il vous plait un mail valide.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Adresse</label>
              <input type="text" class="form-control" id="address" placeholder="1550 Chemin du puit" required>
              <div class="invalid-feedback">
                Entrez s'il vous plait une adresse valide.
              </div>
            </div>

            

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Pays</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choississez...</option>
                  <option>France</option>
                </select>
                <div class="invalid-feedback">
                  Selectionnez s'il vous plait un pays valide.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Departement</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choississez...</option>
                  <option>Ile de France</option>
                </select>
                <div class="invalid-feedback">
                  Selectionnez s'il vous plait un pays valide.
                </div>
              </div>
              
            
            <hr class="mb-4">
            <a  class="btn btn-primary btn-lg btn-block" href="file:///Users/hugobendejac/Desktop/Projet%20piscine/Profil/vous.html" role="button">Continuer</a>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 LinkECE</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>