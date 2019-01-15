<?php if ($error): ?>
  <div class="alert alert-danger">
      <i class="fas fa-exclamation-triangle"></i> Un des champs n'est pas rempli convenablement.
  </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('title', 'Titre du roman'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
<br>
<a class="btn btn-warning back-btn" href="?p=admin.categories.index"><i class="fas fa-arrow-left"></i> Retour</a>
