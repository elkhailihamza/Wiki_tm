<?php

namespace app\Controller\ArticleController;

use app\Controller\ArticleController\SearchController;
use core\Routing\ViewRenderer;

class ArticleController
{
    public function index()
    {
        $search = new SearchController();
        $articles = $search->fetchArticles();
        ViewRenderer::view('app/View/ArticleView/article.view.php', ['articles' => $articles]);
    }
}

$article = new ArticleController();
$article->index();
