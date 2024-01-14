<?php

namespace app\Controller\ArticleController;

use core\Routing\ViewRenderer;
use app\Controller\Functions;
use app\model\Article;
use app\Services\sessionManager;

class IndexController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
    }
    public function index()
    {
        $articles = $this->fetchArticles();
        ViewRenderer::view('app/View/ArticleView/index.view.php', ['articles' => $articles]);
    }
    public function fetchArticles()
    {
        return $this->Article->fetchArticles("wiki_article.id_article, wiki_article.article_name, wiki_article.article_content, wiki_article.is_archived, wiki_article.date_de_creation, wiki_article.auteur_id, categorie.categorie_name, users.fname, users.lname", "INNER JOIN users ON wiki_article.auteur_id = users.id_user LEFT JOIN categorie ON wiki_article.categorie_id = categorie.id_categorie ORDER BY wiki_article.id_article DESC;");
    }
}

$index = new IndexController();
$index->index();
