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

        if (!empty($this->checkArticle($uriEnd))) {
            $selectedArticle = $this->checkArticle($uriEnd);
            return require functions::base_path('app/View/ArticleView/show.view.php');
        } else {
            header('Location: /wiki_tm/articles');
            exit;
        }
    }

    private function checkArticle($articleName)
    {
        return $this->Article->fetchArticles("wiki_article.id_article, wiki_article.article_name, wiki_article.article_content, wiki_article.is_archived, wiki_article.date_de_creation, wiki_article.auteur_id, wiki_article.categorie_id, users.fname, users.lname", "INNER JOIN users ON wiki_article.auteur_id = users.id_user WHERE article_name = ?;", [$articleName], 'fetch');
    }
}

$article = new ShowController();
$article->showArticle();