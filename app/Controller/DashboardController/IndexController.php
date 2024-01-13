<?php

namespace app\Controller\DashboardController;

use app\model\Article;
use core\Routing\ViewRenderer;

class IndexController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
    }
    public function index()
    {
        $categories = $this->selectCategorie();
        $tags = $this->selectTag();
        ViewRenderer::view(
            "app/View/dashboard/dashboard_home.view.php",
            [
                'categories' => $categories,
                'tags' => $tags
            ]
        );
    }
    public function selectCategorie()
    {
        return $this->Article->selectCategorie();
    }
    public function selectTag()
    {
        return $this->Article->selectTag();
    }
}

$dashboard = new IndexController();
$dashboard->index();