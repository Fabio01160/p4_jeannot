<?php
if (isset($_GET['state'])) {
    if ($_GET['state'] === 'success') {
        echo '<div class="alert alert-success">
            <i class="fas fa-check"></i>  Commentaire ajouté avec succès
        </div>';
    }
    if ($_GET['state'] === 'error') {
        echo '<div class="alert alert-danger">
            <i class="fas fa-check"></i> Afin de pouvoir poster votre commentaire, veuillez remplir (correctement) chaque champ
        </div>';
    }
}
?>

<div class="links-nav">
    <?php
    if (!isset($previous) && !isset($next)) {
        // Nothing displayed
    } else {
        if (!isset($previous)) {
        $links = '<div class="flex navPost justify-end"><div class="flex nextPost"><a href="?p=posts.show&id=' . htmlspecialchars($next->id) . '">' . htmlspecialchars($next->title) . ' <i class="fas fa-arrow-right"></i></a></div></div>';
      } elseif (!isset($next)) {
          $links = '<div class="flex navPost justify-space-between"><div class="flex prevPost"><a href="?p=posts.show&id=' . htmlspecialchars($previous->id) . '"><i class="fas fa-arrow-left"></i> ' . htmlspecialchars($previous->title) . '</a></div></div>';
      } else {
          $links = '<div class="flex navPost justify-space-between"><div class=""><a href="?p=posts.show&id=' . htmlspecialchars($previous->id) . '"><i class="fas fa-arrow-left"></i> ' . htmlspecialchars($previous->title) . '</a></div> <div class="flex nextPost"><a href="?p=posts.show&id=' . htmlspecialchars($next->id) . '">' . htmlspecialchars($next->title) . ' <i class="fas fa-arrow-right"></i></a></div></div>';
    }
    echo $links;
  }
    ?>

</div>
<br>
<h1 class="pageTitle"><?= htmlspecialchars($article->title); ?></h1>
<p><em><?= htmlspecialchars($article->category); ?></em></p>
<br>
<div class="chapitre"><?= $article->content; ?></div>
<br>
<hr>
<?php if (isset($_SESSION['auth'])): ?>
    <a class="btn btn-warning back-btn" href="?p=admin.posts.index"><i class="fas fa-cog"></i> Administration</a>
<?php endif; ?>

<h2 class="commentTitle">Commentaires</h2>
<br>
<ul>
<?php foreach($comments as $comment): ?>
    <li>
        <p><em><i class="fas fa-user"></i> <?= htmlspecialchars($comment->pseudo); ?></em> le <?= htmlspecialchars($comment->date); ?>
        <?php
        if (isset($_SESSION['report'])) {
            if (count($_SESSION['report']) < 3) {
                if (!in_array($comment->id, $_SESSION['report'])) {
                    echo '<span class="report"><a href="?p=posts.reportComment&id=' . htmlspecialchars($comment->id) . '&post_id=' . htmlspecialchars($article->id) . '">Signaler <i class="fas fa-exclamation-circle"></i></a></span></p>';
                } else {
                  // Nothing done
                }
            } else {
                // Nothing done
            }
        } else {
            echo '<span class="report"><a href="?p=posts.reportComment&id=' . htmlspecialchars($comment->id) . '&post_id=' . htmlspecialchars($article->id) . '">Signaler <i class="fas fa-exclamation-circle"></i></a></span></p>';
        }

        ?>
        <p class="commentContent"><?= htmlspecialchars($comment->content); ?></p>
    </li>
    <br>
<?php endforeach; ?>
</ul>

<h2 class="commentTitle">Je poste un commentaire ! </h2>
<br>
<div class="offset-md-2 col-md-8">
<form action="?p=posts.addComment&id=<?= htmlspecialchars($article->id); ?>" method="post">
    <?= $form->input('pseudo', 'Pseudo'); ?>
    <?= $form->input('content', 'Commentaire', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>
</div>
