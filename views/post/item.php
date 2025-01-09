<?php 
    use yii\bootstrap5\Html;
    use app\models\Status;
    use yii\helpers\VarDumper;
?>
<?php
  // VarDumper::dump(($model->reactions[0]->reaction === null), 10, true);
?>
<div class="card h-100 d-flex justify-content-between" style="width: 20rem;">

<!-- <div class="card w-100 d-flex flex-row mb-3 flex-wrap flex-md-nowrap justify-content-center"> -->
    <div class="m-1 text-center">
        <img src="/uploads/<?=$model->img?>" class="object-fit-cover" width="200px" height="200px" alt="Изображение поста">
    </div>
  <div class="card-body justify-content-between d-flex flex-column">
    <div class="">
      <div class="d-flex flex-column-reverse flex-wrap">
        <h5 class="card-title m-0"><?=Html::a(Html::encode($model->title), ['view', 'id' => $model->id], ['class' => 'card-title text-decoration-none']);?></h5>
      
        <div class="d-flex flex-wrap w-100 justify-content-between">
          <div>📅 <?=Yii::$app->formatter->asDatetime($model->created)?></div>
          <div>👨‍🦲 <?=$model->user->login?></div>
        </div>
      </div>
      <div class="fs-6 pb-1"><b>Тема:</b> <?=Html::encode($model->theme0?->title ?? $model->theme)?></div>

      
      <p class="card-text"><?=Html::encode($model->preview)?></p>
    </div>

    <div>
      <p>
        
        <?=(!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin)?
        
          Html::a("<span class='like'>" . (empty($model->reactions[0])? '👍🏻': (empty($model->reactions[0]->reaction)? '👍🏻': '👍')) . "</span>"
            . "<span class='count-action-like'>$model->likes</span>",
              ['react',], ['class' => 'text-decoration-none btn-react', 'data-id' => $model->id, 'data-react' => 1]): '👍🏻' . "<span class='count-action-like'>$model->likes</span>" 
        ?>
        <?=(!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin)?
        
          Html::a("<span class='dislike'>" . (empty($model->reactions[0])? '👎🏻': (empty($model->reactions[0]->reaction === 0)? '👎🏻': '👎')) . "</span>"
             . "<span class='count-action-dislike'>$model->dislikes</span>",
              ['react',], ['class' => 'text-decoration-none btn-react', 'data-id' => $model->id, 'data-react' => 0]): '👎🏻' . "<span class='count-action-dislike'>$model->dislikes</span>"
        ?>
          
      </p>
      <div class="d-flex gap-3 flex-wrap">
        <?=Html::a('Посмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']);?>

        <?= $model->user_id == Yii::$app->user->id && $model->status_id == Status::getStatus('Редактирование') && !$model->is_moderate?
        Html::a('Редактировать', ['/author/post/update', 'id' => $model->id], [
              'class' => 'btn btn-warning',
              'data' => [
                  'method' => 'post',
              ],
          ]): '' ?>
        <?= Yii::$app->user->identity?->isAdmin?
        Html::a('Удалить', ['delete', 'id' => $model->id], [
              'class' => 'btn btn-danger',
              'data' => [
                  'confirm' => 'Вы уверены, что хотите удалить этот пост?',
                  'method' => 'post',
              ],
          ]) : ''?>

      </div>
    </div>
    
  </div>
</div>