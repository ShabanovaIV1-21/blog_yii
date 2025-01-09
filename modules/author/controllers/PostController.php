<?php

namespace app\modules\author\controllers;

use app\models\Post;
use app\models\Theme;
use app\models\Status;
use app\modules\author\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
use yii\helpers\VarDumper;


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
        $statuses = Status::getStatuses();
        $themes = Theme::getThemes();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'statuses' => $statuses,
            'themes' => $themes
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
        $model = new Post(['scenario' => Post::SCENARIO_CREATETHEMEID]);
        $model->status_id = Status::getStatus('Редактирование');
        $model->user_id = Yii::$app->user->id;
        $themes = Theme::getThemes();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->check) {
                    $model->scenario = Post::SCENARIO_CREATETHEME;
                    $model->theme_id = null;
                } 
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->upload()){

                    if ($model->save(false)) {
                        Yii::$app->session->setFlash('success', 'Пост успешно создан!');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
                
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'themes' => $themes
        ]);
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
        $themes = Theme::getThemes();
        
        $model->scenario = Post::SCENARIO_UPDATETHEMEID;
        

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->check) {
                $model->scenario = Post::SCENARIO_UPDATETHEME;
                $model->theme_id = null;
            } else {
                $model->theme = null;
            }
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (is_null($model->imageFile) || $model->upload()){

                if ($model->save(false)) {
    // VarDumper::dump($this->attributes, 10, true);die;
                    Yii::$app->session->setFlash('success', 'Пост успешно обновлен!');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'themes' => $themes
        ]);
    }

    public function actionChangeToModerate($id) {
        if ($this->request->isPost) {
            if ($model = Post::findOne($id)) {
                if ($model->status_id == Status::getStatus('Редактирование')) {
                    $model->is_moderate = 1;
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Пост отправлен на модерацию!');
                        return $this->redirect(['index',]);
                    }
                }
            }
        }
        
    }

    public function actionChangeToEdit($id) {
        if ($this->request->isPost) {
            if ($model = Post::findOne($id)) {
                if ($model->status_id == Status::getStatus('Одобрен')) {
                    $model->status_id = Status::getStatus('Редактирование');
                    $model->is_moderate = 0;
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Пост снова можно редактировать!');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        }
        
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
        $this->findModel($id)->delete();
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
