<?php

namespace app\Controller;
use app\model\Article;
use app\Services\sessionManager;
use Validator;

require __DIR__ . "/./Validator.php";

class ArticleController {
    private $Article;
    private $articleTitle;
    private $articleContent;
    private static array $errors;
    public function __construct() {
        $this->Article = new Article();
        include __DIR__ . '/../View/create_article.view.php';
    }
    public function fetchData() {
        if (isset($_POST['article'])) {
            $this->articleTitle = $_POST['articletitle'];
            $this->articleContent = $_POST['articlecontent'];
        }
    }
    public function fetchArticles() {
        return $this->Article->fetchArticles();
    }
    public function create() {
        $this->fetchData();
        if (! Validator::string($this->articleTitle, 1, 300)) {
            self::$errors[] = 'A title that is no more than a 300 chars is required!';
        }
        if(! Validator::string($this->articleContent, 1, 1000)) {
            self::$errors[] = 'An article content that is no more than a 1000 chars is required!';
        }
        if(empty(self::$errors)) {
            $this->Article->insert($this->articleTitle, $this->articleContent, false, sessionManager::get('id_user'), NULL);
        }
    }
}

$article = new ArticleController();
$article->fetchArticles();