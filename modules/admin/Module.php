<?php

namespace app\modules\admin;
use yii\filters\AccessControl;
use Yii;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

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
                        'matchCallback' => fn() => Yii::$app->user->identity->isAdmin
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
