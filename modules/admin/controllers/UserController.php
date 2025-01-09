<?php

namespace app\modules\admin\controllers;

use app\models\User;
use app\models\Post;
use yii\helpers\VarDumper;
use Yii;
use app\modules\admin\models\UserSearch;
use app\modules\admin\controllers\PostController;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = null;
        if ($dataProvider->count){
            $model = $this->findModel($dataProvider->models[0]->id);
            // VarDumper::dump($model, 10, true); die;
            $model->scenario = User::SCENARIO_BLOCK;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->scenario = User::SCENARIO_BLOCK;

        return $this->render('view', [
            'model' => $model,

        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = User::SCENARIO_BLOCK;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->is_blocked = 1;
            if ($model->save()) {
                $model->block_time = null;
                Yii::$app->session->setFlash('flash-user-block', 'Пользователь заблокирован!');
                return $this->render('_form', compact('model'));
                // return $this->redirect(['view', 'id' => $model->id]);

            }
        }

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBlockForever($id)
    {
        if ($model = User::findOne($id)) {
            $model->is_blocked = 1;
            $posts = Post::find()->where(['user_id' => $model->id])->all();
            foreach($posts as $post) {
                unlink(Yii::$app->basePath . '/web/uploads/' . $post->img);
                $post->delete();
                // VarDumper::dump($post->attributes, 10, true);
            }
            
            // VarDumper::dump($posts, 10, true);

            // die;
            Yii::$app->session->setFlash('success', 'Пользователь заблокирован!');

            $model->save();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
