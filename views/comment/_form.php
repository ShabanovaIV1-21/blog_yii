<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Comment $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="d-none" id="answer-comment">
    <div class="comment-form">

    <?php Pjax::begin(
                ['id' => 'comment-form', 
                'enablePushState' => false, 
                'timeout' => 5000]
    ); ?>
        <?php $form = ActiveForm::begin([
                'id' => 'form-comment',
                'options' => [
                    'data-pjax' => true
                ],
                'action' => 'post/answer'
        ]); ?>

                <?= $form->field($model, 'text')->textarea(['rows' => 6, 'maxlength' => true]) ?>
                                            
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-success', ]) ?>

                </div>
        <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

    </div>
</div>

