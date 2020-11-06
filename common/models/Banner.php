<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property string $id
 * @property string $goods_id
 * @property integer $banner_url
 */
class Banner extends \yii\db\ActiveRecord
{
    //public $banner_url;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'banner_url'], 'required'],
            [['goods_id'], 'integer'],
            [["banner_url"], "file",],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => 'Goods ID',
            'banner_url' => 'Banner Url',
        ];
    }
}
