<?php

require __DIR__ . "/../../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

use PDO;
use PDOException;

class database
{
    private $dsn;
    private $host;
    private $user;
    private $pass;
    private $db_name;

    public function __construct()
    {
        $this->host = $_ENV["db_host"];
        $this->db_name = $_ENV["db_name"];
        $this->user = $_ENV["user"];
        $this->pass = $_ENV["pass"];
        $this->dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=utf8";
    }

    public function getConnection()
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->pass);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection Failed:" . $e->getMessage();
            die();
        }
    }
}

$database = new database();
$pdo = $database->getConnection();