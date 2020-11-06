<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $access_token
 * @property string $allowance
 * @property string $allowance_updated_at
 * @property string $api_token
 */
class Member extends \common\models\Member
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['role', 'status', 'created_at', 'updated_at', 'allowance', 'allowance_updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'access-token', 'api_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }
    
    public function init ()
    {
        parent::init();
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'access-token' => 'Access Token',
            'allowance' => 'Allowance',
            'allowance_updated_at' => 'Allowance Updated At',
            'api_token' => 'Api Token',
        ];
    }
    
//     public function setPassword($test_password){
//         parent::setPassword($test_password);
//     }
    
//     public function generateAuthKey(){
//         parent::generateAuthKey();
//     }
    
//     public function generateApiToken(){
//         parent::generateApiToken();
//     }
    
}
