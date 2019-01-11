<?php
namespace Core\Controller;

/**
 * Class Controller
 * Core controller
 */
class Controller
{
    /**
     * @var string
     */
    protected $viewPath;
    /**
     * @var string
     */
    protected $template;

    /**
     * Create view
     * @param  string $view
     * @param  array  $variables
     */
    protected function render($view, $variables = [])
    {
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    /**
     * Header forbidden if problem
     */
    protected function forbidden()
    {
        ob_start();
        require($this->viewPath . 'errors/403.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/error.php');
        header('HTTP/1.0 403 Forbidden');
        exit();
    }

    /**
     * Header not found if problem
     */
    protected function notFound()
    {
        ob_start();
        require($this->viewPath . 'errors/404.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/error.php');
        header('HTTP/1.0 404 Not Found');
        exit();
    }

    /**
     * Trim then check if empty
     * @param  string $variable
     * @return boolean
     */
    protected function strictEmpty($variable)
    {
        $value = trim($variable);
        if(isset($value) === true && $value === '') {
            return true;
        }
        else {
            return false;
        }
    }
}
