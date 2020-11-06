<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%adv}}".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $title
 * @property string $info
 * @property string $advimg
 * @property string $jumpurl
 * @property integer $advorder
 * @property integer $is_show
 */
class Adv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adv}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'title', 'advimg', 'jumpurl'], 'required'],
            [['type_id', 'advorder', 'is_show'], 'integer'],
            [['info'], 'string'],
            [['title'], 'string', 'max' => 30],
            [['advimg'], 'string', 'max' => 100],
            [['jumpurl'], 'string', 'max' => 255],
            //['advorder', 'default', 'value' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => '广告类型',
            'title' => '标题',
            'info' => '详情',
            'advimg' => '封面图',
            'jumpurl' => '跳转URL',
            'advorder' => '排序',
            'is_show' => '是否显示',
        ];
    }
}
