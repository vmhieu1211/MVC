<?php
namespace database;
use \PDO;
use \PDOException;  
class Database 
{
    protected $db;

    public function __construct()
    {
        $this->db = $this->connection();
    }

    protected function connection()
    {
        // ham tao va ket noi toi csdl
        try {
            $dbh = new PDO(DB_CONNECTION.':host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USERNAME, DB_PASSWORD);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
protected function disconnection()
    {
        $this->db= null;
    }
    public function __destruct()
    {
        $this->disconnection();
    }
}