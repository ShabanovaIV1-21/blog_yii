<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\author\models\PostSearch $model */
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

    <div class="d-flex flex-wrap gap-2 align-items-end">
        <div class="d-flex flex-wrap gap-2">

            <?= $form->field($model, 'title') ?>
            <?= $form->field($model, 'theme') ?>

            <?= $form->field($model, 'theme_id')->dropDownList($themes, ['prompt' => 'Выберите тему']) ?>
            <?php  echo $form->field($model, 'created')->textInput(['type' => 'date']); ?>



            <?php // echo $form->field($model, 'created') ?>

            <?php //echo $form->field($model, 'updated')->textInput(['type'=>"date"]) ?>

            <?php // echo $form->field($model, 'preview') ?>

            <?php // echo $form->field($model, 'img') ?>

            <?php echo $form->field($model, 'status_id')->dropDownList($statuses, ['prompt' => 'Выберите статус']) ?>

            <?php // echo $form->field($model, 'user_id') ?>
        </div>
        

        <div class="form-group">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Сброс', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
