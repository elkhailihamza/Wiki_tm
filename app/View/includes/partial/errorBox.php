<div class=" text-center alert alert-danger">
    <?php
    foreach ($errors as $error):
        ?>
        <span>
            <?= $error ?>
        </span>
        <?php
    endforeach;
    ?>
</div>