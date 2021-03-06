<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'crop'=>[
                'class' => 'common\widgets\avatar\CropAction',
                'config'=>[
                    //main.js 中改 aspectRatio: 9 / 16,//纵横比
                    'bigImageWidth' => '720',     //大图默认宽度
                    'bigImageHeight' => '1280',    //大图默认高度
                    'middleImageWidth'=> '360',   //中图默认宽度
                    'middleImageHeight'=> '640',  //中图图默认高度
                    'smallImageWidth' => '180',    //小图默认宽度
                    'smallImageHeight' => '320',   //小图默认高度
                    //头像上传目录（注：目录前不能加"/"）
                    'uploadPath' => 'uploads/avatar',
                ]
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        // if (Yii::$app->request->isPost) {
        //         var_dump(Yii::$app->request->post());exit;
        // }
        
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    //ffmpeg视频封面截图test
    public function actionTestVideo()
    {
        
            //代码
            $savePath=Yii::getAlias('@staticroot').'/uploads/';
            //var_dump(__METHOD__);
            $path='D:\NEXT\test\xxxx.mp4';
            $ffmpeg = \FFMpeg\FFMpeg::create([
                //绑定插件
                'ffmpeg.binaries'  => 'D:\down\ffmpeg-N-99973-g0066bf4d1a-win64-gpl-shared-vulkan\bin\ffmpeg.exe',
                'ffprobe.binaries' => 'D:\down\ffmpeg-N-99973-g0066bf4d1a-win64-gpl-shared-vulkan\bin/ffprobe.exe'
            ]);
            $video = $ffmpeg->open($path);
            $video
                ->filters()
                ->resize(new \FFMpeg\Coordinate\Dimension(100, 100))
                ->synchronize();

            //随机获取0到10帧中的某一帧图片
            $rand=rand(0,10);
            //$rand=1;
            var_dump($rand);
            $video
                ->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds($rand))
                ->save($savePath.$rand.'_'.uniqid().'frame.jpg');
    }

    //ffmpeg视频封面截图test2
    public function actionTestVideo2()
    {
            $savePath=Yii::getAlias('@staticroot').'/uploads/';

            $ffmpeg = \FFMpeg\FFMpeg::create(
                    [
                        //绑定插件
                        'ffmpeg.binaries'  => 'D:\down\ffmpeg-N-99973-g0066bf4d1a-win64-gpl-shared-vulkan\bin\ffmpeg.exe',
                        'ffprobe.binaries' => 'D:\down\ffmpeg-N-99973-g0066bf4d1a-win64-gpl-shared-vulkan\bin/ffprobe.exe'
                    ]
                );
            $video = $ffmpeg->open('D:\NEXT\test\xxxx.mp4');
            $video
                ->filters()
                ->resize(new \FFMpeg\Coordinate\Dimension(320, 240))
                ->synchronize();
            $video
                ->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(1))
                ->save($savePath.'xxx'.'_'.uniqid().'.jpg');
            // $video
            //     ->save(new \FFMpeg\Format\Video\X264(), 'export-x264.mp4')
            //     ->save(new \FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')
            //     ->save(new \FFMpeg\Format\Video\WebM(), 'export-webm.webm');
    }

    //ffmpe生成视频第一秒为封面截图
    public function actionVideoCover()
    {
            $savePath=Yii::getAlias('@staticroot').'/uploads/';
            $fileName='videoimg_'.uniqid().'.jpg';

            $ffmpeg = \FFMpeg\FFMpeg::create(
                    [
                        //绑定插件
                        'ffmpeg.binaries'  => 'D:\down\ffmpeg-N-99973-g0066bf4d1a-win64-gpl-shared-vulkan\bin\ffmpeg.exe',
                        'ffprobe.binaries' => 'D:\down\ffmpeg-N-99973-g0066bf4d1a-win64-gpl-shared-vulkan\bin/ffprobe.exe'
                    ]
                );
            $video = $ffmpeg->open('D:\NEXT\test\xxxx.mp4');
            $video
                ->filters()
                ->resize(new \FFMpeg\Coordinate\Dimension(720, 1280))
                ->synchronize();
            $r=$video
                ->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(1))
                ->save($savePath.$fileName);

            if($r){
                echo $savePath.$fileName;
            }else{
                echo '生成失败';
            }
    }



    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
