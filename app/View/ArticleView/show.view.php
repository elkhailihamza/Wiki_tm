<?php
require(__DIR__ . "/../includes/head.php");
require(__DIR__ . "/../includes/header.php");
?>
<section class="container-fluid p-0">
    <section class="testimonial-section spad pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2><?= $selectedArticle->article_name ?></h2>
                        <p><?= $selectedArticle->article_content ?></p>
                    </div>
                </div>
            </div>
            <div class="row container d-flex mb-2 justify-content-center">
                <div class="col-lg-6">

                </div>
            </div>
        </div>
    </section>
</section>
<?php
require(__DIR__ . "/../includes/footer.php");
?>