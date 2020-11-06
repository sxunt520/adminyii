<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EdifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '渲染列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edify-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Edify', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'title',
                    //'px260Pic',
                    [
                    'label' => '缩略图片',
                    'format' => [
                        'image',
                        [
                            'width'=>'84',
                            //'height'=>'84'
                        ]
                    ],
                    'value' => function ($model) {
                        $pic=strpos($model->px260Pic, 'http:') === false ? (\Yii::getAlias('@static') . '/' . $model->px260Pic) : $model->px260Pic;
                        return $pic;
                        //return "http://img.sxunt.com/".$model->pic;
                    }
                    ],
                    //'picurl:url',
                    [
                    'label' => '推荐缩略图',
                    'format' => [
                        'image',
                        [
                            'width'=>'84',
                            //'height'=>'84'
                        ]
                    ],
                    'value' => function ($model) {
                        $pic=strpos($model->picurl, 'http:') === false ? (\Yii::getAlias('@static') . '/' . $model->picurl) : $model->picurl;
                        return $pic;
                        //return "http://img.sxunt.com/".$model->pic;
                    }
                    ],
                    //'flag',
                    [
                    'attribute' => 'flag',
                    'value' => function ($model) {
                        if($model->flag=='t'){
                            return '推荐(t)';
                        }else if($model->flag=='h'){
                            return '火热(h)';
                        }else if($model->flag=='t,h' || $model->flag=='h,t'){
                            return '推荐,火热(h,t)';
                        }else{
                            return '无';
                        }
                        //$arr = ['推荐，火热','推荐','火热'];
                        //return $arr[$model->tjType];
                    },
                    ],
                    'orderid',
                     'posttime:datetime',
                     'checkinfo:boolean',
                    // 'source',
                    // 'author',
                    // 'camera',
                    // 'address',
                    // 'digest:ntext',
                    // 'other:ntext',
                     'hits',
                    // 'digestPage:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
