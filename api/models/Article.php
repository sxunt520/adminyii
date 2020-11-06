<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $category
 * @property integer $category_id
 * @property string $author
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $cover
 * @property string $qcPic
 * @property integer $comment
 * @property integer $up
 * @property integer $down
 * @property integer $view
 * @property string $desc
 * @property integer $user_id
 * @property string $source
 * @property integer $deleted_at
 * @property integer $is_top
 */
class Article extends \common\models\Article
{
    public function init ()
    {
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category', 'category_id', 'author', 'published_at', 'created_at', 'updated_at', 'status', 'qcPic', 'comment', 'source'], 'required'],
            [['category_id', 'published_at', 'created_at', 'updated_at', 'status', 'comment', 'up', 'down', 'view', 'user_id', 'deleted_at', 'is_top'], 'integer'],
            [['title', 'category', 'source'], 'string', 'max' => 50],
            [['author'], 'string', 'max' => 100],
            [['cover', 'qcPic', 'desc'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category' => 'Category',
            'category_id' => 'Category ID',
            'author' => 'Author',
            'published_at' => 'Published At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'cover' => 'Cover',
            'qcPic' => 'Qc Pic',
            'comment' => 'Comment',
            'up' => 'Up',
            'down' => 'Down',
            'view' => 'View',
            'desc' => 'Desc',
            'user_id' => 'User ID',
            'source' => 'Source',
            'deleted_at' => 'Deleted At',
            'is_top' => 'Is Top',
        ];
    }
}
