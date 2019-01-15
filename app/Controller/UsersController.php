<?php

namespace App\Controller;

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;
use \App;

/**
 * Class UsersController
 * Management of the the users
 */
class UsersController extends AppController
{
    /**
     * User connexion
     */
    public function login()
    {
        $errors = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('Location: index.php?p=admin.posts.index');
            } else {
                $errors = true;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }
}
