<?php
namespace App\Model\Entity;

use Core\Entity\Entity;

/**
 * Class PostEntity
 */
class PostEntity extends Entity
{
    /**
     * @return string Url
     */
    public function getUrl()
    {
        return 'index.php?p=posts.show&id=' . $this->id;
    }

}
