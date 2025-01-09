<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Post $model */

$this->title = 'Редактировать пост: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мои посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>

    <?= $this->render('_form', [
        'model' => $model,
        'themes' => $themes

    ]) ?>

</div>
