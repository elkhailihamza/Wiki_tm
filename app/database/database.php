<?php

require __DIR__ . "/../../vendor/autoload.php";
Dotenv\Dotenv::createImmutable(__DIR__ . "/../../")->load();


class database
{
    private $dsn;
    private $user;
    private $pass;

    public function __construct()
    {
        $config = [
            'host' => $_ENV["db_host"],
            'port' => 3306,
            'dbname' => $_ENV["db_name"],
            'charset' => 'utf8mb4',
        ];

        $this->user = $_ENV["user"];
        $this->pass = $_ENV["pass"];

        $this->dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
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