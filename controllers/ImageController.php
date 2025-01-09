<?php

namespace app\controllers;

// use Yii;
// use yii\filters\AccessControl;

use app\models\Image;
use yii\web\Controller;
// use yii\web\Response;
// use yii\filters\VerbFilter;
// use app\models\LoginForm;
// use app\models\ContactForm;

class ImageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::class,
    //             'only' => ['logout'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['logout'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::class,
    //             'actions' => [
    //                 'logout' => ['post'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * {@inheritdoc}
     */
    // public function actions()
    // {
    //     return [
    //         'error' => [
    //             'class' => 'yii\web\ErrorAction',
    //         ],
    //         'captcha' => [
    //             'class' => 'yii\captcha\CaptchaAction',
    //             'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
    //         ],
    //     ];
    // }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $img = Image::getImage();
        return $this->render('index', compact('img'));
    }

    public function actionCollage()
    {
        // $img = Image::getCollageImage();
        // $img = Image::getCollageImage();
        $img = Image::getImage();
        return $this->render('collage3', compact('img'));
    }
}
