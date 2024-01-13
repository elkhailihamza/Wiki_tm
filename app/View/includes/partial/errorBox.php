<div class="text-center alert alert-danger">
    <span>
        <?php
        foreach ($data['error'] as $error):
            ?>
            <?= $error ?>
            </br>
            <?php
        endforeach;
        ?>
    </span>
</div>