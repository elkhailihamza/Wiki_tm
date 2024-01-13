<?php
namespace app\Controller;

use core\Routing\ViewRenderer;
use app\model\Article;

class DeleteController
{
    private $article;
    public function delete() {
        $this->article = new Article();
        if ($_POST['_method'] === 'DELETE') {
            $id = $_POST['id_delete'];
            if ($this->article->deleteArticle([$id])) {
                require_once __DIR__ . "/../../View/ArticleView/delete.view.php";
                if ($_POST['term'] === 'user') {
                    header("Location: /wiki_tm/");
                    exit;
                }
                if ($_POST['term'] === 'admin') {
                    header("Location: /wiki_tm/dashboard/wiki");
                    exit;
                }
            }
        }
    }
}

$delete = new DeleteController();
$delete->delete();