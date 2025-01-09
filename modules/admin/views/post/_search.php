<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\PostSearch $model */
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
    <div class="d-flex flex-wrap gap-3 align-items-end">
        <?= $form->field($model, 'title') ?>
        <?php  echo $form->field($model, 'user_name') ?>
        <?php  echo $form->field($model, 'created')->textInput(['type' => 'date']); ?>

        <?= $form->field($model, 'theme_id')->dropDownList($themes, ['prompt' => 'Выберите тему поста']) ?>
        <?= $form->field($model, 'status_id')->dropDownList($statuses, ['prompt' => 'Выберите статус поста']) ?>
        <!-- <?//= $form->field($model, 'is_moderate')->checkbox() ?> -->


    </div>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?=Html::a('Сбросить', ['index'], ['class' => 'btn btn-outline-secondary']);?>

    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
