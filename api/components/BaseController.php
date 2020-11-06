<?php

namespace api\components;

use Yii;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use api\components\QueryParamAuth;

class BaseController extends ActiveController
{
    
    public function init(){
        parent::init();
    }

    //token验证
    public function behaviors() {
        return ArrayHelper::merge (parent::behaviors(), [
            'authenticator' => [
                'class' => QueryParamAuth::className() ,
                'tokenParam' => 'token',
                'optional' => [//过滤不需要验证的action
                    'login',
                    'signup',
                    //'signup-test'
                ],
            ]
        ] );
    }    

}
