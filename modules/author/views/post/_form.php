<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\web\JqueryAsset;
/** @var yii\web\View $this */
/** @var app\models\Post $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['id' => 'form-post']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'preview')->textarea(['rows' => 2, 'maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'theme_id')->dropDownList($themes, ['prompt' => 'Выберите тему поста']) ?>
    <?= $form->field($model, 'check')->checkbox() ?>

    <?= $form->field($model, 'theme')->textInput(['maxlength' => true, 'disabled' => true]) ?>
    
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <!-- <?//= $form->field($model, 'created')->textInput() ?>

    <?//= $form->field($model, 'updated')->textInput() ?>


    <?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'status_id')->textInput() ?>

    <?//= $form->field($model, 'user_id')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJsFile('js/post.js', ['depends' => JqueryAsset::class]);
?>

