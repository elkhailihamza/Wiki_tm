<?php

namespace app\Controller\ArticleController;

use core\Routing\ViewRenderer;
use app\Controller\Functions;
use app\model\Article;
use app\Services\sessionManager;

class ShowController
{
    private $Article;
    public function __construct($article)
    {
        $this->Article = new Article();
        $this->index($article);
    }
    public function index($article)
    {
        $authority = Functions::authorize(sessionManager::get('id_user'), $article->auteur_id);
        ViewRenderer::view(
            "app/View/ArticleView/show.view.php",
            [
                'article' => $article,
                'authority' => $authority
            ]
        );
    }
}