<?php
namespace App\Controller;

use Core\Controller\Controller;
use \App;

/**
 * Class AppController
 * Specific class for this application
 */
class AppController extends Controller
{
    /**
     * @var string
     */
    protected $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    /**
     * Load the table model
     * @param  string $model_name
     */
    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }
}
