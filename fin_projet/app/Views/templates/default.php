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
    <title><?= App::getInstance()->title; ?></title>
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-item nav-link" href="index.php"><i class="fas fa-home"></i> Accueil</a>
            </li>
            <li class="nav-item">
              <?php
                if (!isset($_SESSION['auth'])) {
                    echo '<a class="nav-item nav-link" href="index.php?p=users.login"> <i class="fas fa-sign-in-alt"></i> Connexion</a>';
                } else {
                    echo '<a class="nav-item nav-link" href="index.php?p=admin.posts.index"><i class="fas fa-cogs"></i> Admin</a>';
                }
              ?>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Romans</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <?php foreach($categories as $category): ?>
                    <a class="dropdown-item" href="<?= htmlspecialchars($category->url); ?>"><?= htmlspecialchars($category->title); ?></a>              
                  <?php endforeach; ?>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tous les chapitres</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <?php foreach($posts as $post): ?>
                    <a class="dropdown-item" href="<?= htmlspecialchars($post->url); ?>"><?= htmlspecialchars($post->title); ?></a>            
                  <?php endforeach; ?>
                </div>
            </li>
          </div>
      </nav>

    <div class="container">

      <div class="starter-template" style="padding-top: 10%">
        <?= $content ?>
      </div>
      <footer class="flex justify-space-between" style="padding-top: 50px;">
        <div class="mentions">
          <a href="#">Mentions légales</a>
        </div>

          <div class="contact">
          Cont@ct: jeannotlabroche@gmail.com
        </div>
      </footer>
    </div>

    <!-- /.container -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
