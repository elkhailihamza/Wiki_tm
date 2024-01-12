<?php

namespace app\Controller\ArticleController;

use app\Model\Article;
use core\Routing\functions;

class ShowController
{
    private $articleModel;

    public function __construct($article)
    {
        $this->articleModel = new Article();
        $selectedArticle = $article;
        require functions::base_path('app/View/ArticleView/show.view.php');
    }
}