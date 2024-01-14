<?php
namespace app\Controller;

use app\model\Article;

class SaveController
{
    public function __construct()
    {
        $this->fetchAllData();
    }
    public function fetchAllData()
    {
        if (isset($_POST['saveData'])) {
            extract($_POST);
            $this->categories($catagories);
            $this->tags($tags);
            header("Location: /wiki_tm/dashboard/home");
            exit;
        }
    }

    public function categories($catagories)
    {
        foreach ($catagories as $categorie):

        endforeach;
    }

    public function tags($tags)
    {
        foreach ($tags as $tag):

        endforeach;
    }
}
new SaveController();