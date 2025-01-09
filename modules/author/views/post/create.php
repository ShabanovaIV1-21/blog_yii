<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Post $model */

$this->title = 'Создать пост';
$this->params['breadcrumbs'][] = ['label' => 'Мои посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>

    <?= $this->render('_form', [
        'model' => $model,
        'themes' => $themes
    ]) ?>

</div>
