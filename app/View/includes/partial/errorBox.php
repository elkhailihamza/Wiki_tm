<div class="text-center alert alert-danger">
    <span>
        <?php
        foreach ($data['error'] as $error):
            ?>
            <?= $error ?>
            <span id="error"></span>
            </br>
            <?php
        endforeach;
        ?>
    </span>
</div>