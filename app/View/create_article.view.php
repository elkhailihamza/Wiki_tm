<?php
require(__DIR__ . "/./includes/head.php");
require(__DIR__ . "/./includes/header.php");
?>
<div class="form-group d-flex flex-column justify-content-center align-items-center" style="height: 80vh;">
    <div class="container text-center mb-3">
        <h3>Create an article</h3>
    </div>
    <form class="col-6">
        <div class="mb-3 form-floating">
            <input type="text" class="form-control" id="articletitle" name="articletitle">
            <label for="articletitle" class="form-label">Article Title</label>
        </div>
        <div class="mb-3 form-floating">
            <textarea type="text" class="form-control" id="articlecontent" name="articlecontent"
                style="height: 300px; resize: none;"></textarea>
            <label for="articlecontent" class="form-label" col="">Article content</label>
        </div>
        <div class="mb-3 gap-1 justify-content-center d-flex">
            <?php include(__DIR__ . "/./includes/categorieModal.php"); ?>
            <button type="button" class="btn btn-warning d-flex align-items-center p-1" data-bs-toggle="modal" data-bs-target="#categorie">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </button>
            <?php include(__DIR__ . "/./includes/tagModal.php"); ?>
            <button type="button" class="btn btn-success d-flex align-items-center p-1" data-bs-toggle="modal" data-bs-target="#tag">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                    <line x1="7" y1="7" x2="7.01" y2="7"></line>
                </svg>
            </button>
        </div>
        <button type="submit" name="article" class="btn btn-primary">Create</button>
    </form>
</div>
<?php
require(__DIR__ . "/./includes/footer.php");
?>