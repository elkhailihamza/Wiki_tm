<div class="modal fade" id="tag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add a tag</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <form>
                        <input type="search" placeholder="Search for a tag.." class="form-control" name="searchTag">
                    </form>
                    <div class="card w-100">
                        <div class="card-body">
                            <?php
                            foreach ($tags as $i => $tag):
                                ?>
                                <input type="checkbox" name="tag[]" id="<?= $tag->tag_name ?>" name="tag">
                                <label for="<?= $tag->tag_name ?>">
                                    <?= $i + 1 . ") " . $tag->tag_name ?>
                                </label>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Select Tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>