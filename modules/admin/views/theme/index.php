<?php

use app\models\Theme;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\ThemeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Темы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('В панель администратора', ['post/'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Создать тему', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{pager}\n{items}\n{pager}",
        'pager' => [
            'class' => LinkPager::class,
        ],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Theme $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
