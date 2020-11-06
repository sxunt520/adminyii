<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%edify_img}}".
 *
 * @property string $id
 * @property string $edify_id
 * @property string $edify_url
 */
class EdifyImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%edify_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['edify_id', 'edify_url'], 'required'],
            [['edify_id'], 'integer'],
            [['edify_url'], 'string', 'max' => 110],
            [['edify_id', 'edify_url'], 'unique', 'targetAttribute' => ['edify_id', 'edify_url'], 'message' => 'The combination of Edify ID and Edify Url has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'edify_id' => 'Edify ID',
            'edify_url' => 'Edify Url',
        ];
    }
}
