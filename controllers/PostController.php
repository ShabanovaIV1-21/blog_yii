<?php

namespace app\controllers;

use app\models\Post;
use app\models\PostSearch;
use app\models\Reaction;

use app\models\Comment;
use app\models\CommentSearch;

use app\models\Theme;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
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

    public function actionReact()
    {
        if (Yii::$app->request->isPost) {

            $id = $this->request->post('id');
            $react = $this->request->post('react');

            $model = Reaction::findOne([
                'user_id' => Yii::$app->user->id,
                'post_id' => $id, 
            ]);
            if (is_null($model)) {
                $model = new Reaction();
                $model->user_id = Yii::$app->user->id;
                $model->post_id = $id;

            } 

            switch($react) {
                case 1: 
                    // if ($model->reaction) {
                    //     $model->reaction = null;
                    //     $react = null;
                    // } else {
                    //     $model->reaction = 1;
                    // }
                    $model->reaction = ($model->reaction === 1) ? null: 1;
                    break;
                case 0: 
                    $model->reaction = ($model->reaction === 0) ? null: 0;
                    break;
            }
            if ($model->save()) {
                $post = Post::findOne($id);
                // $count = null;
                // if ($react) {
                //     $count = $post->likes;
                // } else {
                //     $count = $post->dislikes;
                // }
                
                // var_dump(['react' => $model->reaction, 'count' => $count]);die;
                return $this->asJson(['react' => $model->reaction, 'count' => [
                    'likes' => $post->likes,
                    'dislikes' => $post->dislikes
                ]]);
            } else {
                VarDumper::dump($this->erros, 10, true);
            }
        }
        
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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'themes' => $themes
        ]);
    }

    public function actionTop10()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->searchTop10($this->request->queryParams);

        return $this->render('indextop10', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $searchModel = new CommentSearch();
        // VarDumper::dump($this->request->queryParams, 10, true);die;
        // var_dump($parent_id);
        // var_dump($parent_id);die;

        $dataProvider = $searchModel->search($this->request->queryParams);
// VarDumper::dump($dataProvider, 10, true);die;
        $model = new Comment();
        // $allComments = Comment::find()->where(['post_id' => $id])->asArray()->all();
        // VarDumper::dump($allComments, 10, true);die;

        // if ($this->request->isPost) {
        //     // var_dump(Yii::$app->user->id); die;
        //     $model->user_id = Yii::$app->user->id;
        //     $model->parent_id = $parent_id;
        //     $model->post_id = $id;
        //     if ($model->load($this->request->post())) {
        //         if ($model->save()) {
        //             $model->text = null;
        //             // return $this->render('comment-answer', ['model' => $model]);
        //         }
        // VarDumper::dump($model, 10, true);die;

            // var_dump(Yii::$app->user->id); die;

                // $model->text = null;
                // return $this->render('view', [
                //     'post' => $this->findModel($id),
                //     'model' => $model,
                //     'allComments' => $allComments,
                //     'searchModel' => $searchModel,
                //     'dataProvider' => $dataProvider,
                // ]);

        //         // return $this->redirect(['view', 'id' => $comment->id]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        return $this->render('view', [
            'post' => $this->findModel($id),
            'model' => $model,
            // 'allComments' => $allComments,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAnswer($id, $parent_id = null)
    {
        // $searchModel = new CommentSearch();
        // // VarDumper::dump($this->request->queryParams, 10, true);die;
        // var_dump($parent_id);
        // var_dump($parent_id);die;

        // $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new Comment();
        // $allComments = Comment::find()->where(['post_id' => $id])->asArray()->all();
        // VarDumper::dump($allComments, 10, true);die;

        if ($this->request->isPost) {
            // var_dump(Yii::$app->user->id); die;
            // $searchModel = new CommentSearch();
            // $dataProvider = $searchModel->search($this->request->queryParams);
            if ($model->load($this->request->post())) {
                $model->user_id = Yii::$app->user->id;
                $model->parent_id = $parent_id;
                $model->post_id = $id;
                if ($model->save()) {
                    $model->text = null;
                    return $this->render('//comment/_form', [
                        'model' => $model,
                        // 'searchModel' => $searchModel,
                        // 'dataProvider' => $dataProvider,
                        // 'post' => Post::findOne($id),
                    ]);
                } else {
                    VarDumper::dump($model->errors, 10, true);
                }
        // VarDumper::dump($model, 10, true);die;

            // var_dump(Yii::$app->user->id); die;

                // $model->text = null;
                // return $this->render('view', [
                //     'post' => $this->findModel($id),
                //     'model' => $model,
                //     'allComments' => $allComments,
                //     'searchModel' => $searchModel,
                //     'dataProvider' => $dataProvider,
                // ]);

                // return $this->redirect(['view', 'id' => $comment->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        // return $this->render('view', [
        //     'post' => $this->findModel($id),
        //     'model' => $model,
        //     'allComments' => $allComments,
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
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
