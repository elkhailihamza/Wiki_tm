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
        $categories = $this->selectCategorie();
        $tags = $this->selectTag();
        $checkedTags = $this->article->fetchCheckedTags();
        ViewRenderer::view(
            "app/View/dashboard/dashboard_wiki.view.php",
            [
                'articles' => $articles,
                'categories' => $categories,
                'tags' => $tags,
                'checked' => $checkedTags
            ]
        );
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
    public function selectCategorie()
    {
        return $this->article->selectCategorie();
    }
    public function selectTag()
    {
        return $this->article->selectTag();
    }
}

$show = new ShowController();
$show->index();