<?php

namespace app\Controller\ArticleController;

use app\model\Article;
use core\Routing\functions;
use app\Controller\Validator;

class UpdateController
{
    private $Article;
    private $articleTitle;
    private $articleContent;
    private $categorie_id;
    private $selectedArticle;
    private array $tags = [];

    public static array $errors = [];
    public function __construct($article)
    {
        $this->Article = new Article();
        $selectedArticle = $article;
        $this->selectedArticle = $article;
        $this->update();
        $categories = $this->selectCategorie();
        $tags = $this->selectTag();
        require functions::base_path('app/View/ArticleView/update.view.php');
    }
    public function fetchData()
    {
        if (isset($_POST['upd_article'])) {
            $this->articleTitle = $_POST['articletitle'];
            $this->articleContent = $_POST['articlecontent'];
            $this->categorie_id = $_POST['categorie'] ?? NULL;
            if (!empty($_POST['tags'])) {
                $this->tags = $_POST['tags'];
            }
        }
    }
    public function update()
    {
        $this->fetchData();
        if (!Validator::string($this->articleTitle, 1, 300)) {
            self::$errors[] = 'A title that is no more than a 300 chars is required!';
        }
        if (!Validator::string($this->articleContent, 1, 1000)) {
            self::$errors[] = 'An article content that is no more than a 1000 chars is required!';
        }
        if (empty(self::$errors)) {
            $lastInsertedId = $this->Article->update($this->articleTitle, $this->articleContent, $this->selectedArticle->id_article, $this->categorie_id);
            if (!empty($this->tags)) {
                $this->insertTagWiki($lastInsertedId);
            }
        }
    }

    public function insertTagWiki($lastInsertedId)
    {
        foreach ($this->tags as $tag_id):
            $this->Article->insertTagWiki($tag_id, $lastInsertedId);
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