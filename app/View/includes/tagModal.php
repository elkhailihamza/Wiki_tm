<div class="modal fade" id="tag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add a tag</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="search" placeholder="Search for a tag.." class="form-control"
                        name="searchTag">
                </form>
                <div class="card w-100">
                    <div class="card-body">
                        <?php
                        foreach ($tags as $i => $tag):
                            ?>
                            <input type="checkbox" id="<?= $tag->tag_name ?>" name="tag">
                            <label for="<?= $tag->tag_name ?>">
                                <?= $tag->tag_name ?>
                            </label>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>