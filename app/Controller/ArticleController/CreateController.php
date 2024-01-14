<?php

namespace app\Controller\ArticleController;

use app\model\Article;
use app\Services\sessionManager;
use app\Controller\Functions;
use core\Routing\ViewRenderer;

class CreateController
{
    private $Article;
    private $articleTitle;
    private $articleContent;
    private $categorie_id;
    private array $tags = [];
    public static array $errors = [];
    public function __construct()
    {
        $this->Article = new Article();
        $this->create();
    }
    public function index()
    {
        $categories = $this->selectCategorie();
        $tags = $this->selectTag();
        $checkedTags = $this->Article->fetchCheckedTags();
        ViewRenderer::view(
            'app/View/ArticleView/create.view.php',
            [
                'categories' => $categories,
                'tags' => $tags,
                'checked' => $checkedTags
            ]
        );
    }
    public function fetchData()
    {
        if (isset($_POST['article'])) {
            $this->articleTitle = $_POST['articletitle'];
            $this->articleContent = $_POST['articlecontent'];
            $this->categorie_id = $_POST['categories'] ?? NULL;
            if (!empty($_POST['tags'])) {
                $this->tags = $_POST['tags'];
            }
        }
    }
    public function fetchArticles()
    {
        return $this->Article->fetchArticles();
    }
    public function create()
    {
        $this->fetchData();
        if (!Functions::string($this->articleTitle, 1, 300)) {
            self::$errors[] = 'A title that is no more than a 300 chars is required!';
        }
        if (!Functions::string($this->articleContent, 1, 1000)) {
            self::$errors[] = 'An article content that is no more than a 1000 chars is required!';
        }
        if (empty(self::$errors)) {
            foreach ($this->categorie_id as $categorie_id):
                $lastInsertedId = $this->Article->insert($this->articleTitle, $this->articleContent, 1, sessionManager::get('id_user'), $categorie_id);
            endforeach;
            if (!empty($this->tags)) {
                $this->insertTagWiki($lastInsertedId);
            }
        }
    }
    public function insertTagWiki($lastInsertedId)
    {
        foreach ($this->tags as $tag_array):
            foreach ($tag_array as $tag_id):
                $this->Article->insertTagWiki($tag_id, $lastInsertedId);
            endforeach;
        endforeach;
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

$create = new CreateController();
$create->index();
