<?php
namespace Core;

/**
* Class Autoloader
* Dynamic load of a class
*/
class Autoloader
{

    /**
     * Save the autoloader
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
    * Includes the file related to the class
    * @param string $class Name of the class to load
    */
    static function autoload($class)
    {
        // Only if IN the namespace
        if (strpos($class, __NAMESPACE__ .  '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\','', $class);
            $class = str_replace('\\','/', $class);
            $classPath = __DIR__ . '/' . $class . '.php';
            if (!file_exists($classPath)) {
                header('HTTP/1.0 404 Not Found');
                exit();
            }
            require $classPath;
        }
    }
}
