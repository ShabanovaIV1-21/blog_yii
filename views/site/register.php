<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\registerForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
    <h1><?= Html::encode($this->title) ?></h1>

    

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>

                    <?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'name') ?>
                    <?= $form->field($model, 'patronymic') ?>
                    <?= $form->field($model, 'login', ['enableAjaxValidation' => true]) ?>
                    <?= $form->field($model, 'email', ['enableAjaxValidation' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
    'mask' => '+7(999)-999-99-99',
]) ?>
                    <?= $form->field($model, 'imageFile')->fileInput() ?>
                    <?= $form->field($model, 'rules')->checkbox() ?>


                    

                    <div class="form-group">
                        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>


</div>
