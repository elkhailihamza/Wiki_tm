<?php
namespace app\Controller;

use app\model\Article;

class DeleteController
{
    private $article;
    public function __construct()
    {
        $this->article = new Article();
        if ($_POST['_method'] === 'DELETE') {
            $id = $_POST['id_delete'];
            if ($this->article->deleteArticle([$id])) {
                require_once __DIR__ . "/../../View/ArticleView/delete.view.php";
                header("Location: /wiki_tm/articles");
                exit;
            }
        }
    }
}

new DeleteController();