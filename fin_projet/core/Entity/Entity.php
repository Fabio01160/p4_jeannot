<?php
namespace Core\Entity;

use Core\Entity\Entity;

/**
 * Class Entity
 * Model used to manage the getters
 */
class Entity
{
    // Fonction magique
    /**
     * Create a "__get" if the var doesn't exist.
     * @param  string $key
     * @return string Url
     */
    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}
