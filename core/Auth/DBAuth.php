<?php
namespace Core\Auth;

use Core\Database\Database;

/**
 * Class DBAuth = Database authentication
 */
class DBAuth
{
    /**
     * @var object
     */
    private $db;

    /**
     * Injection of the connexion
     * @param Database $db [description]
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Access to the  database
     * @param  string $username
     * @param  string $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare("SELECT * FROM users WHERE username = ?", [$username], null, true);
        if ($user) {
          if ($user->password === sha1($password)) {
              $_SESSION['auth'] = $user->id;
              return true;
          }
        }
        return false;
    }

    /**
     * Connected or not ?
     * @return boolean
     */
    public function logged()
    {
         return isset($_SESSION['auth']);
    }
}
