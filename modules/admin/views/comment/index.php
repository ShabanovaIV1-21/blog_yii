<?php

use app\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\CommentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Комментарии к посту';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['post/view', 'id' => $post_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'itemOptions' => ['class' => 'item mx-2 mb-3'],

        // 'layout' => "{pager}\n{items}\n{pager}",
        'layout' => "{pager}\n{items}\n{pager}",

        'pager' => [
            'class' => LinkPager::class
        ],
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'item'
    ]) ?>

    <?php Pjax::end(); ?>

</div>
