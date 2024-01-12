<?php
foreach ($OBJ as $rs):
    ?>
    <div class="card flex-shrink-0 mb-2 p-0" style="width: 17rem; height: 315px;">
        <img src="./assets/img/thumbnail.png" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">
                <?= $rs->categorie_name ?>
            </h5>
            <p class="card-text">
                <?= $rs->categorie_desc ?>
            </p>
        </div>
    </div>
    <?php
endforeach;
?>