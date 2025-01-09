<?php

use app\models\Post;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\PostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Управление темами поста', ['theme/'], ['class' => 'btn btn-success']) ?>
        <?//= Html::a('Управление пользователями', ['user/'], ['class' => 'btn btn-primary']) ?>

    </p>

    <h3>Управление постами</h3>
    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel, 'themes' => $themes, 'statuses' => $statuses]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        // 'itemOptions' => ['class' => 'item'],
        'itemOptions' => ['class' => 'item mx-2 mb-3'],

        // 'layout' => "{pager}\n{items}\n{pager}",
        'layout' => "{pager}\n{items}\n{pager}",

        'pager' => [
            'class' => LinkPager::class
        ],
        'itemView' => 'item'
    ]) ?>

    <?php Pjax::end(); ?>

</div>
