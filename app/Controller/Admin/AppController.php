<?php
// Specific class for this application
namespace App\Controller\Admin;

use \App;
use \Core\Auth\DBAuth;

/**
 * Class AppController
 * Administration class
 */
class AppController extends \App\Controller\AppController
{
    /**
     * @var int
     */
    protected $template = 'admin';

    public function __construct()
    {
        parent::__construct();
        // Authentication
        $app = App::getInstance();
        $auth = new DBAuth(App::getInstance()->getDB());
        if (!$auth->logged()) {
            $this->forbidden();
        }
    }

    /**
     * Destroy the session and send the user to the "index" page
     */
    public function logOut()
    {
        session_start();
        session_destroy();
        header('location: index.php');
    }
}
