<?php
namespace app\Controller\ArticleController;

use core\Routing\ViewRenderer;
use app\model\Article;

class StatisticsController
{
    private $article;
    public function __construct()
    {
        $this->article = new Article();
    }
    public function fetchArticleNumber()
    {
        return $this->article->fetchArticles('COUNT(id_article)', 'as articleCount;', [], 'fetch');
    }
    public function index()
    {
        $count = $this->fetchArticleNumber();
        ViewRenderer::view(
            'app/View/ArticleView/statistics.view.php',
            [
                'article' => $count
            ]
        );
    }
}
$statistics = new StatisticsController();
$statistics->index();