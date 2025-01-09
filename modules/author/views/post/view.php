<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;
use app\models\Status;
/** @var yii\web\View $this */
/** @var app\models\Post $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мои посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>

    <?= $model->status_id == Status::getStatus('Одобрен')?
        Html::a('Перевести в "Редактирование"', ['change-to-edit', 'id' => $model->id], [
              'class' => 'btn btn-success',
              'data' => [
                  'method' => 'post',
              ],
          ]): '' ?>
          <?= $model->status_id == Status::getStatus('Редактирование') && !$model->is_moderate ?
          Html::a('Отправить на модерацию', ['change-to-moderate', 'id' => $model->id], [
            'class' => 'btn btn-success',
            'data' => [
                'method' => 'post',
            ],
        ]): '' ?>

        <?= $model->status_id == Status::getStatus('Редактирование') && !$model->is_moderate?
            Html::a('Редактировать', ['update', 'id' => $model->id], [
                    'class' => 'btn btn-warning',
                    'data' => [
                        'method' => 'post',
                    ],
                ]): '' ?>
            <?= (count($model->comments) == 0)?
            Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить этот пост?',
                        'method' => 'post',
                    ],
                ]) : '' ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'theme_id',
                'value' => fn($model) => $model->theme0?->title ?? $model->theme
            ],
            [
                'attribute' => 'status_id',
                'value' => fn($model) => $model->is_moderate ? 'Модерация': Html::encode($model->status->title)
            ],
            [
                'attribute' => 'created',
                'format' => ['datetime']
            ],
            [
                'attribute' => 'updated',
                'format' => ['datetime']
            ],
            'preview',
            'text:ntext',
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => Html::img("/uploads/" . $model->img, ['class' => 'w-25', 'alt' => 'picture']),
            ],
            [
                'label' => 'Кол-во комментариев',
                'value' => fn($model) => count($model->comments),
            ],
        ],
    ]) ?>
    <p>
    <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>

    <?= $model->status_id == Status::getStatus('Одобрен')?
        Html::a('Перевести в "Редактирование"', ['change-to-edit', 'id' => $model->id], [
              'class' => 'btn btn-success',
              'data' => [
                  'method' => 'post',
              ],
          ]): '' ?>
          <?= $model->status_id == Status::getStatus('Редактирование') && !$model->is_moderate ?
          Html::a('Отправить на модерацию', ['change-to-moderate', 'id' => $model->id], [
            'class' => 'btn btn-success',
            'data' => [
                'method' => 'post',
            ],
        ]): '' ?>

        <?= $model->status_id == Status::getStatus('Редактирование') && !$model->is_moderate?
            Html::a('Редактировать', ['update', 'id' => $model->id], [
                    'class' => 'btn btn-warning',
                    'data' => [
                        'method' => 'post',
                    ],
                ]): '' ?>
            <?= (count($model->comments) == 0)?
            Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить этот пост?',
                        'method' => 'post',
                    ],
                ]) : '' ?>
    </p>

</div>
