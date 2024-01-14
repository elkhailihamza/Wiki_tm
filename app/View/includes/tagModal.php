<div class="modal fade" id="tag<?= $article->id_article ?? '' ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add a tag</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card w-100">
                    <div class="card-body">
                        <?php
                        if (isset($data['tags'])) {
                            foreach ($data['tags'] as $i => $tag):
                                $isChecked = false;
                                foreach ($data['checked'] as $checkedItem) {
                                    if ($checkedItem->tag_id === $tag->id_tag && $checkedItem->article_id === $article->id_article) {
                                        $isChecked = true;
                                        break;
                                    }
                                }
                                ?>
                                <input type="checkbox" name="tags[<?= $article->id_article ?? '' ?>][]"
                                    id="<?= $tag->tag_name ?>" value="<?= $tag->id_tag ?>" <?= $isChecked ? 'checked' : '' ?>>
                                <label for="<?= $tag->tag_name ?>">
                                    <?= $i + 1 . ") " . strtoupper($tag->tag_name) ?>
                                </label>
                                <br>
                                <?php
                            endforeach;
                        } else {
                            echo 'No tags available at the moment!';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>