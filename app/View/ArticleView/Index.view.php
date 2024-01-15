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
                        <h2>Welcome
                            <?php
                                $trim = trim($data['name']);
                            ?>
                            <?= ucfirst($data['name']) ?? "GUEST" ?>
                        </h2>
                        <p>View latest!</p>
                    </div>
                </div>
            </div>
            <div class="row" id="showData">
                <?php
                include(__DIR__ . "/../includes/articleLatest.php");
                ?>
            </div>
        </div>
    </section>
</section>
<?php
require(__DIR__ . "/../includes/footer.php");
?>