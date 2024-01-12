<?php
namespace app\model;

use core\Database\database;
use PDO;
use PDOException;

class Categorie
{
    private $db;
    public function __construct() {
    $this->db = new database();
    }
    public function fetchCategories($mode = 'fetchAll')
    {
        return $this->db->query('SELECT * FROM `categorie`;', [])[$mode];
    }
}