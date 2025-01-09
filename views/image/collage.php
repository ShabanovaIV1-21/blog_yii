<div class="row">
    <?php foreach ($img as $val): ?>
        <div class="col w-<?= (int)100/count($img) ?>">
            <div class="m-3">
                <img class="object-fit-fill d-block w-100" src="<?= $val[0] ?>" alt="">
            </div>
            <div>
                <h5 class="card-title text-center mb-2"><?= $val[1] ?></h5>
                <p class="card-text text-center"><?= $val[2] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>