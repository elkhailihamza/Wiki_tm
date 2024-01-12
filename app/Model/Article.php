<?php
namespace app\model;

use core\Database\database;
use PDO;
use PDOException;

class Article
{
    private $db;
    public function __construct()
    {
        $this->db = new database;
    }
    public function fetchArticles($select = '*', $searchTerm = ';', $terms = [], $mode = 'fetchAll')
    {
        return $this->db->query('SELECT ' . $select . ' FROM wiki_article ' . $searchTerm, $terms)[$mode];
    }
    public function insert($title, $content, $is_archived, $author_id, $categorie_id = null)
    {
        $sql = "INSERT INTO wiki_article (id_article, article_name, article_content, is_archived, date_de_creation, auteur_id, categorie_id) 
            VALUES (NULL, :title, :content, :is_archived, NOW(), :author_id, :categorie_id);";

        $pdo = $this->db->query(
            $sql,
            [':title' => $title, 'content' => $content, 'is_archived' => $is_archived, 'author_id' => $author_id, 'categorie_id' => $categorie_id]
        )['pdo'];

        return $pdo->lastInsertId();
    }
    public function selectCategorie()
    {
        return $this->db->query('SELECT `id_categorie`, `categorie_name`, `categorie_desc` FROM `categorie`;')['fetchAll'];
    }
    public function selectTag()
    {
        return $this->db->query('SELECT `id_tag`, `tag_name` FROM `tag`;')['fetchAll'];
    }
    public function insertTagWiki($tag_id, $last_id)
    {
        $this->db->query('INSERT INTO `wiki_tag`(`tag_id`, `article_id`) VALUES (:tag_id, :last_id);', ['tag_id' => $tag_id, 'last_id' => $last_id]);
    }
}