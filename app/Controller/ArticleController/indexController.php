<?php

namespace app\Controller\ArticleController;

use app\Controller\ArticleController\SearchController;
use app\Services\sessionManager;
use core\Routing\ViewRenderer;

class IndexController
{
    public function index()
    {
        $search = new SearchController();
        $articles = $search->fetchArticles();
        $name = sessionManager::get('fname') . " " . sessionManager::get('lname');
        ViewRenderer::view('app/View/ArticleView/index.view.php', ['articles' => $articles, 'name' => $name]);
    }
}

$index = new IndexController();
$index->index();
