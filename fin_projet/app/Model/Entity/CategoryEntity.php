<?php
namespace App\Model\Entity;

use Core\Entity\Entity;

/**
 * Class CategoryEntity
 */
class CategoryEntity extends Entity
{
    /**
     * @return string Url
     */
    public function getUrl()
    {
        return 'index.php?p=posts.category&id=' . $this->id;
    }
}
