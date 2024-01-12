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
        } catch (PDOException $e) {
            echo "Connection Failed:" . $e->getMessage();
            die();
        }
        return $pdo;
    }
    public function query($query, $terms = [])
    {
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($query);

        $stmt->execute($terms);

        $result = [
            'pdo' => $pdo,
            'fetchAll' => $stmt->fetchAll(PDO::FETCH_OBJ),
            'fetch' => null
        ];

        if (!empty($result['fetchAll'])) {
            $result['fetch'] = reset($result['fetchAll']);
        }

        return $result;
    }
}