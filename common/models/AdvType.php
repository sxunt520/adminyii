<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%adv_type}}".
 *
 * @property integer $id
 * @property string $type_name
 * @property integer $width
 * @property integer $height
 */
class AdvType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adv_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name', 'width', 'height'], 'required'],
            [['width', 'height'], 'integer'],
            [['type_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_name' => '类型名',
            'width' => '宽(px)',
            'height' => '高(px)',
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            //TimestampBehavior::className(),
        ];
    }
    
    /*
     * 获取广告类型Array
     */
    public static function getadvtype()
    {
       // $list = Yii::$app->cache->get('categoryList');
        //if ($list === false) {
            $list = static::find()->select('id,type_name')->asArray()->all();
            $list = ArrayHelper::map($list, 'id', 'type_name');
            //Yii::$app->cache->set('categoryList', $list);
       //}
    
        return $list;
    }
    
    /*
     * type_id 获取 name
     */
    public static function getTypeNameById($id){
        $advtype_model=AdvType::findOne($id);
        if($advtype_model){
           return $advtype_model->type_name;
        }else{
            return NULL;
        }
    }
}
