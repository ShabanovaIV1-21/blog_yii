<div class="h-md-100">
    <h1 class="text-center mb-4 mt-2">Сохраним память о Вас после Вашей смерти</h1>

    <div class="d-flex flex-sm-row flex-column h-100">
        <?php for($col = 1; $col < count($img)+1; $col++): ?>
            <div class="col px-2 mb-5 mb-md-0 d-flex flex-shrink-0">
                <?php //for($row = 1; $row < count($img)+1; $row++): ?>
                    <?php if ($col-1 == array_key_last($img)): ?>
                        <div class="h-<?=(int) 100/(count($img))?> align-self-md-start mb-5">
                            
                        
                    <?php elseif ($col-1 == array_key_first($img)): ?>
                        <div class="h-<?=(int) 100/(count($img))?> align-self-md-start">
                    <?php else: ?>
                        <div class="h-<?=(int) 100/(count($img))?> align-self-center flex-md-column-reverse flex-column d-flex mt-0 mt-sm-5">
                    <?php endif; ?>
                        <img class="object-fit-fill d-block w-100 m-2" src="<?=$img[$col-1][0]?>" alt="">
                            <div>
                                <h5 class="card-title text-center mb-2"><?= $img[$col-1][1] ?></h5>
                                <p class="card-text text-center"><?= $img[$col-1][2] ?></p>
                            </div>
                        </div>
                <?php //endfor; ?>
            </div>
        <?php endfor; ?>
    </div>
</div>

