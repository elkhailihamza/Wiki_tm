<?php

namespace app\Controller\ArticleController;

use app\Controller\ArticleController\SearchController;
use app\Services\sessionManager;

class GetarticlesController
{

}

$article = new GetarticlesController();
$name = $_POST['name'] ?? '';
$search = new SearchController($name);
$articles = $search->fetchArticles();

echo "<div>";
foreach ($articles as $article) {
    ?>
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-column justify-content-between">
            <div>
                <div>
                    <li>
                        <a href="/wiki_tm/articles/show/<?= $article->article_name ?>">
                            <?= htmlspecialchars($article->article_name) ?>
                            </br>
                        </a>
                    </li>
                    <p class="text-muted ms-4"
                        style="width: 50ch; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        <?= htmlspecialchars($article->article_content) ?>
                    </p>
                </div>
                <p class="ms-5">
                    Category :
                    </br>
                    <span class="ms-2">
                        <?= $article->categorie_name ?? 'NULL' ?>
                    </span>
                </p>
            </div>
        </div>
        <div>
            <p class="text-muted mt-1">
                Created :
                <?= htmlspecialchars($article->date_de_creation) ?>
            </p>
            <p class="text-muted">
                Author:
                <?= htmlspecialchars($article->fname . " " . $article->lname) . " " ?>
                <?= (sessionManager::get('id_user') === $article->auteur_id) ? '(YOU)' : '' ?>
            </p>
        </div>
    </div>
    <hr>
    </br>
    <?php
}
echo "</div>";


// echo json_encode($articles);