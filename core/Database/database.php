<?php
namespace core\Database;

use Dotenv\Dotenv;
use PDO;
use PDOException;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
class database
{
    private $dsn;
    private $user;
    private $pass;

    public function __construct()
    {
        $this->user = $_ENV["user"];
        $this->pass = $_ENV["pass"];

        $config = require(__DIR__ . "/./config.php");
        $this->dsn = 'mysql:' . http_build_query($config['database'], '', ';');
    }

    public function getConnection()
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection Failed:" . $e->getMessage();
            die();
        }
    }
}