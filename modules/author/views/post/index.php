<?php

use app\models\Post;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\bootstrap5\LinkPager;
/** @var yii\web\View $this */
/** @var app\modules\author\models\PostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мои посты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пост', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel, 'statuses' => $statuses, 'themes' => $themes]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{pager}\n{items}\n{pager}",
        'pager' => [
            'class' => LinkPager::class
        ],
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'item'
    ]) ?>

    <?php Pjax::end(); ?>

</div>
