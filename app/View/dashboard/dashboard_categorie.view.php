<?php
include(__DIR__ . "/includes/head.php");
include(__DIR__ . "/includes/header.php");
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Admin Table</li>
    </ol>
    <div class="mb-4">
        <div class="container p-0" style="height: 400px; overflow: auto;">
            <table class="table table-bordered">
                <thead class="position-sticky bg-primary text-white" style="top: 0px;">
                    <tr>
                        <th style="width: 45px;">#</th>
                        <th class="col-3">Title</th>
                        <th class="col-7">Content</th>
                        <th style="width: 175px;">Controls</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['categories'] as $i => $category):
                        include __DIR__ . "/./includes/categorieEditModal.php";
                        include __DIR__ . "/./includes/categorieAddModal.php";
                        require(__DIR__ . "/./includes/partial/categories.php");
                    endforeach;
                    ?>
                </tbody>
            </table>
            <button data-bs-toggle="modal" data-bs-target="#categorieCreate" class="btn btn-primary">
                    Create
            </button>
        </div>
    </div>
</div>
<?php
include(__DIR__ . "/includes/footer.php");
?>