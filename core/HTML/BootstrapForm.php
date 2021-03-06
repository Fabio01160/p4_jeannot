<?php
namespace Core\HTML;

/**
* Class BootstrapForm
* Create a form
*/
class BootstrapForm extends Form
{
    /**
    * @param  string $html is the HTML Code
    * @return string
    */
    protected function surround($html)
    {
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
    * Create an input
    * @param  string $name
    * @param  string $label
    * @param  array  $options
    * @return string
    */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        if ($type === 'textarea') {
            if ($label === 'Commentaire') {
                if ($this->getValue($name)) {
                    $input = "<textarea  name='" . htmlspecialchars($name) . "' class='form-control'>" . htmlspecialchars($this->getValue($name)) . " </textarea>";
                } else {
                    $input = "<textarea  name='" . htmlspecialchars($name) . "' class='form-control'></textarea>";
                }
            } else {
                if ($this->getValue($name)) {
                    $input = "<textarea  name='" . htmlspecialchars($name) . "' class='form-control tiny-area'>" . htmlspecialchars($this->getValue($name)) . " </textarea>";
                } else {
                    $input = "<textarea  name='" . htmlspecialchars($name) . "' class='form-control tiny-area'></textarea>";
                }
            }
        } else {
            $input = "<input type='" . htmlspecialchars($type) . "' name='" . htmlspecialchars($name) . "' value='" . htmlentities($this->getValue($name), ENT_QUOTES, 'UTF-8') . "'  class='form-control' required>";
        }
        $label = "<label>" . htmlspecialchars($label) . "</label>";

        return $this->surround($label . $input);
    }

    /**
    * Creat a selection
    * @param  string $name
    * @param  string $label
    * @param  array  $options
    * @return string
    */
    public function select($name, $label, $options)
    {
        $label = "<label>" . htmlspecialchars($label) . "</label>";
        $input = '<select class="form-control" name="' . $name .'">';
        foreach ($options as $key => $value) {
            $attributes = '';
            if ($key == $this->getValue(($name))) {
                $attributes = ' selected';
            }
            $input .= "<option value='$key'$attributes>$value</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    /**
    * Create a button "Envoyer"
    * @return string
    */
    public function submit()
    {
        return $this->surround("<button type='submit'class='btn btn-primary'>Envoyer</button>");
    }
}
