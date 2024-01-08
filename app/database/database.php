<?php

require __DIR__ . "/../../vendor/autoload.php";
Dotenv\Dotenv::createImmutable(__DIR__ . "/../../")->load();


class database
{
    private $dsn;
    private $user;
    private $pass;

    public function __construct($config)
    {
        $this->user = $_ENV["user"];
        $this->pass = $_ENV["pass"];

        $this->dsn = 'mysql:' . http_build_query($config, '', ';');
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

$config = require (__DIR__ . "/./config.php");
$database = new database($config['database']);
$pdo = $database->getConnection();