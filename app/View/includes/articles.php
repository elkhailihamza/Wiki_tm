<?php

if (!empty($articles)) {
    ?>
    <div class="container col-8 mt-5">
        <?php
        foreach ($articles as $article):
            ?>
            <div class="d-flex justify-content-between">
                <div>
                    <li>
                        <a href="?id=<?= $article->id_article ?>">
                            <?= htmlspecialchars($article->article_name) ?>
                            </br>
                        </a>
                        <p class="text-muted ms-4">
                            <?= htmlspecialchars($article->article_content) ?>
                        </p>
                    </li>
                </div>
                <div>
                    <p class="text-muted mt-1">
                        Created : <?= htmlspecialchars($article->date_de_creation) ?>
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