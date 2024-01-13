<?php
namespace app\Controller\DashboardController;

use core\Routing\ViewRenderer;
use app\model\Article;

class ShowController
{
    private $article;
    public function __construct()
    {
        $this->article = new Article();
    }
    public function index()
    {
        $articles = $this->fetchArticles();
        ViewRenderer::view("app/View/dashboard/dashboard_wiki.view.php", ['articles' => $articles]);
    }
    public function fetchArticles()
    {
        return $this->article->fetchArticles(
            "wiki_article.id_article, wiki_article.article_name, wiki_article.is_archived, wiki_article.date_de_creation, wiki_article.auteur_id, wiki_article.categorie_id, users.fname, users.lname, categorie.categorie_name ",
            "INNER JOIN 
                users ON wiki_article.auteur_id = users.id_user
            LEFT JOIN 
                categorie ON wiki_article.categorie_id = categorie.id_categorie;"
        );
    }
}

$show = new ShowController();
$show->index();