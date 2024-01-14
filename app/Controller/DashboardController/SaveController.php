<?php
namespace app\Controller;

use app\model\Article;

class SaveController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
        $this->saveData();
    }
    public function saveData()
    {
        if (isset($_POST['saveData'])) {
            extract($_POST);
            if (isset($categories)) {
                $this->categories($categories);
            }
            if (isset($tags)) {
                $this->updateTags($tags);
            }
            header("Location: /wiki_tm/dashboard/wiki");
            exit;
        }
        if (isset($_POST['saveDataCategoryEdit'])) {
            extract($_POST);
            if (isset($categorieTitle) && isset($CategorieText)) {
                $this->editCategory($id, $categorieTitle, $CategorieText);
            }
            header("Location: /wiki_tm/dashboard/categorie");
            exit;
        }
        if (isset($_POST['saveDataCategoryCreate'])) {
            extract($_POST);
            if (isset($categorieTitle) && isset($CategorieText)) {
                $this->createCategory($categorieTitle, $CategorieText);
            }
            header("Location: /wiki_tm/dashboard/categorie");
            exit;
        }
        if (isset($_POST['saveDataCategoryDel'])) {
            extract($_POST);
            if (isset($categoryId)) {
                $this->deleteCategory($categoryId);
            }
            header("Location: /wiki_tm/dashboard/categorie");
            exit;
        }
        if (isset($_POST['saveDataTagEdit'])) {
            extract($_POST);
            if (isset($tagTitle)) {
                $this->editTag($tagTitle, $id);
            }
            header("Location: /wiki_tm/dashboard/tags");
            exit;
        }
        if (isset($_POST['saveDataTagCreate'])) {
            extract($_POST);
            if (isset($tagTitle)) {
                $this->createTag($tagTitle);
            }
            header("Location: /wiki_tm/dashboard/tags");
            exit;
        }
        if (isset($_POST['saveDataTagDel'])) {
            extract($_POST);
            if (isset($tagId)) {
                $this->deleteTag($tagId);
            }
            header("Location: /wiki_tm/dashboard/tags");
            exit;
        }
    }
    private function editTag($tagTitle, $id) {
        $this->Article->editTag(['name' => $tagTitle, 'id' => $id]);
    }
    private function deleteTag($id) {
        $this->Article->deleteTag(['id' => $id]);
    }
    public function createTag($tagTitle) {
        $this->Article->createTag(['name' => $tagTitle]);
    }
    public function editCategory($id, $categorieTitle, $CategorieText) {
        $this->Article->editCategory(['name' => $categorieTitle, 'desc' => $CategorieText, 'id' => $id]);
    }
    public function createCategory($categorieTitle, $CategorieText) {
        $this->Article->createCategory(['name' => $categorieTitle, 'desc' => $CategorieText]);
    }
    public function deleteCategory($categorieId) {
        $this->Article->deleteCategory(['id' => $categorieId]);
    }

    public function categories($categories)
    {
        foreach ($categories as $articleId => $categorieId):
            $this->Article->updateCategorie(['categorie_id' => $categorieId, 'id_article' => $articleId]);
        endforeach;
    }

    public function updateTags($tags)
    {
        $dbTags = $this->Article->selectTagWiki();

        foreach ($tags as $articleId => $tagArray) {
            foreach ($tagArray as $tag) {
                $tagExists = false;

                foreach ($dbTags as $dbTag) {
                    if ($dbTag->article_id == $articleId && $dbTag->tag_id == $tag) {
                        $tagExists = true;
                        break;
                    }
                }
                if (!$tagExists) {
                    $this->Article->insertTagWiki($tag, $articleId);
                }
                foreach ($dbTags as $dbTag) {
                    if ($dbTag->article_id == $articleId && !in_array($dbTag->tag_id, $tagArray)) {
                        $this->Article->removeTagWiki('tag_id = :tag_id;', ['tag_id' => $dbTag->tag_id]);
                    }
                    if (!in_array($dbTag->article_id, array_keys($tags))) {
                        $this->Article->removeTagWiki('article_id = :article_id;', ['article_id' => $dbTag->article_id]);
                    }
                }
            }
        }
    }
}
new SaveController();