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
                                <?= htmlspecialchars($data['article']->article_name) ?>
                            </h2>
                            <p>
                                <?= htmlspecialchars($data['article']->article_content) ?>
                            </p>
                        </div>
                        <div class="mt-5">
                            By :
                            <?= htmlspecialchars($data['article']->fname . " " . $data['article']->lname) ?>
                            </br>
                            Created :
                            <?= $data['article']->date_de_creation ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 d-flex justify-content-center gap-2">
                    <form method="post" action="/wiki_tm/articles">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="term" value="user">
                        <input type="hidden" name="id_delete" value="<?= $data['article']->id_article ?>">
                        <button type="submit" name="delete" class="btn btn-outline-danger">DELETE</button>
                    </form>
                    <a href="<?= "/wiki_tm/" . $_GET['uri'] . "/update"?>" class="btn btn-outline-success">EDIT</a>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
require(__DIR__ . "/../includes/footer.php");
?>