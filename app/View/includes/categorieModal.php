<div class="modal fade" id="categorie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Select a Categorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <form action="" class="d-flex gap-2 mb-3">
                    <input type="search" placeholder="Search for a Category.." class="form-control"
                        name="searchCategorie">
                </form> -->
                <div class="card w-100">
                    <div class="card-body">

                        <?php
                        if (isset($categories)) {
                            ?>
                            <select name="categorie" id="categorie" class="form-control">
                                <option value="NULL" hidden selected disabled>Select a Category</option>
                                <?php
                                foreach ($categories as $i => $category):
                                    ?>
                                    <option value="<?= $category->id_categorie ?>" id="<?= $category->categorie_name ?>">
                                        <?= $i + 1 . "). " . $category->categorie_name ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                            <?php
                        } else {
                            echo 'No categories can be found at the moment!';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>