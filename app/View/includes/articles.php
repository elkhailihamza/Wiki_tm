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
    ?>
    <div class="container col-9 mt-5 border" style="height: 375px; overflow: auto;" id="showdata">
                
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