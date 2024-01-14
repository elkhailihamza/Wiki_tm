<div class="modal fade" id="categorieEdit<?= $category->id_categorie ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Categorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card w-100">
                    <div class="card-body">
                        <form method="post" action="/wiki_tm/dashboard/save">
                            <div class="row mt-3">
                                <div class=" form-floating">
                                    <input required type="text" class="form-control" value="<?= $category->categorie_name ?>"
                                        name="categorieTitle">
                                    <label>Categorie Title</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-floating">
                                    <textarea required name="CategorieText" class="form-control"
                                        style="resize: none; height: 300px;"><?= $category->categorie_desc ?></textarea>
                                    <label>Categorie Description</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <input type="hidden" name="id" value="<?= $category->id_categorie ?>">
                                <button type="submit" name="saveDataCategoryEdit" class="btn btn-success">
                                    Edit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>