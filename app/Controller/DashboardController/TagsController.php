<?php

namespace app\Controller\DashboardController;

use app\model\Article;
use core\Routing\ViewRenderer;

class TagsController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
    }
    public function index()
    {
        $tags = $this->selectTag();
        ViewRenderer::view(
            "app/View/dashboard/dashboard_tag.view.php",
            [
                'tags' => $tags
            ]
        );
    }
    public function selectTag()
    {
        return $this->Article->selectTag();
    }
}

$tags = new TagsController();
$tags->index();