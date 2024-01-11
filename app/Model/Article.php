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

    public function fetchArticles()
    {
        $sql = 'SELECT * FROM wiki_article;';
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function insert($title, $content, $is_archived, $author_id, $categorie_id = null)
    {
        $sql = "INSERT INTO wiki_article (article_name, article_content, is_archived, date_de_creation, auteur_id, categorie_id) 
            VALUES (:title, :content, :is_archived, NOW(), :author_id, :categorie_id);";

        $connection = $this->db->getConnection();
        $connection->beginTransaction();

        try {
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':is_archived', $is_archived, PDO::PARAM_INT);
            $stmt->bindParam(':author_id', $author_id, PDO::PARAM_INT);
            $stmt->bindParam(':categorie_id', $categorie_id, is_null($categorie_id) ? PDO::PARAM_NULL : PDO::PARAM_INT);

            $stmt->execute();

            $lastInsertId = $connection->lastInsertId();
            $connection->commit();

            return $lastInsertId;
        } catch (PDOException $e) {
            $connection->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function selectCategorie()
    {
        $sql = "SELECT `id_categorie`, `categorie_name`, `categorie_desc` FROM `categorie`;";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function selectTag()
    {
        $sql = "SELECT `id_tag`, `tag_name` FROM `tag`;";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function insertTagWiki($tag_id, $last_id)
    {
        $sql = "INSERT INTO `wiki_tag`(`tag_id`, `article_id`) VALUES (:tag_id, :last_id);";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':tag_id', $tag_id, PDO::PARAM_INT);
        $stmt->bindParam(':last_id', $last_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}