

<?php if ($errors): ?>
  <div class="alert alert-danger">
      <i class="fas fa-exclamation-triangle"></i>  Identifiants incorrects
  </div>
<?php endif; ?>

<form class="form-horizontal col-md-12" method="post">
    <h1>Bienvenue Monsieur FORTEROCHE</h1>
    <br>
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <?= $form->input('username', 'Votre identifiant'); ?>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <?= $form->input('password', 'Votre mot de passe', ['type' => 'password']); ?>
        </div>
    </div>

    <button class="btn btn-primary">Se connecter</button>
</form>
