<?php

namespace app\Controller\ArticleController;

use app\model\Article;
use app\Controller\ArticleController\ShowController;
use app\Controller\ArticleController\UpdateController;

class CheckController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
        $this->showArticle();
    }
    public function showArticle()
    {
        $uri = explode('/', $_GET['uri']);
        $uriEnd = $uri[2];

        $selectedArticle = $this->checkArticle($uriEnd);

        if (!empty($selectedArticle)) {
            if (isset($uri[3]) && $uri[3] === 'update') {
                return new UpdateController($selectedArticle);
            } else {
                return new ShowController($selectedArticle);
            }
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

new CheckController();