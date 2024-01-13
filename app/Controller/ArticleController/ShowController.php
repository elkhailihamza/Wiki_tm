<?php

namespace app\Controller\ArticleController;

use core\Routing\ViewRenderer;
use core\Routing\functions;

class ShowController
{
    public function __construct($article)
    {
        $this->index($article);
    }
    public function index($article)
    {
        ViewRenderer::view("app/View/ArticleView/show.view.php", ['article' => $article]);
    }
    public function fetchUser() {

    }
}