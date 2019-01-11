<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap core CSS -->
    <link href="http://fr.allfont.net/allfont.css?fonts=little-days-alt" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Myeongjo:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Erreur</title>

  </head>

  <body>
    <div class="header" id="header-perso">
        <div class="top-header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-faded">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="index.php"><i class="fas fa-home"></i> Accueil</a>
                  <?php
                      if (!isset($_SESSION['auth'])) {
                          echo '<a class="nav-item nav-link" href="index.php?p=users.login"> <i class="fas fa-sign-in-alt"></i> Connexion</a>';
                      } else {
                          echo '<a class="nav-item nav-link" href="index.php?p=admin.posts.index"><i class="fas fa-cogs"></i> Admin</a>';
                      }
                   ?>
                </div>
              </div>
            </nav>
          </div>
        </div>
    </div>
    <div class="container">
      <div class="starter-template" style="padding-top: 100px">
        <?= $content ?>
      </div>
      <footer class="flex justify-space-between" style="padding-top: 50px;">
        <div class="mentions">
          <a href="#">Mentions légales</a>
        </div>
        <div class="contact">
          @contact: jeanForteroche@yahoo.fr
        </div>
      </footer>
    </div><!-- /.container -->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
