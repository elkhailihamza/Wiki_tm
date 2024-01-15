<?php

use app\model\Categorie;

class CategorieController
{
    private $categorie;
    public function __construct()
    {
        $this->categorie = new Categorie();
        $OBJ = $this->fetchCategories();
        require __DIR__ . '/../../View/categorie.view.php';
    }

    public function fetchCategories()
    {
        return $this->categorie->fetchCategories();
    }
}

new CategorieController();