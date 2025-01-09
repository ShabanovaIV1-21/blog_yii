<?php

namespace app\modules\author;
use yii\filters\AccessControl;
use Yii;
/**
 * author module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\author\controllers';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                // 'only' => ['create', 'update'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => fn() => !Yii::$app->user->identity->isAdmin
                    ],
                    // everything else is denied by default
                ],
                'denyCallback' => fn() => Yii::$app->response->redirect('/')
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
