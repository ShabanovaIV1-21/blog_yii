<?php 
    use yii\bootstrap5\Html;
    use app\models\Status;
?>

<div class="card w-100 d-flex flex-row mb-3 flex-wrap flex-md-nowrap justify-content-center">
    <div class="m-1">
        <img src="/uploads/<?=$model->img?>" class="object-fit-cover" width="200px" height="200px" alt="Изображение поста">
    </div>
  <div class="card-body">
    <div class="border-bottom d-flex align-items-end gap-2 pb-1 justify-content-between flex-wrap">
      <h5 class="card-title m-0"><?=Html::encode($model->title)?></h5>
     
      <div>
        📅 <?=Yii::$app->formatter->asDatetime($model->created)?><br>
        🖊 <?=Yii::$app->formatter->asDatetime($model->updated)?>
      </div>
    </div>
    <div class="fs-6 pb-1 border-bottom"><b>Автор:</b> <?=Html::encode($model->user->login)?></div>
    <div class="fs-6 pb-1 border-bottom"><b>Тема:</b> <?=Html::encode($model->theme0?->title ?? $model->theme)?></div>

    <div class="border-bottom d-flex justify-content-between align-items-end flex-wrap">
      <div class="fs-6 pb-1"><b>Статус:</b> <?=$model->is_moderate ? 'Модерация': Html::encode($model->status->title)?></div>
      <div class="py-1">
        
      </div>
    </div>
    <p class="card-text"><?=Html::encode($model->preview)?></p>
    <div class="d-flex gap-3 flex-wrap">
      <?=Html::a('Посмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-primary']);?>
      <?= $model->status_id == Status::getStatus('Редактирование') && $model->is_moderate?
      Html::a('Одобрить', ['approve', 'id' => $model->id], [
            'class' => 'btn btn-outline-success',
            'data' => [
                'method' => 'post',
            ],
        ]): '' ?>

      <?= $model->status_id == Status::getStatus('Редактирование') && $model->is_moderate?
      Html::a('Запретить', ['ban', 'id' => $model->id], [
            'class' => 'btn btn-outline-warning',
            'data' => [
                'method' => 'post',
            ],
        ]): '' ?>
      <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот пост?',
                'method' => 'post',
            ],
        ]) ?>

    </div>
  </div>
</div>