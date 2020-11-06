<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SkillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '技巧列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加技巧', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                            [
                            'attribute' => 'id',
                            'value' => 'id',
                            'headerOptions' => ['width' => '70'],
                            ],
                            'title',
                            [
                                'label' => '封面',
                                'format' => [
                                    'image',
                                    [
                                        'width'=>'84',
                                        //'height'=>'84'
                                    ]
                                ],
                                'value' => function ($model) {
                                    $pic=strpos($model->pic, 'http:') === false ? (\Yii::getAlias('@static') . '/' . $model->pic) : $model->pic;
                                    return $pic;
                                    //return "http://img.sxunt.com/".$model->pic;
                                }
                            ],
                            'tuijian:boolean',
                            [
                            'attribute' => 'tjType',
                            'value' => function ($model) {
                                $arr = ['未设置','名词解释', '器材基础','拍摄技巧','后期处理'];
                                return $arr[$model->tjType];
                            },
                            ],
                            //'tjType',
                            //'from',
                            //'author',
                            // 'content:ntext',
                            'datetime',
                  ['class' => 'yii\grid\ActionColumn','headerOptions' => ['width' => '70']],
                ],
            ]); ?>
        </div>
    </div>

</div>
