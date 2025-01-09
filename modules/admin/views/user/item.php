<?php 
    use yii\bootstrap5\Html;
    use app\models\Status;
?>

<div class="card w-100 d-flex flex-row mb-3 flex-wrap flex-md-nowrap justify-content-center">
    <div class="m-1">
        <img src="/avatars/<?=$model->avatar?>" class="object-fit-cover" width="200px" height="200px" alt="Аватарка пользователя">
    </div>
  <div class="card-body">
    <div class="border-bottom d-flex align-items-end gap-2 pb-1 justify-content-between flex-wrap">
      <h5 class="card-title m-0"><?=Html::encode($model->login)?></h5>
    </div>
    <div class="fs-6 pb-1 border-bottom"><b>ФИО: </b><?=Html::encode($model->surname . ' ' . $model->name . ' ' . $model->patronymic)?></div>
    <div class="fs-6 pb-1 border-bottom"><b>Эл. почта: </b> <?=Html::encode($model->email)?></div>
    <div class="fs-6 pb-1 border-bottom"><b>Телефон: </b> <?=Html::encode($model->phone)?></div>

    <div class="d-flex gap-3 flex-wrap mt-3">
      <?=Html::a('Посмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-primary', 'data-pjax' => 0]);?>
      <?= (!$model->is_blocked) ?
        Html::a('Заблокировать навремя', ['update', 'id' => $model->id], ['class' => 'btn btn-warning btn-modal',
        'data' => [
                // 'method' => 'post',
                'pjax' => 0,
            ],]) : ''?>
        <?= (!$model->is_blocked) ?
        Html::a('Заблокировать навсегда', '', [
          'class' => 'btn btn-danger btn-block',
          'data' => [
              'data-pjax' => 0,
              
          ],
      ]) : ''?>
    </div>
  </div>
</div>