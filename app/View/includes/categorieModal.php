<div class="modal fade" id="categorie<?= $article->id_article ?? '' ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Select a Categorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card w-100">
                    <div class="card-body">
                        <?php
                        if (isset($data['categories'])) {
                            ?>
                            <select name="categories[<?= $article->id_article ?? '' ?>]" class="form-control">
                                <option value="<?= $article->id_categorie ?? 'NULL' ?>" hidden selected disabled>
                                    <?= $article->categorie_name ?? 'Select a Category' ?>
                                </option>
                                <?php
                                foreach ($data['categories'] as $i => $category):
                                    ?>
                                    <option value="<?= $category->id_categorie ?>" name="<?= $category->categorie_name ?>"
                                        <?= isset($article->id_categorie) && $article->id_categorie == $category->id_categorie ? 'selected' : '' ?>>
                                        <?= ucfirst($category->categorie_name) ?>
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