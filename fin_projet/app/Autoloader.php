<?php
namespace App;

use Core\Controller\Controller;

/**
* Class Autoloader
* Permet de charger dynamiquement une class
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
    * Includes the file in the class
    * @param string $class Nom de la class à charger
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
