<?php
namespace App\Model\Entity;

use Core\Entity\Entity;

/**
 * Class CommentEntity
 */
class CommentEntity extends Entity
{
    /**
     * @return string Url
     */
    public function getUrl()
    {
        return 'index.php?p=posts.comment&id=' . $this->id;
    }
}
