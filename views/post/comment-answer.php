<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;


/** @var yii\web\View $this */
/** @var app\models\Comment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comment-form">
<?php Pjax::begin(
                ['id' => 'comment-answer', 
                'enablePushState' => false, 
                'timeout' => 5000]
            ); ?>
    <?php $form = ActiveForm::begin([
        'id' => 'form-comment',
        'options' => [
            'data-pjax' => true
        ]
    ]); ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success', 'data-pjax' => 0]) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>

</div>
