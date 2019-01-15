<?php
namespace App\Model\Table;

use Core\Table\Table;

/**
 * Class AppTable
 * Model used to get the "getters"
 */
class AppTable extends Table
{
    /**
     * Get all the lines of the table
     * @return array
     */
    public function getAll()
    {
        return $this->query('SELECT * FROM ' . $this->table . ' ORDER BY date DESC');
    }
}
