<?php

namespace app\Controller\ArticleController;

use app\model\Article;

class IndexController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
        $articles = $this->fetchArticles();

        require(__DIR__ . '/../../View/ArticleView/index.view.php');
    }
    public function fetchArticles()
    {
        return $this->Article->fetchArticles("wiki_article.id_article, wiki_article.article_name, wiki_article.article_content, wiki_article.is_archived, wiki_article.date_de_creation, wiki_article.auteur_id, wiki_article.categorie_id, users.fname, users.lname", "INNER JOIN users ON wiki_article.auteur_id = users.id_user;");
    }
}

new indexController();

