<div class="row h-100">
    <?php for($col = 1; $col < count($img)+1; $col++): ?>
        <div class="col px-md-2 px-0 d-flex flex-shrink-0">
            <?php //for($row = 1; $row < count($img)+1; $row++): ?>
                <?php if ($col-1 == array_key_last($img)): ?>
                    <div class="h-<?=(int) 100/(count($img))?> align-self-md-start ">
                        
                    
                <?php elseif ($col-1 == array_key_first($img)): ?>
                    <div class="h-<?=(int) 100/(count($img))?> align-self-md-start">
                <?php else: ?>
                    <div class="h-<?=(int) 100/(count($img))?> align-self-center flex-md-column-reverse flex-column d-flex">
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