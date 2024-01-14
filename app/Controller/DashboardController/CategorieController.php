<?php

namespace app\Controller\DashboardController;

use app\model\Article;
use core\Routing\ViewRenderer;

class CategorieController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
    }
    public function index()
    {
        $categories = $this->selectCategorie();
        ViewRenderer::view(
            "app/View/dashboard/dashboard_categorie.view.php",
            [
                'categories' => $categories
            ]
        );
    }
    public function fetchData() {
        
    }
    public function selectCategorie()
    {
        return $this->Article->selectCategorie();
    }
}

$categorie = new CategorieController();
$categorie->index();