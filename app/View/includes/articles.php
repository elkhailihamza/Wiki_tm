<?php

if (!empty($articles)) {
    ?>
    <div class="container col-9 mt-5 border" style="height: 375px; overflow: auto;">
        <?php
        foreach ($articles as $article):
            ?>
            <div class="d-flex justify-content-between">
                <div>
                    <li>
                        <a href="/wiki_tm/articles/show/<?= $article->article_name ?>">
                            <?= htmlspecialchars($article->article_name) ?>
                            </br>
                        </a>
                        <p class="text-muted ms-4"
                            style="width: 50ch; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                            <?= htmlspecialchars($article->article_content) ?>
                        </p>
                    </li>
                </div>
                <div>
                    <p class="text-muted mt-1">
                        Created :
                        <?= htmlspecialchars($article->date_de_creation) ?>
                    </p>
                    <p class="text-muted">
                        By:
                        <?= htmlspecialchars($article->fname . " " . $article->lname) ?>
                    </p>
                </div>
            </div>
            <hr>
            </br>
            <?php
        endforeach;
        ?>
    </div>
    <?php
} else {
    ?>
    <div class="container text-center mt-5">
        <h4>No Articles can be found!</h4>
    </div>
    <?php
}