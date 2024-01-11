<?php

namespace app\Controller\ArticleController;

use app\model\Article;

class IndexController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
        $articles = $this->fetchArticles();

        require(__DIR__ . '/../../View/ArticleView/index.view.php');
    }
    public function fetchArticles()
    {
        return $this->Article->fetchArticles();
    }
}

new indexController();

