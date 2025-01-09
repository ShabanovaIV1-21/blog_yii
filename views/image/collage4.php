<?php
    $img = [
        ['/img/1.jpg', 'Статуя на кладбище', 'Богословское кладбище'],
        ['/img/2.jpg', 'Могила Виктора Цоя', 'Богословское кладбище'],
        ['/img/3.jpg', 'Могила Михаила Горшенева', 'Богословское кладбище']
    ]
?>

<div>
    <h1 class="text-center mb-4 mt-2">Сохраним память о Вас после Вашей смерти</h1>

    <div class="d-flex flex-row justify-content-between">
            <div class="col px-2 d-flex w-30">
                <?php //for($row = 1; $row < count($img)+1; $row++): ?>
                        <div class="align-self-md-start">

                        <img class="d-block w-100 m-2" src="<?=$img[0][0]?>" alt="">
                            <div>
                                <h5 class="card-title text-center mb-2"><?= $img[0][1] ?></h5>
                                <p class="card-text text-center"><?= $img[0][2] ?></p>
                            </div>
                        </div>
                <?php //endfor; ?>
            </div>

            <div class="col px-2 d-flex w-30">
                <?php //for($row = 1; $row < count($img)+1; $row++): ?>
                        <div class="align-self-md-start">

                        <img class="d-block w-100 m-2" src="<?=$img[0][0]?>" alt="">
                            <div>
                                <h5 class="card-title text-center mb-2"><?= $img[0][1] ?></h5>
                                <p class="card-text text-center"><?= $img[0][2] ?></p>
                            </div>
                        </div>
                <?php //endfor; ?>
            </div> 
    </div>

    <div class="d-flex flex-row justify-content-between">
            <div class="col px-2 d-flex">
                <?php //for($row = 1; $row < count($img)+1; $row++): ?>
                        <div class="align-self-md-start">

                        <img class="d-block w-100 m-2" src="<?=$img[0][0]?>" alt="">
                            <div>
                                <h5 class="card-title text-center mb-2"><?= $img[0][1] ?></h5>
                                <p class="card-text text-center"><?= $img[0][2] ?></p>
                            </div>
                        </div>
                <?php //endfor; ?>
            </div>    
    </div>
</div>

