<?php
namespace App\Model\Table;

use Core\Table\Table;

/**
 * Class PostTable
 * Model used to get all about the posts. 
 */
class PostTable extends AppTable
{
    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * Get the 5 last comments
     * @return array
     */
    public function last()
    {
        return $this->query("SELECT posts.id, posts.title, posts.content, posts.date, categories.title as category FROM " . $this->table . " LEFT JOIN categories ON category_id = categories.id ORDER BY posts.date DESC LIMIT 5");
    }

    /**
     * Get the last comments
     * @return array
     */
    public function getAll()
    {
        return $this->query("SELECT posts.id, posts.title, posts.content, posts.date, category_id, categories.title AS category_title FROM " . $this->table . " LEFT JOIN categories ON category_id = categories.id ORDER BY date DESC");
    }

    /**
     * Get the last comments of a category
     * @param  int $category_id
     * @return array
     */
    public function firstByCategory($category_id)
    {
        return $this->query("SELECT posts.id, posts.title, posts.content, posts.date, categories.title as category FROM " . $this->table . " LEFT JOIN categories ON category_id = categories.id WHERE posts.category_id = ? ORDER BY posts.id ", [$category_id]);
    }

    /**
     * Get the post and link it to a category
     * @param  int $id
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id)
    {
        return $this->query("SELECT posts.id, posts.title, posts.content, posts.date, categories.title as category FROM " . $this->table . " LEFT JOIN categories ON category_id = categories.id WHERE posts.id = ?", [$id], true);
    }

    /**
     * Get the previous post
     * @param  int $id
     * @return \App\Entity\PostEntity
     */
    public function previous($id)
    {
        return $this->query("SELECT id, title FROM " . $this->table . " WHERE id = (SELECT max(id) FROM posts WHERE id < ?)", [$id], true);
    }

    /**
     * Get the following post
     * @param  int $id
     * @return \App\Entity\PostEntity
     */
    public function next($id)
    {
        return $this->query("SELECT id, title FROM " . $this->table . " WHERE id = (SELECT min(id) FROM posts WHERE id > ?)", [$id], true);
    }
}
