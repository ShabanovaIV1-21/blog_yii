<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\UserSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<div class="d-flex flex-wrap gap-3 align-items-end">
    <div class="d-flex flex-wrap gap-3 align-items-end">

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'surname') ?>

        <?= $form->field($model, 'patronymic') ?>

        <?php  echo $form->field($model, 'login') ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?=Html::a('Сбросить', ['index'], ['class' => 'btn btn-outline-secondary']);?>

    </div>
</div>



    <?php ActiveForm::end(); ?>

</div>
