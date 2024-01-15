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
                        <h2>All Articles</h2>
                        <p>View all articles!</p>
                    </div>
                </div>
            </div>
            <div class="row container d-flex mb-2 justify-content-center">
                <div class="col-lg-6">
                    <input type="search" name="searchAjax" id="searchAjax" class="form-control" placeholder="Search By Name..">
                </div>
            </div>
            <div class="row" id="showData">
                <?php
                include(__DIR__ . "/../includes/articles.php");
                ?>
            </div>
        </div>
    </section>
</section>
<?php
require(__DIR__ . "/../includes/footer.php");
?>