<?php
require(__DIR__ . "/../includes/head.php");
require(__DIR__ . "/../includes/header.php");
?>
<section class="container-fluid p-0">
    <section class="testimonial-section spad pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Statistics</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                Number Of Articles: <?= $data['article']->{'COUNT(id_article)'}; ?>
            </div>
        </div>
    </section>
</section>
<?php
require(__DIR__ . "/../includes/footer.php");
?>