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
                    <form action="/YOUEVENT/user/events" method="post" class="d-flex gap-1">
                        <input type="search" name="search" class="form-control" placeholder="Search By Name..">
                        <button class="btn btn-primary" type="submit" name="searchSubmit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>

                    </form>
                </div>
            </div>
            <div class="row">
                <?php
                    include (__DIR__ . "/../includes/articles.php");
                ?>
            </div>
        </div>
    </section>
</section>
<?php
require(__DIR__ . "/../includes/footer.php");
?>