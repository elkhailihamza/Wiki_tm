<?php

namespace app\Controller\ArticleController;
use app\Services\sessionManager;
use app\model\Article;

class WikiController {
    private $Article;
    public function __construct() {
        $this->Article = new Article();
    }
    public function showOwnArticles() {
        $this->Article->fetchArticles('WHERE auteur_id = ' . sessionManager::get('user_id'));
    }
}

$articles = new WikiController();

require(__DIR__ . '/../../View/create_article.view.php');