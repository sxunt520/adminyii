<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%massage}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $tel
 * @property string $content
 * @property string $lastdate
 */
class Massage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%massage}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'content'], 'required'],
            [['content'], 'string'],
            [['lastdate'], 'safe'],
            [['name'], 'string', 'max' => 12],
            [['email', 'tel'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名字',
            'email' => 'Email',
            'tel' => '电话',
            'content' => '内容',
            'lastdate' => '时间',
        ];
    }
}
