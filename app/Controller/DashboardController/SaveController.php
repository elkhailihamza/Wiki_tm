<?php
namespace app\Controller;

use app\model\Article;

class SaveController
{
    private $Article;
    public function __construct()
    {
        $this->Article = new Article();
        $this->fetchAllData();
    }
    public function fetchAllData()
    {
        if (isset($_POST['saveData'])) {
            extract($_POST);

            // if (isset($categories)) {
            //     $this->categories($categories);
            // }
            if (isset($tags)) {
                $this->updateTags($tags);
            }
            die();
            header("Location: /wiki_tm/dashboard/home");
            exit;
        }
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