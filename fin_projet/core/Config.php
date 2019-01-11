<?php
namespace Core;

/**
 * Class Config Manage the application's config
 */
class Config
{
    /**
     * @var array
     */
    private $_settings = [];
    /**
     * @var object
     */
    private static $_instance;

    /**
     * Instance of the class
     * @param  string $file
     * @return object $_instance
     */
    public static function getInstance($file)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    /**
     * Get the 'config.php' file
     * @param string $file
     */
    public function __construct($file)
    {
        $this->_settings = require($file);
    }

    /**
     * Get the value of the instance
     * @param  string $key
     * @return string
     */
    public function get($key)
    {
        if (!isset($this->_settings[$key])) {
            return null;
        }
        return $this->_settings[$key];
    }
}
