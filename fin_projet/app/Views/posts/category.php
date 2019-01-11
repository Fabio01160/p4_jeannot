<h1 class="pageTitle"><?= $category->title ?></h1>
<div class="row">
    <div class="offset-md-1 col-md-10">
        <ul class="list-group list-group-flush">
        <?php foreach($articles as $post): ?>
            <li class="list-group-item list-group-item-light">
                <h2><a href="<?= htmlspecialchars($post->url); ?>" class="list-group-item list-group-item-action list-group-item-primary"><?= htmlspecialchars($post->title); ?></a></h2>
            </li>
        <?php endforeach; ?>
        </ul>
        <?php if (isset($_SESSION['auth'])): ?>
            <a class="btn btn-warning back-btn" href="?p=admin.categories.index"><i class="fas fa-cog"></i> Administration</a>
        <?php endif; ?>
    </div>
</div>
