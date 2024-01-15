<?php
use app\Services\sessionManager;

$articlesFound = false;

foreach ($data['articles'] as $article):
    if ($article->is_archived == 1) {
        $articlesFound = true;
        break;
    }
endforeach;

if (!empty($data['articles']) && $articlesFound) {
    $limit = 0;
    ?>
    <div class="container col-9">
        <?php
        foreach($data['articles'] as $article) :
            if ($article->is_archived == 1 && $limit < 3) {
                $limit++;
                ?>
                <div class="d-flex justify-content-between border px-2">
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
                </br>
                <?php
            }
        endforeach;
        ?>
    </div>
    <?php
}

if (!$articlesFound) {
    ?>
    <div class="container text-center mt-5">
        <h4>No Articles can be found!</h4>
    </div>
    <?php
}