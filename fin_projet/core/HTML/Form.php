<?php
namespace Core\HTML;

/**
* Class Form
* Quick creation of a form
*/
class Form
{

    /**
    * @var array Data used in the form
    */
    protected $data;

    /**
    * @var string Tag used to surround the fields
    */
    public $surround = 'p';

    /**
    * @param array $data Données utilisées par le formulaire
    */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
    * @param  string $html Code HTML
    * @return string
    */
    protected function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
    * @param  string $index ID of the value that we have to get
    * @return string
    */
    protected function getValue($index)
    {
        if (is_object($this->data)) {
           return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
    * Cration of an input
    * @param  string $name
    * @param  string $label
    * @param  array  $options
    * @return string
    */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround('<input type="' . htmlspecialchars($type) . '" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($this->getValue($name), ENT_QUOTES, "UTF-8") . '">');
    }
}
