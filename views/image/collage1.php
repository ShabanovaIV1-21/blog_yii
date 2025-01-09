<div class="row">
    <?php for($col = 1; $col < count($img)+1; $col++): ?>
        <div class="col w-<?=(int) 100/count($img)?>">
            
                
                    <div class="">
                        <img class="object-fit-fill d-block w-100" src="<?=$img[$col-1]?>" alt="">
                    </div>
               
                    
                
            
        </div>
    <?php endfor; ?>
</div>