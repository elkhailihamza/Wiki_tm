<div class="modal fade" id="tag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                ?>
                                <input type="checkbox" name="tags[]" id="<?= $tag->tag_name ?>" value="<?= $tag->id_tag ?>">
                                <label for="<?= $tag->tag_name ?>">
                                    <?= $i + 1 . ") " . strtoupper($tag->tag_name) ?>
                                </label>
                                </br>
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