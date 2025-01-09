<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;
use app\models\Status;
use yii\bootstrap5\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\web\JqueryAsset;
use yii\bootstrap5\LinkPager;
use yii\bootstrap5\Modal;


/** @var yii\web\View $this */
/** @var app\models\Post $model */

$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => 'Посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

<?= Html::a('<- Назад', ['index'], ['class' => 'card-link']) ?>

    <p class="mt-3">
    <?= $post->user_id == Yii::$app->user->id && $post->status_id == Status::getStatus('Редактирование') && !$post->is_moderate?
        Html::a('Редактировать', ['/author/post/update', 'id' => $post->id], [
              'class' => 'btn btn-warning',
              'data' => [
                  'method' => 'post',
              ],
          ]): '' ?>
        <?= Yii::$app->user->identity?->isAdmin?
        Html::a('Удалить', ['delete', 'id' => $post->id], [
              'class' => 'btn btn-danger',
              'data' => [
                  'confirm' => 'Вы уверены, что хотите удалить этот пост?',
                  'method' => 'post',
              ],
          ]) : ''?>
    </p>
    <!-- <div>
								<a href="" class="text-decoration-none" style="font-size: 1.8em;" title="Редактировать">🖊</a>
								<a href="" class="text-decoration-none" style="font-size: 1.8em;" title="Удалить">🗑</a>
							</div> -->
    <div class="d-flex flex-row align-items-end gap-3">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="fw-medium fs-4 text-primary-emphasis mb-3">- <?= Html::encode($post->theme0?->title ?? $post->theme) ?></div>
    </div>
    <div class="meta-wrap">
		<p class="meta">
			<img width="40px" height="40px"  src="<?=$post->user->avatar ? '/avatars/' . $post->user->avatar . '" class="rounded-circle"' :'/img/camera.png"'?> />
			<span class="text text-3"><?=$post->user->login?></span>
			<span>📅 <?=Yii::$app->formatter->asDatetime($post->created)?></span>
            <span>🖊 <?=Yii::$app->formatter->asDatetime($post->updated)?></span>
			<span>📝<?=count($post->comments)?> комментариев</span>
		</p>
	</div>
    <p class="text-secondary">
        <?=Yii::$app->formatter->asNtext(Html::encode($post->preview))?>
    </p>
    <p class="text-center">
        <img class="img-fluid w-50" src="/uploads/<?=$post->img?>" alt="">
    </p>
    <p>
        <?=Yii::$app->formatter->asNtext(Html::encode($post->text))?>
    </p>

    <p class="mt-3">
    <?= $post->user_id == Yii::$app->user->id && $post->status_id == Status::getStatus('Редактирование') && !$post->is_moderate?
        Html::a('Редактировать', ['/author/post/update', 'id' => $post->id], [
              'class' => 'btn btn-warning',
              'data' => [
                  'method' => 'post',
              ],
          ]): '' ?>
        <?= Yii::$app->user->identity?->isAdmin?
        Html::a('Удалить', ['delete', 'id' => $post->id], [
              'class' => 'btn btn-danger',
              'data' => [
                  'confirm' => 'Вы уверены, что хотите удалить этот пост?',
                  'method' => 'post',
              ],
          ]) : ''?>
    </p>
</div>

<div id="comment-pjax-container">
<?php if (!Yii::$app->user->isGuest  && $post->user_id !== Yii::$app->user->id  && !Yii::$app->user->identity->isAdmin) :?>							<!-- END comment-list -->
	<div class="comment-form-wrap pt-5">
		<!-- <h3 class="mb-3">Оставьте комментарий</h3> -->
        <?=// "<a href='post/answer?id=" . $model->post_id . "&parent_id=null' class='btn btn-primary btn-comment'>Оставьте комментарий</a>";
        "<div class='d-flex gap-4 mb-2 align-items-center'>" . 
        Html::a('Оставьте комментарий', ['post/answer', 'parent_id' => null, 'id' => $post->id], ['class' => 'btn btn-primary btn-comment'])  . 
        Html::a('', [''], ['class' => 'btn  btn-close d-none'])
        . "</div>"
        
        ?>
        <div class="place-for-comment">

        </div>
        
        <!-- <?php /*Pjax::begin(
            ['id' => 'comment-form', 
            'enablePushState' => false, 
            'timeout' => 5000]
        );*/ ?>
            <?php /*$form = ActiveForm::begin([
                'id' => 'form-comment',
                'options' => [
                    'data-pjax' => true
                ]
            ]);*/ ?>
                <?//= $form->field($model, 'text')->textarea(['rows' => 6, 'maxlength' => true]) ?>
                                            
                <div class="form-group">
                    <?//= Html::submitButton('Отправить', ['class' => 'btn btn-primary', ]) ?>

                </div>
            <?php //ActiveForm::end(); ?>
        <?php //Pjax::end(); ?> -->
	</div>
    <?php endif;?>


    <div class="comments pt-5 mt-5">
        <?php Pjax::begin(
                    ['id' => 'comment-list', 
                    'enablePushState' => false, 
                    'timeout' => 5000]
                ); ?>
        <h3 class="mb-3 font-weight-bold"><?=count($post->comments)?> комментариев</h3>
            <ul class="comment-list">
                <?= ListView::widget([

                'pager' => [
                    'class' => LinkPager::class
                ],
                'dataProvider' => $dataProvider,
                'layout' => "{pager}\n<div class=''>{items}</div>\n{pager}",
                'itemOptions' => ['class' => 'item'],
                'itemView' => 'comment'
                ]) ?>		
            </ul>
        <?php Pjax::end(); ?>
    </div>



    
</div>




<?= Html::a('<- Назад', ['index'], ['class' => 'card-link']) ?>

<div id="form-parcking" >
          <?= $this->render('../comment/_form', [
            'model' => $model,
        ]) ?>
</div> 

<?php
    Modal::begin([
        'id' => 'answer-modal',
        'title' => 'Оставьте комментарий',

        // 'toggleButton' => ['label' => 'click me'],
    ]);

    echo $this->render('comment-answer', compact('model'));

    Modal::end();
?>

<?php
    $this->registerJsFile('js/comment.js', ['depends' => 'yii\web\JqueryAsset'])
?>

