<?php

use yii\bootstrap5\Html;
use yii\helpers\VarDumper;

?>
	<div class="comment-body mb-4 mt-2">
		
		<div class="meta d-flex align-items-start gap-5">
            <div class="d-flex align-items-end gap-3">
                <div class="d-flex align-items-end gap-1">
                    <img width="30px" height="30px"  src="<?=$model->user->avatar ? '/avatars/' . $model->user->avatar . '" class="rounded-circle"' :'/img/camera.png"'?> />
                    <span class="fs-6"><?=$model->user->login?></span>
                </div>
                
                <span>📅 <?=Yii::$app->formatter->asDatetime($model->created_at)?></span>
            </div>
            <div class='d-flex gap-4 mt-2'> 
                <?=(Yii::$app->user->identity->isAdmin)?
                    Html::a('🗑', ['/comment/delete', 'id' => $model->id], [
                        'class' => 'btn',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить комментарий и все ответы на него?',
                            'method' => 'post',
                        ],
                    ]) : ''
                ?>
                <?=(!Yii::$app->user->isGuest && $model->post->user_id == Yii::$app->user->id)?
                    Html::a('Ответить', ['post/answer', 'parent_id' => $model->id, 'id' => $model->post_id], ['class' => 'btn btn-primary btn-comment', 'data' => ['pjax' => 0]]) . 
                    Html::a('', [''], ['class' => 'btn  btn-close d-none'])
                : '' ?>
            </div>
            
        </div>
		<div><?=Html::encode($model->text)?></div>

        
        <div class="place-for-comment">

        </div>
           
	</div>

<?php if (!empty($model->comments)):?>
    <?php foreach($model->comments as $val): ?>
            <div class=" mx-5 comment-body mb-4">
                
                <div class="meta d-flex align-items-start gap-5">
                    <div class="d-flex align-items-end gap-3">
                        <div class="d-flex align-items-end gap-1">
                            <img width="30px" height="30px"  src="<?=$val->user->avatar ? '/avatars/' . $val->user->avatar . '" class="rounded-circle"' :'/img/camera.png"'?> />
                            <span class="fs-6"><?=$val->user->login?></span>
                        </div>
                        
                        <span>📅 <?=Yii::$app->formatter->asDatetime($val->created_at)?></span>
                    </div>
                    <div class='d-flex gap-4 mt-2'> 
                        <?=(Yii::$app->user->identity->isAdmin)?
                            Html::a('🗑', ['/comment/delete', 'id' => $val->id], [
                                'class' => 'btn',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить комментарий?',
                                    'method' => 'post',
                                ],
                            ]) : ''
                            ?>
                        
                    </div>
                    
                </div>
                <div><?=Html::encode($val->text)?></div>
                

        </div>    
    <?php endforeach;?>
<?php endif;?>
