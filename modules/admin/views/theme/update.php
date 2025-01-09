<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Theme $model */

$this->title = 'Обновить тему: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Темы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="theme-update">

    <h1><?= Html::encode($this->title) ?></h1>

        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-success']) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
