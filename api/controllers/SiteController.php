<?php
namespace api\controllers;

use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{
    //全局异常处理类
    public function actions()
    {
        return [
            'error' => [
                'class' => 'api\components\ExceptionHandler',
            ],
        ];
    }
    
    public function actionIndex()
    {
        return '访问无效';
    }
    
    public function actionTest()
    {
        throw new \yii\web\UnauthorizedHttpException("这是一个测试接口");
    }

}
