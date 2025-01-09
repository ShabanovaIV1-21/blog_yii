<?php

use app\models\Post;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Посты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?php Pjax::begin(
        ['id' => 'catalogue', 
        'enablePushState' => false, 
        'timeout' => 5000]
    ); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        // 'itemOptions' => ['class' => 'item'],
        'itemOptions' => ['class' => 'item mx-2 mb-3'],

        // 'layout' => "{pager}\n{items}\n{pager}",
        'layout' => "{pager}\n<div class='d-flex justify-content-center justify-content-md-between card-group flex-wrap'>{items}</div>\n{pager}",

        'pager' => [
            'class' => LinkPager::class
        ],
        'itemView' => 'item'
    ]) ?>

    <?php Pjax::end(); ?>

</div>
