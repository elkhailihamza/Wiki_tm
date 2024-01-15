<?php

namespace app\Controller\ArticleController;

use app\model\Article;

class SearchController
{
    private $Article;
    private $name;
    public function __construct($name = '')
    {
        $this->Article = new Article();
        $this->name = $name;
    }
    public function fetchArticles()
    {
        return $this->Article->fetchArticles("wiki_article.id_article, wiki_article.article_name, wiki_article.article_content, wiki_article.is_archived, wiki_article.date_de_creation, wiki_article.auteur_id, categorie.categorie_name, users.fname, users.lname", "INNER JOIN users ON wiki_article.auteur_id = users.id_user LEFT JOIN categorie ON wiki_article.categorie_id = categorie.id_categorie WHERE wiki_article.article_name LIKE '$this->name%' ORDER BY wiki_article.id_article DESC;");
    }
}