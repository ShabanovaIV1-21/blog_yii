<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PostSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<div class="d-flex flex-wrap gap-3 align-items-end">
    <div class="d-flex flex-wrap gap-3">
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'preview') ?>
        <?php  echo $form->field($model, 'user_name') ?>
    <?php  echo $form->field($model, 'created')->textInput(['type' => 'date']); ?>

        <?= $form->field($model, 'theme_id')->dropDownList($themes, ['prompt' => 'Выберите тему поста']) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?=Html::a('Сбросить', ['index'], ['class' => 'btn btn-outline-secondary']);?>

    </div>
</div>
   




    <?php // echo $form->field($model, 'preview') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    

    <?php ActiveForm::end(); ?>

</div>
