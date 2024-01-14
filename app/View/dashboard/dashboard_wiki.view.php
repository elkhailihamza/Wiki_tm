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
            <form action="/wiki_tm/dashboard/save" method="POST">
                <table class="table table-bordered">
                    <thead class="position-sticky bg-primary text-white" style="top: 0px;">
                        <tr>
                            <th style="width: 45px;">#</th>
                            <th class="col-2">Title</th>
                            <th class="col-2">is_archived</th>
                            <th class="col-2">Created on</th>
                            <th class="col-2">By</th>
                            <th class="col-2">Categorie</th>
                            <th style="width: 175px;">Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['articles'] as $i => $article):
                            require(__DIR__ . "/../includes/categorieModal.php");
                            require(__DIR__ . "/../includes/tagModal.php");
                            require(__DIR__ . "/./includes/partial/wikis.php");
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <button type="submit" name="saveData" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
<?php
include(__DIR__ . "/includes/footer.php");
?>