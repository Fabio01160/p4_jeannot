<?php
namespace App\Controller\Admin;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

/**
 * Class CommentsController
 * Management of the admin for the comments
 */
class CommentsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Comment');
    }

    /**
     * Get the list of categories and send it to the view "admin.comments.index"
     * @param  string $success
     */
    public function index($success = '')
    {
        $comments = $this->Comment->getAll();
        $this->render('admin.comments.index', compact('comments', 'success'));
    }

    /**
     * Edit of a comment
     */
    public function edit()
    {
        $error = false;
        if (!empty($_POST)) {
            if (!$this->strictEmpty($_POST['pseudo']) && !$this->strictEmpty($_POST['content'])) {
                $result = $this->Comment->update($_GET['id'], ['pseudo' => $_POST['pseudo'], 'content' => $_POST['content'], 'signal_count' => $_POST['signal_count'], 'date' => date('Y-m-d H:i:s')]);
                if ($result) {
                  return $this->index($success = 'edit');
                }
            }
            $error = true;
        }
        $comment = $this->Comment->find($_GET['id']);
        if ($comment === false) {
            $this->notFound();
        }
        $form = new BootstrapForm($comment);
        $this->render('admin.comments.edit', compact('comments', 'form', 'error'));
    }

    /**
     * Delete a comment
     */
    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
            return $this->index($success = 'delete');
        }
    }
}
