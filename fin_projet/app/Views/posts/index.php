<main role="main">
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
      <h1 id="mainTitle">Billet simple pour l'Alaska</h1>
      <q id="mainSubTitle">Le roman de Jean Forteroche qui vous donne la parole !</q>
      <br><br>
      <a class="btn btn-primary btn-lg" href="#truc" role="button">Derniers chapitres publiés &raquo;</a>
  </div>
</main>

<section>

<div class="container">

<h1 id="truc" class="pageTitle">Derniers chapitres publiés</h2>
  <div class="row"> 
      <?php foreach($posts as $post): ?>
      <div class="card-deck col-md-6"> 
        <div class="card-body">
          <h2 class="card-title"> <a href="<?= htmlspecialchars($post->url); ?>">
          <?= htmlspecialchars($post->title); ?></a></h2>
            <div class="card-title">
              <p><em><?= htmlspecialchars($post->category); ?></em></p>
              <p><?= htmlspecialchars($post->date); ?></p>
              <p><a class="btn btn-success" href="<?= htmlspecialchars($post->url); ?>" role="button">Lire ce chapitre &raquo;</a></p>
            </div>
          </div>
      </div>    
      <?php endforeach; ?>
  </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <h2 class="test center" id="who-title">Biographie</h2>
        <div class="row">
            <div class= "col-sm-9">
              <h3>Le bio à Jeannot</h3>
              <p>En vous souhaitant une agréable lecture, votre écrivain dévoué.</p>
              <p>Le Jeannot</p>
            </div>
        </div>
    </div>
</div>

</section>



