<?php

use Core\Config;
use Core\Database\MysqlDatabase;

/**
 * Class App
 * Management of our application's function
 */
class App
{
    /**
     * @var string
     */
    public $title = 'Forteroche blog';
    /**
     * @var object
     */
    private $db_instance;
    /**
     * @var object
     */
    private static $_instance;

    /**
     * Get the instance
     * @return object
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    /**
     * Initialisation of the session and of the autoloader
     * @return [type] [description]
     */
    public static function load()
    {
      session_start();
      require ROOT . '/app/Autoloader.php';
      App\Autoloader::register();
      require ROOT . '/core/Autoloader.php';
      Core\Autoloader::register();
    }

    /**
     * Factory to create a new object with a connexion to the database.
     * @param  string $name
     * @return object
     */
    public function getTable($name)
    {
        $class_name = '\\App\\Model\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    /**
     * Connexion to the database
     * @return object
     */
    public function getDb()
    {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if (is_null($this->db_instance)) {
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }
}
