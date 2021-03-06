<?php
namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

/**
 * Class PostsController
 * Management of the posts
 */
class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }

    /**
     * Get the list of categories and send it to the view "post.index"
     */
    public function index()
    {
        $posts = $this->Post->last();
        $categories = $this->Category->getAll();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    /**
     * Get the category linked to the id and send it to the "view post.category"
     */
    public function category()
    {
        $posts = $this->Post->getAll();
        $category = $this->Category->find($_GET['id']);
        if ($category === false) {
            $this->notFound();
        }
        $articles = $this->Post->firstByCategory($_GET['id']);
        if ($articles === false) {
            $this->notFound();
        }
        $categories = $this->Category->getAll();
        $this->render('posts.category', compact('articles', 'posts', 'categories', 'category'));
    }

    /**
     * Get the post thanks to its id and send them to the view "post.comment"
     */
    public function comment()
    {
        $posts = $this->Post->getAll();
        $comment = $this->Comment->find($_GET['id']);
        if ($comment === false) {
            $this->notFound();
        }
        $this->render('posts.comment', compact('comment', 'posts'));
    }

    /**
     * Add a comment
     */
    public function addComment()
    {
        $state = '';
        $id = $_GET['id'];
        if (!empty($_POST)) {
            if (!$this->strictEmpty($_POST['pseudo']) && !$this->strictEmpty($_POST['content'])) {
                $result = $this->Comment->create(['pseudo' => $_POST['pseudo'], 'content' => $_POST['content'], 'date' => date('Y-m-d H:i:s'), 'post_id' => $_GET['id']]);
                if ($result) {
                    $state = 'success';
                    header('Location: index.php?p=posts.show&id=' . $_GET['id'] . '&state=' . $state);
                }
            } else {
                $state = 'error';
                header('Location: index.php?p=posts.show&id=' . $_GET['id'] . '&state=' . $state);
            }
        }
    }

    /**
     * Report a comment
     */
    public function reportComment()
    {
        if (!isset($_SESSION['report'])) {
            $_SESSION['report'] = [];
        }
        // Only 3 reports by session and only by comment
        if (count($_SESSION['report']) < 3 && !in_array($_GET['id'], $_SESSION['report'])) {
            $countObject = $this->Comment->findCount($_GET['id']);
            $count = (int)$countObject->signal_count;
            $result = $this->Comment->update($_GET['id'], ['signal_count' => $count + 1]);
            if ($result) {
                array_push($_SESSION['report'], $_GET['id']);
            }
        } else {
            // Nothing to do
        }
        header('Location: index.php?p=posts.show&id=' . $_GET['post_id']);
    }

    /**
     * Get the post thanks to its id and send it to the "view post.show"
     */
    public function show()
    {
        $posts = $this->Post->last();
        $categories = $this->Category->getAll();
        $article = $this->Post->findWithCategory($_GET['id']);
        if ($article === false) {
            $this->notFound();
        }
        $comments = $this->Comment->lastByComments($_GET['id']);
        if ($comments === false) {
            $this->notFound();
        }
        $previous = $this->Post->previous($_GET['id']);
        $next = $this->Post->next($_GET['id']);
        $links;
        $form = new BootstrapForm($_POST);
        if (!$previous && !$next) {
            $this->render('posts.show', compact('article', 'comments', 'form','posts','categories'));
        } elseif (!$previous) {
            $this->render('posts.show', compact('article', 'comments', 'next', 'links', 'form','posts','categories'));
        } elseif (!$next) {
            $this->render('posts.show', compact('article', 'comments', 'previous', 'links', 'form','posts','categories'));
        } else {
            $this->render('posts.show', compact('article', 'comments', 'previous', 'next', 'links', 'form','posts','categories'));
        }
    }
}
