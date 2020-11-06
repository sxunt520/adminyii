<?php

namespace api\modules\v1\controllers;

use Yii;
use api\components\BaseController;
use yii\web\IdentityInterface;
use api\models\Member;
use api\models\LoginForm;

class MemberController extends BaseController
{
    public $modelClass = 'api\models\Member';
    
	/**
	 * 添加测试用户
	 */
	public function actionSignup ()
	{
	    $user = new Member();
	    $user->username = 'admin'; 
	    $user->setPassword('123456');
	    $user->generateAuthKey();
	    $user->save(false);
	    return [ 'code' => 200 ];
	 }

	 /**
	 * 登录
	 */
	public function actionLogin ()
	{
	    $model = new LoginForm;
	    $model->setAttributes(Yii::$app->request->post());
	    if ($user = $model->login()) {
	        if ($user instanceof IdentityInterface) {
	            return $user->api_token;
	        } else {
	            return $user->errors;
	        }
	    } else {
	        return $model->errors;
	    }
	}
	
	/**
	 * 获取用户信息
	 */
	public function actionUserProfile ()
	{
	    // 到这一步，token都认为是有效的了
	    // 下面只需要实现业务逻辑即可，下面仅仅作为案例，比如你可能需要关联其他表获取用户信息等等
	    $headers = Yii::$app->getRequest()->getHeaders();
	    $token = $headers->get('token');
	    $user = Member::findIdentityByAccessToken($token);
	    return [
	        'id' => $user->id,
	        'username' => $user->username,
	    ];
	}
	
	/**
	 * test
	 */
	public function actionTest ()
	{
	    return [
	        'xxxxxxxxxxxxx',
	    ];
	}

}