<?php
require(__DIR__ . "/./includes/head.php");
require(__DIR__ . "/./includes/header.php");
?>
<section class="container-fluid p-0">
    <section class="testimonial-section spad pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>All Categories</h2>
                        <p>View all categories!</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="container col-9 d-flex flex-wrap gap-3">
                    <?php
                    require(__DIR__ . "/./includes/categories.php");
                    ?>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
require(__DIR__ . "/./includes/footer.php");
?>