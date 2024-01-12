<?php

namespace app\Controller\ArticleController;

use app\model\Article;
use app\Services\sessionManager;
use app\Controller\Validator;

require __DIR__ . "/../Validator.php";

class CreateController
{
    private $Article;
    private $articleTitle;
    private $articleContent;
    private $categorie_id;
    private array $tags = [];
    public static array $errors = [];
    public function __construct()
    {
        $this->Article = new Article();
        $this->create();
        $categories = $this->selectCategorie();
        $tags = $this->selectTag();
        require(__DIR__ . '/../../View/ArticleView/create.view.php');
    }
    public function fetchData()
    {
        if (isset($_POST['article'])) {
            $this->articleTitle = $_POST['articletitle'];
            $this->articleContent = $_POST['articlecontent'];
            $this->categorie_id = $_POST['categorie'] ?? NULL;
            if (!empty($_POST['tags'])) {
                $this->tags = $_POST['tags'];
            }
        }
    }
    public function fetchArticles()
    {
        return $this->Article->fetchArticles('');
    }
    public function create()
    {
        $this->fetchData();
        if (!Validator::string($this->articleTitle, 1, 300)) {
            self::$errors[] = 'A title that is no more than a 300 chars is required!';
        }
        if (!Validator::string($this->articleContent, 1, 1000)) {
            self::$errors[] = 'An article content that is no more than a 1000 chars is required!';
        }
        if (empty(self::$errors)) {
            $lastInsertedId = $this->Article->insert($this->articleTitle, $this->articleContent, 1, sessionManager::get('id_user'), $this->categorie_id);
            if (!empty($this->tags)) {
                $this->insertTagWiki($lastInsertedId);
            }
        }
    }
    public function insertTagWiki($lastInsertedId)
    {
        foreach ($this->tags as $tag_id):
            $this->Article->insertTagWiki($tag_id, $lastInsertedId);
        endforeach;
    }
    public function selectCategorie()
    {
        return $this->Article->selectCategorie();
    }
    public function selectTag()
    {
        return $this->Article->selectTag();
    }
}

new CreateController();
