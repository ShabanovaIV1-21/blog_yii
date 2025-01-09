<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;


/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">
<?php Pjax::begin([
    'id' => 'form-block-pjax',
    'enablePushState' => false,
    'enableReplaceState' => false,
    'timeout' => 5000
])?>
    <?php $form = ActiveForm::begin([
        'id' => 'form-block',
        'options' => [
            'data-pjax' => true
        ]
    ]); ?>

    <?= $form->field($model, 'block_time')->textInput(['type' => 'datetime-local', 'min' => date('Y-m-d H:s'), 'value' => date('Y-m-d H:s')]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'data-pjax' => 0]) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>

</div>
