<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\bootstrap5\LinkPager;
use yii\bootstrap5\Modal;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Список пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('В панель администратора', ['post/'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php Pjax::begin(
        [
            'id' => 'admin-user-pjax',
            'enablePushState' => false,
            'timeout' => 5000
        ]
    ); ?>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php
        if (Yii::$app->session->hasFlash('flash-user-block')) {
            Yii::$app->session->setFlash('info', Yii::$app->session->getFlash('flash-user-block'));
            Yii::$app->session->removeFlash('flash-user-block');
        }
    ?>

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
<?php
if ($dataProvider->count) {
    Modal::begin([
        'title' => 'Заблокировать пользователя',
        'id' => 'block-modal',
        'size' => 'modal-lg'
        // 'toggleButton' => ['label' => 'click me'],
    ]);

    echo $this->render('_form', compact('model'));

    Modal::end();
    
    $this->registerJsFile('js/modal.js', ['depends' => JqueryAsset::class]);

}
?>
