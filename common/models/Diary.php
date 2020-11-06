<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%diary}}".
 *
 * @property integer $id
 * @property integer $cid
 * @property string $pic
 * @property string $weather
 * @property string $date_time
 * @property string $address
 * @property string $people
 * @property string $title
 * @property string $content
 * @property string $author
 * @property string $keyword
 * @property string $description
 */
class Diary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%diary}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'pic', 'title', 'author'], 'required'],
            [['cid'], 'integer'],
            [['date_time'], 'safe'],
            [['content'], 'string'],
            [['pic'], 'string', 'max' => 200],
            [['weather', 'people', 'author'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 50],
            [['keyword'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => '分类',
            'pic' => '缩略图(310*210)',
            'weather' => '天气',
            'date_time' => '日期',
            'address' => '地址',
            'people' => '人物',
            'title' => '标题',
            'content' => '日记内容',
            'author' => '作者',
            'keyword' => '关键字',
            'description' => '关键字描述',
        ];
    }
    
    //获取上一篇
    public static function getprev($id){
        $row=self::find()->select("id,title")->andWhere(['>','id',$id])->orderBy('id ASC')->asArray()->one();
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    
    //获取下一篇
    public static function getnext($id){
        $row=self::find()->select("id,title")->andWhere(['<','id',$id])->orderBy('id DESC')->asArray()->one();
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    
}
