<?php

use yii\bootstrap5\Html;
use yii\helpers\VarDumper;

?>
	<div class="comment-body mb-4">
		
		<div class="meta d-flex align-items-start gap-5">
            <div class="d-flex align-items-end gap-3">
                <div class="d-flex align-items-end gap-1">
                    <img width="30px" height="30px"  src="<?=$model->user->avatar ? '/avatars/' . $model->user->avatar . '" class="rounded-circle"' :'/img/camera.png"'?> />
                    <span class="fs-6"><?=$model->user->login?></span>
                </div>
                
                <span>📅 <?=Yii::$app->formatter->asDatetime($model->created_at)?></span>
            </div>
            <div class='d-flex gap-4'>
                <?=Html::a('🗑', ['delete', 'id' => $model->id], [
                    'class' => 'btn',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить комментарий и все ответы на него?',
                        'method' => 'post',
                    ],
                ]); ?>
            </div>
            
        </div>
		<p><?=Html::encode($model->text)?></p>
        
        
           
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
                    <div class='d-flex gap-4'>
                        <?=Html::a('🗑', ['delete', 'id' => $val->id], [
                                    'class' => 'btn text-decoration-none',
                                    'data' => [
                                        'confirm' => 'Вы уверены, что хотите удалить комментарий?',
                                        'method' => 'post',
                                    ],
                                ]) 
                        ?>
                    </div>
                    
                </div>
                <p><?=Html::encode($val->text)?></p>
                
        </div>    
    <?php endforeach;?>
<?php endif;?>
