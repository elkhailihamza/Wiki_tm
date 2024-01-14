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
        return $this->db->query('SELECT ' . $select . ' FROM `wiki_article` ' . $searchTerm, $terms)[$mode];
    }
    public function fetchUser($select = '*', $searchTerm = ';', $terms = [], $mode = 'fetch')
    {
        return $this->db->query('SELECT ' . $select . ' FROM `users` ' . $searchTerm, $terms)[$mode];
    }
    public function fetchCheckedTags()
    {
        return $this->db->query('SELECT `tag_id`, `article_id` FROM `wiki_tag`;')['fetchAll'];
    }
    public function updateCategorie($terms) {
        return $this->db->query('UPDATE `wiki_article` SET `categorie_id`= :categorie_id WHERE `id_article`= :id_article;', $terms)['fetch'];
    }
    public function deleteArticle($terms)
    {
        $this->db->query('DELETE FROM `wiki_article` WHERE id_article = ?', $terms);
    }
    public function update($title, $content, $id_article, $categorie_id = null)
    {
        $sql = "UPDATE `wiki_article` SET `article_name`= :title,`article_content`= :content, `categorie_id`= :categorie_id WHERE id_article = :id_article";

        $pdo = $this->db->query(
            $sql,
            ['title' => $title, 'content' => $content, 'categorie_id' => $categorie_id, 'id_article' => $id_article]
        )['pdo'];

        return $pdo->lastInsertId();
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
    public function checkTagWiki($terms, $mode) {
        return $this->db->query('SELECT * FROM `wiki_tag` WHERE tag_id = :tag_id && article_id = :article_id;', $terms)[$mode];
    }
    public function selectTagWiki($mode = 'fetchAll') {
        return $this->db->query('SELECT * FROM `wiki_tag`;')[$mode];
    }
    public function insertTagWiki($tag_id, $last_id)
    {
        $this->db->query('INSERT INTO `wiki_tag`(`tag_id`, `article_id`) VALUES (:tag_id, :last_id);', ['tag_id' => $tag_id, 'last_id' => $last_id]);
    }
    public function removeTagWiki($selectTerm, $terms)
    {
        $this->db->query('DELETE FROM `wiki_tag` WHERE ' . $selectTerm, $terms);
    }
}