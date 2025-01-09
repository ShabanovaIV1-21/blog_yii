<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap5\Modal;
use yii\web\JqueryAsset;
use yii\widgets\Pjax;


/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Список пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(
        [
            'id' => 'admin-user-pjax',
            'enablePushState' => false,
            'timeout' => 5000
        ]
    ); ?>

    <?php
        if (Yii::$app->session->hasFlash('flash-user-block')) {
            Yii::$app->session->setFlash('info', Yii::$app->session->getFlash('flash-user-block'));
            Yii::$app->session->removeFlash('flash-user-block');
        }
    ?>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary', 'data-pjax' => 0]) ?>
        <?= (!$model->is_blocked) ?
        Html::a('Заблокировать навремя', ['update', 'id' => $model->id], ['class' => 'btn btn-warning btn-modal',
        'data' => [
                // 'method' => 'post',
                'pjax' => 0,
            ],]) : ''?>
        <?= (!$model->is_blocked) ?
        Html::a('Заблокировать навсегда', ['block-forever', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-block',
            'data' => [
                'data-pjax' => 0,
                'confirm' => 'Вы уверены, что хотите заблокировать пользователя навсегда?',
                'method' => 'post',
            ],
        ]) : ''?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'surname',
            [
                'attribute' => 'patronymic',
                'visible' => (bool) $model->patronymic
            ],
            'login',
            'email:email',
            'phone',
            [
                'attribute' => 'avatar',
                'format' => 'html',
                'value' => Html::img("/avatars/" . $model->avatar, ['class' => 'w-25', 'alt' => 'picture']),
            ],

            [
                'attribute' => 'is_blocked',
                'value' => fn($odel)=> $model->is_blocked ? 'да' : 'нет',
                'visible' => (bool) $model->is_blocked
            ],
            [
                'attribute' => 'block_time',
                'value' => fn($odel)=> $model->block_time ?? 'навсегда',
                'format' => ['datetime'],
                'visible' => (bool) $model->is_blocked
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>

</div>
<?php
Modal::begin([
    'title' => 'Заблокировать пользователя',
    'id' => 'block-modal',
    'size' => 'modal-lg'
    // 'toggleButton' => ['label' => 'click me'],
]);

echo $this->render('_form', compact('model'));

Modal::end();

?>

<?php
    $this->registerJsFile('js/modal.js', ['depends' => JqueryAsset::class]);
?>
