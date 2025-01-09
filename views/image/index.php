<?php

use yii\bootstrap5\Carousel;

$items = array_map(function ($arr) {
    return [
        'content' => '<img class="object-fit-fill d-block w-100" src="' . $arr[0] . '"/>',
        'caption' => '<h4>' . $arr[1] . '</h4><p>' . $arr[2] . '</p>',
        
    ];
}, $img);

?>

<h1 class="text-center mb-4 mt-2">Сохраним память о Вас после Вашей смерти</h1>

<div class='d-flex justify-content-center'>
    <?php
        echo Carousel::widget([
            'controls' => [
                '<span class="carousel-control-prev-icon" aria-hidden="true"></span><span class=" d-none d-none d-md-block sr-only">Назад</span>',
                '<span class="sr-only  d-none d-none d-md-block ">Вперед</span><span class="carousel-control-next-icon" aria-hidden="true"></span>'
            ],
            'crossfade' => true,
            'options' => ['data-bs-ride' => 'carousel', 'class' => [ 'col-12 col-md-9 col-lg-6',]],
            'items' => $items
        ]
            
        )
    ?>
</div>