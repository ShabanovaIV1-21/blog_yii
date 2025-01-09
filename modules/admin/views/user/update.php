<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Заблокировать пользователя: ' . $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Список пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->login, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Заблокировать';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Назад', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
