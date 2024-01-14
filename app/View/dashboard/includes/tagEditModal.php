<div class="modal fade" id="tagEdit<?= $tag->id_tag ?>" tabindex="-1"
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
                                    <input required type="text" class="form-control" value="<?= $tag->tag_name ?>"
                                        name="tagTitle">
                                    <label>Tag Title</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <input type="hidden" name="id" value="<?= $tag->id_tag ?>">
                                <button type="submit" name="saveDataTagEdit" class="btn btn-success">
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