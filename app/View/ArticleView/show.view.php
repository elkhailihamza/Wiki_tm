<?php
require(__DIR__ . "/../includes/head.php");
require(__DIR__ . "/../includes/header.php");
?>
<section class="container-fluid p-0">
    <section class="testimonial-section spad pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title d-flex justify-content-between">
                        <div>
                            <h2>
                                <?= $selectedArticle->article_name ?>
                            </h2>
                            <p>
                                <?= $selectedArticle->article_content ?>
                            </p>
                        </div>
                        <div class="mt-5">
                            By :
                            <?= $selectedArticle->fname . " " . $selectedArticle->lname ?>
                            </br>
                            Created :
                            <?= $selectedArticle->date_de_creation ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 d-flex justify-content-center gap-2">
                    <form method="post" action="/wiki_tm/articles">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id_delete" value="<?= $selectedArticle->id_article ?>">
                        <button type="submit" name="delete" class="btn btn-outline-danger">DELETE</button>
                    </form>
                    <button class="btn btn-outline-success">EDIT</button>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
require(__DIR__ . "/../includes/footer.php");
?>