<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%gallery}}".
 *
 * @property integer $id
 * @property integer $cid
 * @property string $picsrc
 * @property string $piclink
 * @property string $date_time
 * @property string $describe
 * @property integer $show
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gallery}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'picsrc', 'piclink'], 'required'],
            [['cid', 'show'], 'integer'],
            [['date_time'], 'safe'],
            [['describe'], 'string'],
            [['picsrc', 'piclink'], 'string', 'max' => 100]
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
            'picsrc' => '缩略图(auto)',
            'piclink' => '图片链接地址',
            'date_time' => '时间',
            'describe' => '描述',
            'show' => '是否首页显示',
        ];
    }
}
