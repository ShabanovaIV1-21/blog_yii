<?php

namespace app\modules\admin\controllers;

use app\models\Post;
use app\models\Status;
use app\models\Theme;
use Yii;

use app\modules\admin\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $themes = Theme::getThemes();
        $statuses = Status::getStatuses();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'themes' => $themes,
            'statuses' => $statuses
        ]);
    }

    /**
     * Displays a single Post model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Post();

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

    public function actionApprove($id) {
        if ($this->request->isPost) {
            if ($model = Post::findOne($id)) {
                if ($model->status_id == Status::getStatus('Редактирование')  && $model->is_moderate) {
                    $model->status_id = Status::getStatus('Одобрен');
                    $model->is_moderate = 0;
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Пост одобрен!');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        }  
    }

    public function actionBan($id) {
        if ($this->request->isPost) {
            if ($model = Post::findOne($id)) {
                if ($model->status_id == Status::getStatus('Редактирование') && $model->is_moderate) {
                    $model->status_id = Status::getStatus('Запрещен');
                    $model->is_moderate = 0;
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Пост запрещен!');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        }  
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $post = $this->findModel($id);
        unlink(Yii::$app->basePath . '/web/uploads/' . $post->img);
        $post->delete();
        Yii::$app->session->setFlash('success', 'Пост успешно удален!');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
