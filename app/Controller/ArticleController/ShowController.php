<?php

namespace app\Controller\ArticleController;

use app\Services\sessionManager;
use app\model\Article;
use core\Routing\Router;
use core\Routing\functions;

class ShowController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
    }
    public function showArticle()
    {
        $uri = explode('/', $_GET['uri']);
        $uriEnd = end($uri);

        if ($this->checkArticle($uriEnd)) {
            $selectedArticle = $this->checkArticle($uriEnd);
            return require functions::base_path('app/View/ArticleView/show.view.php');
        } else {
            header('Location: /wiki_tm/articles');
            exit;
        }
    }

    private function checkArticle($articleName)
    {
        return !empty($this->Article->fetchArticles('*', 'WHERE article_name = ?;', [$articleName], 'fetch'));
    }
}

$article = new ShowController();
$article->showArticle();