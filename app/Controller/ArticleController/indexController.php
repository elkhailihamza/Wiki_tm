<?php

namespace app\Controller\ArticleController;
use app\model\Article;

class indexController {
    private $Article;
    public function __construct() {
        $this->Article = new Article();
    }
    public function fetchArticles() {
        return $this->Article->fetchArticles();
    }
}

$article = new indexController();
$articles = $article->fetchArticles();

require(__DIR__ . '/../../View/articles.view.php');
