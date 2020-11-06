<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%edify}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $flag
 * @property string $picurl
 * @property integer $orderid
 * @property string $posttime
 * @property string $checkinfo
 * @property string $source
 * @property string $author
 * @property string $camera
 * @property string $address
 * @property string $digest
 * @property string $other
 * @property integer $hits
 * @property string $digestPage
 * @property string $px260Pic
 */
class Edify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%edify}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'px260Pic', 'source','posttime'], 'required'],
            [['orderid', 'hits'], 'integer'],
            [['checkinfo', 'digest', 'other', 'digestPage'], 'string'],
            [['title'], 'string', 'max' => 80],
            [['flag'], 'string', 'max' => 30],
            [['picurl', 'px260Pic'], 'string', 'max' => 100],
            [['source', 'author', 'camera', 'address'], 'string', 'max' => 255],
            [['posttime'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
            ['posttime', 'default', 'value' => time()],
            ['orderid', 'default', 'value' => 100],
            ['hits', 'default', 'value' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'flag' => '属性',
            'picurl' => '推荐缩略图',
            'orderid' => '排列排序',
            'posttime' => '提交时间',
            'checkinfo' => '审核状态',
            'source' => '来源',
            'author' => '作者',
            'camera' => '器材',
            'address' => '地点',
            'digest' => '摘要',
            'other' => '其它',
            'hits' => '点击',
            'digestPage' => '内页摘要',
            'px260Pic' => '缩略图片(Width:260px,Height:auto)',
        ];
    }
    
    /**
     * 真实浏览量
     */
    public function getTrueHits()
    {
        return $this->hits + \Yii::$app->cache->get('edify:view:' . $this->id);
    }
    
    //获取上一篇
    public static function getprev($id){
        $row=self::find()->select("id,title")->where(['checkinfo' => true])->andWhere(['>','id',$id])->orderBy('id ASC')->asArray()->one();
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    //获取下一篇
    public static function getnext($id){
        $row=self::find()->select("id,title")->where(['checkinfo' => true])->andWhere(['<','id',$id])->orderBy('id DESC')->asArray()->one();
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    
    /**
     * 增加浏览量
     */
    public function addView()
    {
        $cache = \Yii::$app->cache;
        $key = 'edify:view:'.$this->id;
        $view = $cache->get($key);
        if ($view !== false) {
            if ($view >= 10) {//10次更新一次
                $this->hits = $this->hits + $view + 1;
                $this->save(false);
                $cache->delete($key);
            } else {
                $cache->set($key, ++$view);
            }
        } else {
            $cache->set($key, 1);
        }
    }
    
}
