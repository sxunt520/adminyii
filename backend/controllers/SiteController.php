<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Site controller.
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
//             'access' => [
//                 'class' => AccessControl::className(),
//                 'only' => ['logout', 'signup','login','captcha'],
//                 'rules' => [
//                     [
//                         'actions' => ['signup'],
//                         'allow' => true,
//                         'roles' => ['?'],
//                     ],
//                     [
//                         'actions' => ['logout'],
//                         'allow' => true,
//                         'roles' => ['@'],
//                     ],
//                     [
//                     'actions' => ['login'],
//                     'allow' => true,
//                     'roles' => ['?'],
//                     ],
//                     [
//                     'actions' => ['captcha'],
//                     'allow' => true,
//                     'roles' => ['?'],
//                     ],
//                 ],
//             ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'demo' => [
                'class' => 'yii\web\ViewAction',
            ],
            'webupload' => [
                'class' => \yidashi\webuploader\Action::className()
            ],
             'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'width' => 120,
                'height' => 40,
                'padding' => 0,
                'minLength' => 4,
                'maxLength' => 4,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        //$this->layout = 'main-login';
        $this->layout = false;
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login_new', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
